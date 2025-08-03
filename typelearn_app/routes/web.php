<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TypingController;
// ホームページ
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// ゲストダッシュボード
Route::get('/guest', [GuestController::class, 'index'])->name('guest.dashboard');
// タイピング練習
Route::get('/typing', [TypingController::class, 'index'])->name('typing.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
