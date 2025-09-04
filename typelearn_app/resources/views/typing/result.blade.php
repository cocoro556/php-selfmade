@extends('layouts.guest') @section('title', 'タイピング練習-結果')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="練習を終了しました" />

    <div
        class="w-full max-w-4xl rounded-lg border border-white/10 bg-slate-900/70 text-gray-200 px-8 py-6"
    >
        <!-- 練習結果の詳細 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div
                class="text-center p-3 rounded-lg bg-slate-800/50 border border-gray-500/30"
            >
                <div
                    class="text-2xl font-bold text-gray-200 mb-1"
                    id="correct-count"
                >
                    0
                </div>
                <div class="text-xs text-gray-400">正解数</div>
            </div>
            <div
                class="text-center p-3 rounded-lg bg-slate-800/50 border border-gray-500/30"
            >
                <div
                    class="text-2xl font-bold text-gray-200 mb-1"
                    id="total-questions"
                >
                    3
                </div>
                <div class="text-xs text-gray-400">総問題数</div>
            </div>
            <div
                class="text-center p-3 rounded-lg bg-slate-800/50 border border-gray-500/30"
            >
                <div
                    class="text-2xl font-bold text-gray-200 mb-1"
                    id="elapsed-time"
                >
                    00:00
                </div>
                <div class="text-xs text-gray-400">経過時間</div>
            </div>
        </div>

        <!-- 正解率 -->
        <div
            class="text-center mb-6 p-4 rounded-lg bg-slate-800/50 border border-gray-500/30"
        >
            <div class="text-xl font-bold text-gray-200 mb-1" id="correct-rate">
                0%
            </div>
            <div class="text-xs text-gray-400">正解率</div>
        </div>

        <div class="flex justify-center flex-col items-center gap-7">
            <x-button
                href="{{ route('typing.index') }}"
                text="もう一度練習"
            />
            <x-back-button
                href="{{ route('typing.index') }}"
                text="←ダッシュボードへ戻る"
            />
        </div>
    </div>
</div>

@endsection
