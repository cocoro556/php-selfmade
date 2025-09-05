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
            'content' => $validated['question'],
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
        $query = Question::with('category')->where('is_template', false);

        if (auth()->user()?->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        $questions = $query->latest()->get();

        $difficultyLabels = [
            'easy' => '初級',
            'medium' => '中級',
            'hard' => '上級',
        ];

        return view('questions.list', compact('questions', 'difficultyLabels'));
    }

    public function edit(Question $question)
    {
        // 自分の問題のみ編集可能（管理者は別途要件に応じて拡張）
        abort_unless(auth()->id() === $question->user_id, 403);

        $categories = Category::all();
        $difficulties = [
            'easy' => '初級',
            'medium' => '中級',
            'hard' => '上級',
        ];

        return view('questions.edit', compact('question', 'categories', 'difficulties'));
    }

    public function update(Request $request, Question $question)
    {
        abort_unless(auth()->id() === $question->user_id, 403);

        $validated = $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'hint' => ['nullable', 'string'],
        ]);

        $question->update([
            'category_id' => $validated['category'],
            'content' => $validated['question'],
            'correct_answer' => $validated['answer'],
            'hint' => $validated['hint'] ?? null,
            'difficulty' => $validated['difficulty'],
        ]);

        return redirect()->route('questions.list')->with('status', '問題を更新しました。');
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
