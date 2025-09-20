<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(10);
        return view('admin.questions', compact('questions'));
    }

    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'ログインできませんでした。']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function questions(){
        $questions = Question::where('is_template', true)->with('category')->paginate(20);
        return view('admin.questions', compact('questions'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users');
    }

    public function destroyQuestion(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions');
    }

    public function editQuestion(Question $question)
    {
        $categories = Category::all();
        $difficulties = [
            'easy' => '簡単',
            'medium' => '普通',
            'hard' => '難しい'
        ];
        return view('admin.edit', compact('question', 'categories', 'difficulties'));
    }

    public function updateQuestion(Request $request, Question $question)
    {
        $request->validate([
            'category' => 'required|exists:categories,id',
            'difficulty' => 'required|in:easy,medium,hard',
            'question' => 'required|string|max:1000',
            'answer' => 'required|string|max:1000',
            'hint' => 'nullable|string|max:500',
        ]);

        $question->update([
            'category_id' => $request->category,
            'content' => $request->question,
            'correct_answer' => $request->answer,
            'hint' => $request->hint,
            'difficulty' => $request->difficulty,
        ]);

        return redirect()->route('admin.questions')->with('success', '問題を更新しました。');
    }

    public function createQuestion()
    {
        $categories = Category::all();

        $difficulties = [
            'easy' => '簡単',
            'medium' => '普通',
            'hard' => '難しい'
        ];
        return view('admin.create', compact('categories', 'difficulties'));
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:categories,id',
            'difficulty' => 'required|in:easy,medium,hard',
            'question' => 'required|string|max:1000',
            'answer' => 'required|string|max:1000',
            'hint' => 'nullable|string|max:500',
        ]);

        
        $question = Question::create([
            'user_id' => null, // テンプレート問題なのでユーザーIDはnull
            'category_id' => $request->category,
            'content' => $request->question,
            'correct_answer' => $request->answer,
            'hint' => $request->hint,
            'difficulty' => $request->difficulty,
            'is_template' => true, // テンプレート問題として登録
        ]);

        return redirect()->route('admin.questions')->with('success', '問題を作成しました。');
    }

}
