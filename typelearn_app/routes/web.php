<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypingController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;

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
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
    Route::patch('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});

// 学習履歴
Route::get('/typing/history', [TypingController::class, 'history'])->name('typing.history');

// 管理者ログイン（未認証でもアクセス可）
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

// 管理者ページ（認証＋管理者権限必要）
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/questions', [AdminController::class, 'questions'])->name('admin.questions');
    Route::get('/questions/{question}/edit', [AdminController::class, 'editQuestion'])->name('admin.questions.edit');
    Route::put('/questions/{question}', [AdminController::class, 'updateQuestion'])->name('admin.questions.update');
    Route::get('/questions/create', [AdminController::class, 'createQuestion'])->name('admin.questions.create');
    Route::post('/questions', [AdminController::class, 'storeQuestion'])->name('admin.questions.store');
    Route::delete('/questions/{question}', [AdminController::class, 'destroyQuestion'])->name('admin.questions.destroy');
});


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
