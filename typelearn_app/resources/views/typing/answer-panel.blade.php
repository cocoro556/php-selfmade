@extends('layouts.guest') @section('title', 'タイピング練習')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="問題を入力して練習しましょう" />

    <!-- 問題カード -->
    <div
        class="w-full max-w-4xl rounded-lg border border-white/10 bg-slate-900/70 text-gray-200 px-8 py-6"
    >
        <div class="flex justify-between items-center mb-2">
            <div class="text-xs tracking-widest text-gray-400">
                カテゴリ: {{ $question->category->name }}
            </div>
            <div class="text-xs tracking-widest text-gray-400">
                難易度: {{ $question->difficulty_name }}
            </div>
        </div>
        <div class="text-lg">{{ $question->question_text }}</div>
    </div>

    <!-- 解答カード -->
    <div
        class="w-full max-w-4xl mt-8 rounded-lg border border-white/10 bg-slate-900/70 text-gray-200 px-8 py-6"
    >
        <div class="text-center text-gray-300 mb-4">あなたの回答:</div>
        <input
            type="text"
            placeholder="ここに回答を入力してください"
            class="w-full rounded-md border border-white/20 bg-transparent px-6 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50"
        />
    </div>

    <!-- 進行状況 -->
    <div class="mt-6 text-sm text-gray-400">
        問題: 1/6　正解: 0　時間: 00:37
    </div>

    <!-- ボタン群 -->
    <div class="mt-6 flex justify-center gap-4">
        <x-button text="チェック" />
        <x-button text="ヒントを見る" />
        <x-button text="スキップ" />
    </div>

    <div class="mt-6">
        <x-button
            href="{{ route('typing.result') }}"
            text="練習を終了"
            bgColor="bg-red-700/80 hover:bg-red-600"
            textColor="text-white"
        />
    </div>
</div>
@endsection
