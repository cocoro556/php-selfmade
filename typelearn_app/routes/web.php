<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypingController;
use App\Http\Controllers\QuestionController;

// ホームページ
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// ダッシュボード
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// タイピング練習（実際の練習）
Route::get('/typing', [TypingController::class, 'index'])->name('typing.index');
Route::get('/typing/select-category', [TypingController::class, 'selectCategory'])->name('typing.select-category');
Route::get('/typing/select-difficulty/{category?}', [TypingController::class, 'selectDifficulty'])->name('typing.select-difficulty');
Route::get('/typing/answer-panel', [TypingController::class, 'answerPanel'])->name('typing.answer-panel');
Route::get('/typing/result', [TypingController::class, 'result'])->name('typing.result');

// タイピング練習（自作問題）
Route::get('/typing/answer-panel-my', [TypingController::class, 'answerPanelMy'])
    ->middleware('auth')
    ->name('typing.answer-panel-my');

// 問題作成（ログイン必須）
Route::middleware('auth')->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::get('/questions/list', [QuestionController::class, 'list'])->name('questions.list');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});

// 学習履歴
Route::get('/typing/history', [TypingController::class, 'history'])->name('typing.history');


// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 認証不要なルート（check-answerをここに移動）
Route::post('/typing/check-answer', [TypingController::class, 'checkAnswer'])->name('typing.check-answer');
Route::post('/typing/get-next-question', [TypingController::class, 'getNextQuestion'])->name('typing.get-next-question');

require __DIR__ . '/auth.php';
