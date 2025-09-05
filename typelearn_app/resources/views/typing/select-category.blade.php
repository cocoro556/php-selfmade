@extends('layouts.guest') @section('title', 'タイピング練習')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="テンプレート問題を選択" />
    <div
        class="flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 py-5 px-16 border-2 rounded border-gray-300 dark:border-gray-700"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-2">
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
                    bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
                    textColor="text-gray-900 dark:text-white"
                />
            </div>
            <div>
                <x-back-button
                    href="{{ route('typing.index') }}"
                    text="←問題タイプ選択に戻る"
                    textColor="text-gray-900 dark:text-white"
                />
            </div>
        </div>
    </div>
</div>
@endsection
