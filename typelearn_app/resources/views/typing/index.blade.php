@extends('layouts.guest') @section('title', 'TypeLearnゲストダッシュボード')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">
        TYPELEARN
    </h1>
    <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-400 mb-8">
        タイピング練習
    </h2>
    <p class="text-4xl font-bold text-gray-600 dark:text-gray-700 mb-8">
        問題を解きながらプログラミングを学びましょう
    </p>

    <p class="text-4xl font-bold text-gray-900 dark:text-white mb-8">
        問題タイプを選択
    </p>

    <div class="flex">
        <x-button
            href="{{ route('typing.index') }}"
            text="テンプレート問題"
            bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
            textColor="text-gray-900 dark:text-white"
        />
        <x-button
            href="/"
            text="自作問題"
            bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
            textColor="text-black dark:text-white"
        />
    </div>

    <div class="mt-8 text-center">
        <x-button
            href="{{ route('home.index') }}"
            text="トップページに戻る"
            bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
            textColor="text-gray-900 dark:text-white"
        />
    </div>
</div>
@endsection
