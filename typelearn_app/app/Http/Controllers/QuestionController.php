<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;

class QuestionController extends Controller
{
    // 共通の難易度ラベル
    private function difficultyLabels(): array
    {
        return [
            'easy' => '初級',
            'medium' => '中級',
            'hard' => '上級',
        ];
    }

    // 問題一覧（自分の問題のみ / 管理者は全件）
    public function list()
    {
        $query = Question::with('category')->where('is_template', false);

        if (auth()->user()?->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        $questions = $query->latest()->get();

        return view('questions.list', [
            'questions' => $questions,
            'difficultyLabels' => $this->difficultyLabels(),
        ]);
    }

    // 作成画面
    public function create()
    {
        return view('questions.create', [
            'categories' => Category::all(),
            'difficulties' => $this->difficultyLabels(),
        ]);
    }

    // 保存
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'hint' => ['nullable', 'string'],
        ]);

        $data = [
            'user_id' => auth()->id(),
            'category_id' => $validated['category'],
            'content' => $validated['question'],
            'correct_answer' => $validated['answer'],
            'hint' => $validated['hint'] ?? null,
            'difficulty' => $validated['difficulty'],
            'is_template' => false,
        ];

        Question::create($data);

        return redirect()->route('questions.list')->with('status', '問題を登録しました。');
    }

    // 編集画面（自分の問題のみ）
    public function edit(Question $question)
    {
        abort_unless(auth()->id() === $question->user_id, 403);

        return view('questions.edit', [
            'question' => $question,
            'categories' => Category::all(),
            'difficulties' => $this->difficultyLabels(),
        ]);
    }

    // 更新（自分の問題のみ）
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

    // 削除（自分の問題のみ）
    public function destroy($id)
    {
        Question::where('id', $id)
            ->where('user_id', auth()->id())
            ->delete();

        return back()->with('status', '問題を削除しました。');
    }
}