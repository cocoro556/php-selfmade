<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use App\Models\Answer;
use Illuminate\Pagination\LengthAwarePaginator;

class TypingController extends Controller
{
    // トップ
    public function index()
    {
        return view('typing.index');
    }

    // カテゴリ選択
    public function selectCategory()
    {
        $categories = Category::withCount('questions')->get();
        return view('typing.select-category', compact('categories'));
    }

    // 難易度選択（カテゴリ指定可／ランダム）
    public function selectDifficulty($categoryName = null)
    {
        if ($categoryName && $categoryName !== 'random') {
            $category = Category::where('name', $categoryName)->first();
            if (!$category)
                abort(404);
        } else {
            $category = Category::inRandomOrder()->first();
        }

        return view('typing.select-difficulty', compact('category'));
    }

    // 回答パネル表示（テンプレ問題から1件）
    public function answerPanel(Request $request)
    {
        $categoryName = $request->query('category');
        $difficulty = $request->query('difficulty');

        $difficultyMap = [
            'beginner' => 'easy',
            'intermediate' => 'medium',
            'advanced' => 'hard',
            'random' => null
        ];
        $dbDifficulty = $difficultyMap[$difficulty] ?? null;

        $query = Question::with('category')->where('is_template', true);

        if ($categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category)
                abort(404, 'カテゴリーが見つかりません');
            $query->where('category_id', $category->id);
        }

        if ($dbDifficulty && $dbDifficulty !== 'random') {
            $query->where('difficulty', $dbDifficulty);
        }

        $question = $query->inRandomOrder()->first();
        if (!$question)
            abort(404, '問題が見つかりません');

        return view('typing.answer-panel', compact('question'));
    }

    // 回答チェック
    public function checkAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string|max:1000',
            'time_taken' => 'required|integer|min:0',
        ]);

        $question = Question::findOrFail($request->question_id);

        $isSkipped = $request->answer_text === '__SKIPPED__';
        $isCorrect = $isSkipped ? false : (strtolower(trim($request->answer_text)) === strtolower(trim($question->correct_answer)));

        if (auth()->check()) {
            Answer::create([
                'user_id' => auth()->id(),
                'question_id' => $question->id,
                'content' => $request->answer_text, // answers.content に保存
                'is_correct' => $isCorrect,
                'time_taken' => $request->time_taken,
            ]);
        }

        return response()->json([
            'is_correct' => $isCorrect,
            'correct_answer' => $question->correct_answer,
            'message' => $isCorrect ? '正解です！' : '不正解です。正解は: ' . $question->correct_answer,
        ]);
    }

    // 次の問題を取得（テンプレ or 自作）
    public function getNextQuestion(Request $request)
    {
        $request->validate([
            'current_question_id' => 'required|exists:questions,id',
            'category_name' => 'nullable|string',
            'difficulty' => 'nullable|string',
            'is_my' => 'nullable|boolean',
        ]);

        $categoryName = $request->input('category_name');
        $difficulty = $request->input('difficulty');
        $isMy = $request->boolean('is_my');

        $difficultyMap = [
            'beginner' => 'easy',
            'intermediate' => 'medium',
            'advanced' => 'hard',
            'random' => null
        ];
        $dbDifficulty = $difficultyMap[$difficulty] ?? null;

        $query = Question::with('category');

        if ($isMy) {
            $query->where('user_id', auth()->id())->where('is_template', false);
        } else {
            $query->where('is_template', true);
        }

        if ($categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if ($category)
                $query->where('category_id', $category->id);
        }

        if ($dbDifficulty && $dbDifficulty !== 'random') {
            $query->where('difficulty', $dbDifficulty);
        }

        $nextQuestion = $query->where('id', '!=', $request->current_question_id)
            ->inRandomOrder()
            ->first();

        if (!$nextQuestion) {
            return response()->json([
                'success' => false,
                'message' => '次の問題が見つかりませんでした。'
            ]);
        }

        return response()->json([
            'success' => true,
            'question' => [
                'id' => $nextQuestion->id,
                'content' => $nextQuestion->content,
                'hint' => $nextQuestion->hint,
                'category_name' => $nextQuestion->category->name,
                'difficulty' => $nextQuestion->difficulty,
                'difficulty_name' => $this->getDifficultyName($nextQuestion->difficulty),
            ]
        ]);
    }

    // 難易度ラベル
    private function getDifficultyName($difficulty)
    {
        switch ($difficulty) {
            case 'easy':
                return '初級';
            case 'medium':
                return '中級';
            case 'hard':
                return '上級';
            default:
                return '未分類';
        }
    }

    // 自作問題モード（自分の問題から1件）
    public function answerPanelMy(Request $request)
    {
        $question = Question::with('category')
            ->where('user_id', auth()->id())
            ->where('is_template', false)
            ->inRandomOrder()
            ->first();

        if (!$question) {
            return redirect()->route('typing.index')
                ->with('alert', '自作問題の登録がありません。先に作成してください。');
        }

        return view('typing.answer-panel', compact('question'));
    }

    // 履歴（結果の簡易集計）
    public function history()
    {
        if (!auth()->check())
            return redirect()->route('login');

        $userId = auth()->id();
        $perPageSessions = 5;
        $page = max(1, (int) request()->get('page', 1));
        $totalAnswersForUser = Answer::where('user_id', $userId)->count();
        $totalSessionsCalc = (int) ceil($totalAnswersForUser / 5);

        $offsetAnswers = ($page - 1) * $perPageSessions * 5;
        $answersSlice = Answer::where('user_id', $userId)
            ->with(['question.category'])
            ->orderBy('created_at', 'desc')
            ->skip($offsetAnswers)
            ->take($perPageSessions * 5)
            ->get();

        $sessionsCollection = $answersSlice->chunk(5)->map(function ($chunk) {
            $first = $chunk->first();
            $categoryName = $first && $first->question && $first->question->category
                ? $first->question->category->name
                : '-';
            $difficulty = $first && $first->question
                ? $first->question->difficulty
                : null;
            $difficultyLabel = match ($difficulty) {
                'easy' => '初級',
                'medium' => '中級',
                'hard' => '上級',
                default => '未分類',
            };
            return (object) [
                'ts' => optional($chunk->first())->created_at,
                'total' => $chunk->count(),
                'correct' => $chunk->where('is_correct', true)->count(),
                'time_sec' => (int) $chunk->sum('time_taken'),
                'category_name' => $categoryName,
                'difficulty_label' => $difficultyLabel,
            ];
        });

        $recentSessions = new LengthAwarePaginator(
            $sessionsCollection,
            $totalSessionsCalc,
            $perPageSessions,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $totalAnswers = Answer::where('user_id', $userId)->count();
        $totalCorrect = Answer::where('user_id', $userId)->where('is_correct', true)->count();
        $totalAccuracy = $totalAnswers > 0 ? round(($totalCorrect / $totalAnswers) * 100) : 0;
        $avgTimeSec = $totalAnswers > 0 ? (int) round(Answer::where('user_id', $userId)->avg('time_taken')) : 0;
        $totalSessions = $totalSessionsCalc;

        return view('typing.history', [
            'recentSessions' => $recentSessions,
            'totalSessions' => $totalSessions,
            'totalAccuracy' => $totalAccuracy,
            'totalAnswers' => $totalAnswers,
            'avgTimeSec' => $avgTimeSec,
        ]);
    }

    // 結果画面
    public function result()
    {
        return view('typing.result');
    }
}