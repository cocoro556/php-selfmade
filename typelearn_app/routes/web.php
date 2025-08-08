<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypingController;
use App\Http\Controllers\TemplateQuestions;

// ホームページ
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// ダッシュボード
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// テンプレート問題管理（問題一覧・詳細）
Route::get('/template-questions', [TemplateQuestions::class, 'index'])->name('template-questions.index');
Route::get('/template-questions/category/{category}', [TemplateQuestions::class, 'category'])->name('template-questions.category');

// タイピング練習（実際の練習）
Route::get('/typing', [TypingController::class, 'index'])->name('typing.index');
Route::get('/typing/select-difficulty/{category?}', [TypingController::class, 'selectDifficulty'])->name('typing.select-difficulty');
Route::get('/typing/answer-panel', [TypingController::class, 'answerPanel'])->name('typing.answer-panel');
Route::get('/typing/result', [TypingController::class, 'result'])->name('typing.result');

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
