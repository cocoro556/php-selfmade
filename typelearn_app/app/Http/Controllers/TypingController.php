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
        if ($categoryName) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                abort(404);
            }
        } else {
            $category = null;
        }

        return view('typing.select-difficulty', compact('category'));
    }

    public function answerPanel(Request $request)
    {
        // リクエストからカテゴリーと難易度を取得
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
        $query = TemplateQuestion::with('category');
        
        // カテゴリーで絞り込み
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
        }
        
        // ランダムで問題を取得
        $question = $query->inRandomOrder()->first();
        
        // 問題が見つからない場合の処理
        if (!$question) {
            abort(404, '条件に合う問題が見つかりません');
        }
        
        // 難易度の日本語表示名を追加
        $difficultyNames = [
            'easy' => '初級',
            'medium' => '中級', 
            'hard' => '上級'
        ];
        
        $question->difficulty_name = $difficultyNames[$question->difficulty] ?? '不明';
        
        return view('typing.answer-panel', compact('question', 'difficulty'));
    }

    public function result()
    {
        return view('typing.result');
    }
}
