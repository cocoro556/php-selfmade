<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use App\Models\Answer;
use App\Models\User;

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

        // クエリビルダーを開始
        $query = Question::with('category');

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
        // バリデーション
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string|max:1000',
            'time_taken' => 'required|integer|min:0',
        ]);

        // 問題を取得
        $question = Question::findOrFail($request->question_id);

        // 正解かどうかチェック
        $isCorrect = strtolower(trim($request->answer_text)) === strtolower(trim($question->correct_answer));

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
        ]);

        $categoryName = $request->input('category_name');
        $difficulty = $request->input('difficulty');

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

}