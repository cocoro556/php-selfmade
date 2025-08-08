<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateQuestion;
use App\Models\Category;

class TypingController extends Controller
{
    public function index()
    {
        return view('typing.index');
    }

    public function selectDifficulty($categoryName = null)
    {
        // カテゴリー情報を取得
        if ($categoryName && $categoryName !== 'random') {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                abort(404);
            }
        } else {
            // ランダムの場合はカテゴリをランダムに選択
            $category = Category::inRandomOrder()->first();
        }

        return view('typing.select-difficulty', compact('category'));
    }

    public function answerPanel(Request $request)
    {
        // リクエストからカテゴリーと難易度を取得（複数の方法で試行）
        $categoryName = $request->query('category');
        
        // 難易度パラメータを複数の方法で取得
        $difficulty = $request->query('difficulty') ?? 
                      $request->input('difficulty') ?? 
                      $request->get('difficulty') ??
                      $request->query('amp;difficulty'); // エンコードされたパラメータも試行
        
        // デバッグ用：リクエストパラメータを確認
        \Log::info('Request parameters:', [
            'category' => $categoryName,
            'difficulty' => $difficulty,
            'all_query_params' => $request->query(),
            'all_input_params' => $request->input(),
            'raw_url' => $request->fullUrl()
        ]);
        
        // 難易度を英語に変換
        $difficultyMap = [
            'beginner' => 'easy',
            'intermediate' => 'medium', 
            'advanced' => 'hard',
            'random' => null
        ];
        
        $dbDifficulty = $difficultyMap[$difficulty] ?? null;
        
        // デバッグ用：難易度変換を確認
        \Log::info('Difficulty mapping:', [
            'original' => $difficulty,
            'mapped' => $dbDifficulty
        ]);
        
        // クエリビルダーを開始
        $query = TemplateQuestion::with('category');
        
        // カテゴリーで絞り込み
        $category = null; // 変数を初期化
        if ($categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                abort(404, 'カテゴリーが見つかりません');
            }
            $query->where('category_id', $category->id);
        }
        
        // 難易度で絞り込み（ランダム以外の場合）
        if ($dbDifficulty && $dbDifficulty !== 'random') {
            $query->where('difficulty', $dbDifficulty);
            \Log::info('Added difficulty filter:', ['difficulty' => $dbDifficulty]);
        } else {
            // ランダムの場合は、そのカテゴリの全難易度からランダムに選択
            \Log::info('Random difficulty selected - will choose from all difficulties in category');
        }
        
        // デバッグ用：SQLクエリを確認
        $sql = $query->toSql();
        $bindings = $query->getBindings();
        
        \Log::info('Final query:', [
            'sql' => $sql,
            'bindings' => $bindings
        ]);
        
        // ランダムで問題を取得
        $question = $query->inRandomOrder()->first();
        
        // デバッグ用：利用可能な問題を確認
        $availableQuestions = [];
        if ($category) {
            $availableQuestions = TemplateQuestion::with('category')
                ->where('category_id', $category->id)
                ->get(['id', 'question_text', 'difficulty']);
        } else {
            // カテゴリが指定されていない場合は全問題を取得
            $availableQuestions = TemplateQuestion::with('category')
                ->get(['id', 'question_text', 'difficulty']);
        }
        
        $debugInfo = [
            'requested_difficulty' => $difficulty,
            'mapped_difficulty' => $dbDifficulty,
            'sql_query' => $sql,
            'sql_bindings' => $bindings,
            'selected_question' => $question ? [
                'id' => $question->id,
                'question_text' => $question->question_text,
                'difficulty' => $question->difficulty
            ] : null,
            'available_questions' => $availableQuestions->toArray()
        ];
        
        // 問題が見つからない場合の処理
        if (!$question) {
            return view('typing.debug', compact('debugInfo'));
        }
        
        // 難易度の日本語表示名を追加
        $difficultyNames = [
            'easy' => '初級',
            'medium' => '中級', 
            'hard' => '上級'
        ];
        
        $question->difficulty_name = $difficultyNames[$question->difficulty] ?? '不明';
        
        // デバッグ情報も一緒に渡す
        return view('typing.answer-panel', compact('question', 'difficulty', 'debugInfo'));
    }

    public function result()
    {
        return view('typing.result');
    }
}
