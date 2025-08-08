@extends('layouts.guest') @section('title', 'タイピング練習')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
 <x-section-header
    subtitle="タイピング練習"
 />

    <div class="flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 py-5 px-20 border-2 border-gray-300 dark:border-gray-700">
        <h3 class="text-1xl text-gray-900 dark:text-white mb-8">
            問題タイプを選択
        </h3>

        <div class="flex gap-4">
            <x-button
                href="{{ route('template-questions.index') }}"
                text="テンプレート問題"
                bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
                textColor="text-gray-900 dark:text-white"
            />
            @auth
            <x-button
                href="/"
                text="自作問題"
                bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
                textColor="text-black dark:text-white"
            />
            @endauth
        </div>

        <div class="mt-8 text-center">
            <x-back-button
                href="{{ route('home.index') }}"
                text="←トップページに戻る"
                textColor="text-gray-900 dark:text-white"
            />
        </div>
    </div>
</div>
@endsection
