@extends('layouts.guest') @section('title', 'タイピング練習')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header
        logo="{{ '<x-application-logo />' }}"
        subtitle="テンプレート問題を選択"
    />
    <div
        class="flex flex-col items-center justify-center bg-gray-150 dark:bg-gray-900 py-5 px-20 border-2 border-gray-300 dark:border-gray-700"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
            <x-category-card
                href="{{ route('typing.select-difficulty', 'PHP') }}"
                name="PHP"
                description="Web開発言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'Java') }}"
                name="Java"
                description="オブジェクト指向言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'Python') }}"
                name="Python"
                description="スクリプト言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'JavaScript') }}"
                name="JavaScript"
                description="Web開発言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'HTML') }}"
                name="HTML"
                description="マークアップ言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'CSS') }}"
                name="CSS"
                description="スタイルシート言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'SQL') }}"
                name="SQL"
                description="データベース言語"
            />
            <x-category-card
                href="{{ route('typing.select-difficulty', 'アルゴリズム') }}"
                name="アルゴリズム"
                description="プログラミング基礎"
            />
        </div>

        <div class="mt-8 text-center">
            <div class="mb-4">
                <x-button
                    href="{{ route('typing.select-difficulty', 'random') }}"
                    text="ランダムで出題"
                    bgColor="bg-gray-200 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-500"
                    textColor="text-black dark:text-white"
                />
            </div>
            <div class="mb-4">
                <x-back-button
                    href="{{ route('typing.index') }}"
                    text="←問題タイプ選択に戻る"
                    textColor="text-gray-900 dark:text-white"
                />
            </div>
        </div>
    </div>
    @endsection
</div>
