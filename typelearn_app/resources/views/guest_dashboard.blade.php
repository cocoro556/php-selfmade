@extends('layouts.guest') @section('title', 'TypeLearnゲストダッシュボード')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">

    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">
        TYPELEARN
    </h1>
    <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-400 mb-8">
        ゲストモード
    </h2>
    <p class="text-4xl font-bold text-gray-600 dark:text-gray-700 mb-8">
        ログインせずにタイピング練習を楽しめます
    </p>

    <x-button
        href="{{ route('typing.index') }}"
        text="タイピング練習"
        bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
        textColor="text-gray-900 dark:text-white"
    />

    <!-- 注意事項 -->
    <div class="mt-8 text-center">
        <p class="text-gray-600 dark:text-gray-500 text-sm mb-4">
            ※ ゲストモードでは練習データは保存されません
        </p>
        <p class="text-gray-600 dark:text-gray-500 text-sm mb-6">
            ※ より多くの機能を利用するにはログインしてください
        </p>
    </div>

    <x-button
        href="{{ route('home.index') }}"
        text="トップページへ戻る"
        bgColor="bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700"
        textColor="text-black dark:text-white"
    />
</div>
@endsection
