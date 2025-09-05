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
                @switch($question->difficulty) @case('easy')
                <span>初級</span>
                @break @case('medium')
                <span>中級</span>
                @break @case('hard')
                <span>上級</span>
                @break @default
                <span>未分類</span>
                @endswitch
            </div>
        </div>
        <div class="text-lg">{{ $question->content }}</div>
    </div>

    <!-- 解答カード -->
    <div
        class="w-full max-w-4xl mt-8 rounded-lg border border-white/10 bg-slate-900/70 text-gray-200 px-8 py-6"
    >
        <div class="text-center text-gray-300 mb-4">あなたの回答:</div>
        <!-- 問題IDを隠しフィールドで保持 -->
        <input type="hidden" id="question-id" value="{{ $question->id }}" />
        <input type="hidden" id="start-time" value="{{ time() * 1000 }}" />
        <!-- 現在のカテゴリと難易度を保持 -->
        <input
            type="hidden"
            id="current-category"
            value="{{ request()->query('category') }}"
        />
        <input
            type="hidden"
            id="current-difficulty"
            value="{{ request()->query('difficulty') }}"
        />
        <input type="hidden" id="is-my" value="{{ Route::currentRouteName() === 'typing.answer-panel-my' ? 1 : 0 }}" />

        <!-- 回答入力フィールドにIDを追加 -->
        <input
            id="answer-input"
            type="text"
            placeholder="ここに回答を入力してください"
            class="w-full rounded-md border border-white/20 bg-transparent px-6 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50"
        />
        <!-- ヒントカード（最初は非表示） -->
        <div
            id="hint-card"
            class="w-full max-w-4xl mt-3 rounded-lg border border-yellow-500/50 bg-yellow-900/20 text-yellow-200 px-8 py-2 hidden"
        >
            <div class="flex items-center mb-2">
                <svg
                    class="w-5 h-5 mr-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="font-semibold text-sm">ヒント</span>
            </div>
            <div id="hint-text" class="text-sm">{{ $question->hint }}</div>
        </div>
        <!-- 結果表示エリア -->
        <div
            id="result-message"
            class="w-full max-w-4xl mt-4 mb-6 text-center text-lg font-semibold hidden p-4 rounded-lg border"
        ></div>
    </div>

    <!-- 進行状況 -->
    <div id="progress-info" class="mt-6 text-sm text-gray-400">
        問題: <span id="current-question">1</span>/<span id="total-questions"
            >3</span
        >　正解: <span id="correct-count">0</span>　時間:
        <span id="elapsed-time">00:00</span>
    </div>

    <!-- ボタン群 -->
    <div class="mt-6 flex justify-center gap-4">
        <!-- チェックボタンを通常のbuttonタグに変更 -->
        <button
            id="check-button"
            class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded bg-blue-600 hover:bg-blue-700 text-white font-medium"
        >
            チェック
        </button>
        <button
            id="hint-button"
            class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded bg-gray-100 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-900 dark:text-white"
        >
            ヒントを見る
        </button>
        <button
            id="skip-button"
            class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded bg-gray-100 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-900 dark:text-white"
        >
            スキップ
        </button>
    </div>

    <div class="mt-8 text-center">
        <x-button
            href="{{ route('typing.result') }}"
            text="練習を終了"
            bgColor="bg-red-700/80 hover:bg-red-600"
            textColor="text-white"
        />
    </div>
</div>

@endsection
