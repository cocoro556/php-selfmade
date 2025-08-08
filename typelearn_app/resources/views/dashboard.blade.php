@extends('layouts.app') @section('title', 'ダッシュボード') @section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">ダッシュボード</h1>
                <p>ようこそ、{{ Auth::user()->name }}さん！</p>

                <div
                    class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                >
                    <!-- タイピング練習カード -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg">
                        <h3
                            class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2"
                        >
                            タイピング練習
                        </h3>
                        <p
                            class="text-blue-700 dark:text-blue-300 text-sm mb-4"
                        >
                            プログラミングのタイピング練習を始めましょう
                        </p>
                        <a
                            href="{{ route('typing.index') }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm"
                        >
                            練習を始める
                        </a>
                    </div>

                    <!-- 進捗カード -->
                    <div
                        class="bg-green-50 dark:bg-green-900/20 p-6 rounded-lg"
                    >
                        <h3
                            class="text-lg font-semibold text-green-900 dark:text-green-100 mb-2"
                        >
                            進捗状況
                        </h3>
                        <p
                            class="text-green-700 dark:text-green-300 text-sm mb-4"
                        >
                            あなたの学習進捗を確認できます
                        </p>
                        <div
                            class="text-green-600 dark:text-green-400 font-bold"
                        >
                            0% 完了
                        </div>
                    </div>

                    <!-- 設定カード -->
                    <div
                        class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-lg"
                    >
                        <h3
                            class="text-lg font-semibold text-purple-900 dark:text-purple-100 mb-2"
                        >
                            設定
                        </h3>
                        <p
                            class="text-purple-700 dark:text-purple-300 text-sm mb-4"
                        >
                            アカウント設定を変更できます
                        </p>
                        <a
                            href="{{ route('profile.edit') }}"
                            class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded text-sm"
                        >
                            設定を変更
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
