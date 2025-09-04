@extends('layouts.guest') @section('title', '問題一覧') @section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="問題一覧" description="問題を管理" />
    <div class="flex flex-col items-center justify-center gap-10 w-full">
        <x-button
            href="{{ route('questions.create') }}"
            text="新しい問題を作成"
        />
        @if(isset($questions) && count($questions))
        <div class="w-full max-w-5xl flex flex-col gap-6">
            @foreach($questions as $q)
            <div
                class="w-full rounded-md border border-white/10 bg-slate-900/70 p-4"
            >
                <div
                    class="flex items-center justify-between text-xs text-gray-400 mb-2"
                >
                    <div class="flex items-center gap-3">
                        <span
                            class="px-2 py-1 rounded bg-slate-800 text-gray-200"
                            >{{ $q->category->name ?? '-' }}</span
                        >
                        <span>{{ $q->created_at->format('Y/m/d H:i') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a
                            href="#"
                            class="px-3 py-1 text-sm rounded bg-slate-600 hover:bg-slate-500"
                            >編集</a
                        >
                        <form
                            id="del-{{ $q->id }}"
                            action="{{ route('questions.destroy', $q->id) }}"
                            method="POST"
                            class="hidden"
                        >
                            @csrf @method('DELETE')
                        </form>

                        <a
                            href="#"
                            class="px-3 py-1 text-sm rounded bg-red-700 hover:bg-red-600"
                            onclick="event.preventDefault(); if (confirm('本当に削除しますか？')) document.getElementById('del-{{ $q->id }}').submit();"
                        >
                            削除
                        </a>
                    </div>
                </div>
                <div class="text-lg text-white font-semibold mb-2">
                    {{ $q->question_text }}
                </div>
                <div class="text-sm text-gray-300">
                    正解: {{ $q->correct_answer }}
                </div>
                <div class="text-sm text-gray-300">ヒント: {{ $q->hint }}</div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-gray-400">まだ登録された問題がありません。</div>
        @endif

        <x-button href="{{ route('dashboard') }}" text="トップへ戻る" />Ï
    </div>
    @endsection
</div>
