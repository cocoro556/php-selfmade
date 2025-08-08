@extends('layouts.guest') @section('title', 'タイピング練習-結果')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="練習を終了しました" />

    <div
        class="w-full max-w-4xl rounded-lg border border-white/10 bg-slate-900/70 text-gray-200 px-8 py-6"
    >
        <p class="text-center text-black dark:text-white mb-4 text-1xl font-bold">
            練習完了!
        </p>
        <div class="flex justify-center flex-col items-center gap-7">
            <x-button href="{{ route('template-questions.index') }}" text="もう一度練習" />
            <x-back-button href="{{ route('typing.index') }}" text="←ダッシュボードへ戻る" />
        </div>
    </div>
</div>

@endsection
