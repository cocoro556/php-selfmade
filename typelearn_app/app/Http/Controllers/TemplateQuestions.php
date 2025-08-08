<?php

namespace App\Http\Controllers;

use App\Models\TemplateQuestion;
use App\Models\Category;
use Illuminate\Http\Request;

class TemplateQuestions extends Controller
{
    public function index()
    {
        // カテゴリー一覧を取得
        $categories = Category::withCount('templateQuestions')->get();
        
        return view('template-questions.index', compact('categories'));
    }

    public function category($categoryName)
    {
        // カテゴリー情報を取得
        $category = Category::where('name', $categoryName)->first();
        if (!$category) {
            abort(404);
        }
        
        // そのカテゴリーの問題一覧を取得
        $questions = TemplateQuestion::where('category_id', $category->id)
            ->with('category')
            ->get();
        
        return view('template-questions.category', compact('category', 'questions'));
    }
}
