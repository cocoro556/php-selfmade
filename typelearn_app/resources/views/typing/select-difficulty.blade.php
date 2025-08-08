@extends('layouts.guest') @section('title', 'タイピング練習-難易度選択')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header
        subtitle="難易度を選択"
    />

    @if($category)
    <div class="mb-4 text-center">
        <p class="text-gray-600 dark:text-gray-400">
            カテゴリー: <span class="font-semibold">{{ $category->name }}</span>
        </p>
    </div>
@endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-4">
        <x-difficulty-card
            href="{{ route('typing.answer-panel', ['category' => $category->name ?? null,'difficulty' => 'beginner']) }}"
            level="初級"
            description="基礎的な問題"
            bgColor="bg-green-200 dark:bg-green-800 hover:bg-green-300 dark:hover:bg-green-700"
            hoverColor="hover:bg-emerald-800"
        />

        <x-difficulty-card
            href="{{ route('typing.answer-panel', ['category' => $category->name ?? null,'difficulty' => 'intermediate']) }}"
            level="中級"
            description="応用的な問題"
            bgColor="bg-yellow-300 dark:bg-yellow-800 hover:bg-yellow-400 dark:hover:bg-yellow-700"
            hoverColor="hover:bg-yellow-800"
        />

        <x-difficulty-card
            href="{{ route('typing.answer-panel', ['category' => $category->name ?? null,'difficulty' => 'advanced']) }}"
            level="上級"
            description="高度な問題"
            bgColor="bg-red-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-700"
            hoverColor="hover:bg-red-800"
        />
    </div>

    <div class="mt-8 text-center">
        <div class="mb-4">
            <x-button
                href="{{ route('typing.answer-panel') }}"

                text="ランダムで出題"
                bgColor="bg-gray-200 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-500"
                textColor="text-black dark:text-white"
            />
        </div>
        <div class="mb-4">
            <x-back-button
                href="{{ route('template-questions.index') }}"
                text="←問題タイプ選択に戻る"
                textColor="text-gray-900 dark:text-white"
            />
        </div>
    </div>
</div>
@endsection
