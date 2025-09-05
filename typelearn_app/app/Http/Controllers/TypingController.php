<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use App\Models\Answer;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class TypingController extends Controller
{
    public function index()
    {
        return view('typing.index');
    }

    public function selectCategory()
    {
        // カテゴリー一覧を取得
        $categories = Category::withCount('questions')->get();
        return view('typing.select-category', compact('categories'));
    }

    public function selectDifficulty($categoryName = null)
    {
        if ($categoryName && $categoryName !== 'random') {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                abort(404);
            }
        } else {
            $category = Category::inRandomOrder()->first();
        }

        return view('typing.select-difficulty', compact('category'));
    }

    public function answerPanel(Request $request)
    {

        $categoryName = $request->query('category');
        $difficulty = $request->query('difficulty');

        // 難易度を英語に変換
        $difficultyMap = [
            'beginner' => 'easy',
            'intermediate' => 'medium',
            'advanced' => 'hard',
            'random' => null
        ];

        $dbDifficulty = $difficultyMap[$difficulty] ?? null;

        // クエリビルダーを開始（テンプレ専用）
        $query = Question::with('category')->where('is_template', true);

        // カテゴリーで絞り込み
        if ($categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                abort(404, 'カテゴリーが見つかりません');
            }
            $query->where('category_id', $category->id);
        }

        // 難易度で絞り込み
        if ($dbDifficulty && $dbDifficulty !== 'random') {
            $query->where('difficulty', $dbDifficulty);
        }

        // ランダムで問題を取得
        $question = $query->inRandomOrder()->first();

        // 問題が見つからない場合
        if (!$question) {
            abort(404, '問題が見つかりません');
        }

        return view('typing.answer-panel', compact('question'));
    }

    public function result()
    {
        return view('typing.result');
    }

    public function checkAnswer(Request $request)
    {
        // バリデーション（スキップ時は answer_text に "__SKIPPED__" が入る）
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string|max:1000',
            'time_taken' => 'required|integer|min:0',
        ]);

        // 問題を取得
        $question = Question::findOrFail($request->question_id);

        // 正解かどうかチェック（スキップは常に不正解扱い）
        $isSkipped = $request->answer_text === '__SKIPPED__';
        $isCorrect = $isSkipped ? false : (strtolower(trim($request->answer_text)) === strtolower(trim($question->correct_answer)));

        // ログインユーザーの場合のみ回答を保存
        if (auth()->check()) {
            $userId = auth()->id();

            // 回答データを準備
            $answerData = [
                'user_id' => $userId,
                'question_id' => $question->id,
                'answer_text' => $request->answer_text,
                'is_correct' => $isCorrect,
                'time_taken' => $request->time_taken,
            ];

            // 回答を保存
            $answer = Answer::create($answerData);
        }

        // 結果を返す
        return response()->json([
            'is_correct' => $isCorrect,
            'correct_answer' => $question->correct_answer,
            'message' => $isCorrect ? '正解です！' : '不正解です。正解は: ' . $question->correct_answer,
        ]);
    }
    // 次の問題を取得するメソッドを追加
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

        // 難易度を英語に変換
        $difficultyMap = [
            'beginner' => 'easy',
            'intermediate' => 'medium',
            'advanced' => 'hard',
            'random' => null
        ];

        $dbDifficulty = $difficultyMap[$difficulty] ?? null;

        // クエリビルダーを開始
        $query = Question::with('category');

        if ($isMy) {
            $query->where('user_id', auth()->id())->where('is_template', false);
        } else {
            // テンプレモードではテンプレ問題のみ
            $query->where('is_template', true);
        }

        // カテゴリーで絞り込み
        if ($categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // 難易度で絞り込み
        if ($dbDifficulty && $dbDifficulty !== 'random') {
            $query->where('difficulty', $dbDifficulty);
        }

        // 現在の問題以外からランダムで問題を取得
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
                'question_text' => $nextQuestion->question_text,
                'hint' => $nextQuestion->hint,
                'category_name' => $nextQuestion->category->name,
                'difficulty' => $nextQuestion->difficulty,
                'difficulty_name' => $this->getDifficultyName($nextQuestion->difficulty)
            ]
        ]);
    }

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

    public function answerPanelMy(Request $request)
    {
        // 自分が作った＆テンプレではない問題からランダムに1件
        $question = \App\Models\Question::with('category')
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

    public function history()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userId = auth()->id();

        // 追加カラム無しで「1回=3件」としてページネート
        $perPageSessions = 5;
        $page = max(1, (int) request()->get('page', 1));
        $totalAnswersForUser = Answer::where('user_id', $userId)->count();
        $totalSessionsCalc = (int) ceil($totalAnswersForUser / 3);

        $offsetAnswers = ($page - 1) * $perPageSessions * 3;
        $answersSlice = Answer::where('user_id', $userId)
            ->with(['question.category'])
            ->orderBy('created_at', 'desc')
            ->skip($offsetAnswers)
            ->take($perPageSessions * 3)
            ->get();

        $sessionsCollection = $answersSlice->chunk(3)->map(function ($chunk) {
            $first = $chunk->first();
            $categoryName = $first && $first->question && $first->question->category
                ? $first->question->category->name
                : '-';
            $difficulty = $first && $first->question
                ? $first->question->difficulty
                : null;
            $difficultyLabel = match($difficulty) {
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

        // 総合統計
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
}