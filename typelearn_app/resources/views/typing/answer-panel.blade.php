@extends('layouts.guest') @section('title', 'タイピング練習')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="問題を入力して練習しましょう" />

    <!-- デバッグ情報（開発時のみ表示） -->
    <!-- @if(isset($debugInfo))
    <div class="w-full max-w-4xl mb-4 p-4 bg-yellow-100 border border-yellow-400 rounded">
        <h3 class="font-bold text-yellow-800">デバッグ情報</h3>
        <p><strong>要求された難易度:</strong> {{ $debugInfo['requested_difficulty'] }}</p>
        <p><strong>変換後の難易度:</strong> {{ $debugInfo['mapped_difficulty'] }}</p>
        <p><strong>SQLクエリ:</strong> {{ $debugInfo['sql_query'] }}</p>
        <p><strong>SQLバインド:</strong> {{ json_encode($debugInfo['sql_bindings']) }}</p>
        <p><strong>選択された問題の難易度:</strong> {{ $debugInfo['selected_question']['difficulty'] ?? 'なし' }}</p>
        <p><strong>選択された問題のID:</strong> {{ $debugInfo['selected_question']['id'] ?? 'なし' }}</p>
        <p><strong>選択された問題:</strong> {{ $debugInfo['selected_question']['question_text'] ?? 'なし' }}</p>
        
        <h4 class="font-bold mt-2">利用可能な問題一覧:</h4>
        @foreach($debugInfo['available_questions'] as $q)
            <div class="text-sm">
                ID: {{ $q['id'] }} | 難易度: {{ $q['difficulty'] }} | 問題: {{ $q['question_text'] }}
            </div>
        @endforeach
    </div>
    @endif -->

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
        <!-- ヒントカード（最初は非表示） -->
        <div
            id="hint-card"
            class="w-full max-w-4xl mt-3 rounded-lg border border-yellow-500/50 bg-yellow-900/20 text-yellow-200 px-8 py-2 hidden"
        >
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-semibold text-sm">ヒント</span>
            </div>
            <div id="hint-text" class="text-sm">{{ $question->hint }}</div>
        </div>
    </div>


    <!-- 進行状況 -->
    <div class="mt-6 text-sm text-gray-400">
        問題: 1/6　正解: 0　時間: 00:37
    </div>

    <!-- ボタン群 -->
    <div class="mt-6 flex justify-center gap-4">
        <x-button text="チェック" />
        <button
        id="hint-button"
        class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded bg-gray-100 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-900 dark:text-white"
    >
        ヒントを見る
    </button>
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
