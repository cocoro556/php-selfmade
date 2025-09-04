<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create()
    {
        $categories = Category::all();


        $difficulties = [
            'easy' => '初級',
            'medium' => '中級',
            'hard' => '上級',
        ];

        return view('questions.create', compact('categories', 'difficulties'));
    }

    public function store(Request $request)
    {
        // 入力チェック（バリデーション）
        $validated = $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'hint' => ['nullable', 'string'],
        ]);

        // DB用の形に整形（カラム名に合わせる）
        $data = [
            'user_id' => auth()->id(),                    // 未ログインなら null でもOK
            'category_id' => $validated['category'],
            'question_text' => $validated['question'],
            'correct_answer' => $validated['answer'],
            'hint' => $validated['hint'] ?? null,
            'difficulty' => $validated['difficulty'],        // 'easy' | 'medium' | 'hard'
            'is_template' => false,
        ];

        \App\Models\Question::create($data);

        return redirect()->route('questions.list')->with('status', '問題を登録しました。');
    }



    public function list()
    {
        $questions = Question::with('category')
            ->where('is_template', false)
            ->latest()
            ->get();

        $difficultyLabels = [
            'easy' => '初級',
            'medium' => '中級',
            'hard' => '上級',
        ];

        return view('questions.list', compact('questions', 'difficultyLabels'));
    }

    // app/Http/Controllers/QuestionController.php
    public function destroy($id)
    {
        \App\Models\Question::where('id', $id)
            ->where('user_id', auth()->id()) // 自分の問題だけ
            ->delete();

        return back()->with('status', '問題を削除しました。');
    }

}
