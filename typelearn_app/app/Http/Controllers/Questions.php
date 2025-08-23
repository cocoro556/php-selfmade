<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;    

class Questions extends Controller
{
    public function index()
    {
        // カテゴリー一覧を取得
        $categories = Category::withCount('questions')->get();        
        return view('questions.index', compact('categories'));
    }

    public function category($categoryName)
    {
        // カテゴリー情報を取得
        $category = Category::where('name', $categoryName)->first();
        if (!$category) {
            abort(404);
        }
        
        // そのカテゴリーの問題一覧を取得
        $questions = Question::where('category_id', $category->id)
            ->with('category')
            ->get();
        
        return view('questions.category', compact('category', 'questions'));
    }
}
