@extends('layouts.app') @section('title', 'TypeLearnトップページ')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header
        logo="{{ '<x-application-logo />' }}"
        subtitle="プログラミング学習のための"
        description="タイピング・メモリー・システム"
    />

    <!-- ボタン群 -->
    <div class="flex gap-16 justify-center">
        @guest
        <x-button href="{{ route('login') }}" text="LOGIN" />
        <x-button href="{{ route('register') }}" text="REGISTER" />
        <x-button href="{{ route('dashboard') }}" text="GUEST" />
        @endguest @auth
        <form
            class="flex justify-end"
            method="POST"
            action="{{ route('logout') }}"
        >
            @csrf
            <button
                type="submit"
                class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded bg-gray-100 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-900 dark:text-white"
            >
                LOGOUT
            </button>
        </form>
        <x-button href="{{ route('dashboard') }}" text="DASHBOARD" />
        @endauth
    </div>

    <x-borderline width="w-[70%] mt-10" />
    <!-- 特徴セクション -->
    <div class="flex gap-20 justify-center mt-10">
        <!-- PRACTICE -->
        <div class="text-center w-48">
            <svg
                class="mx-auto h-12 w-12 text-gray-400 mb-4"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
            >
                <path
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                />
            </svg>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                PRACTICE
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                タイピング練習でプログラミングを学習
            </p>
        </div>

        <!-- MEMORY -->
        <div class="text-center w-48">
            <svg
                class="mx-auto h-12 w-12 text-gray-400 mb-4"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
            >
                <path
                    d="M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
                />
            </svg>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                MEMORY
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                自然と記憶に残る学習システム
            </p>
        </div>

        <!-- EFFICIENCY -->
        <div class="text-center w-48">
            <svg
                class="mx-auto h-12 w-12 text-gray-400 mb-4"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
            >
                <path d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                EFFICIENCY
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                効率的な学習でスキルアップ
            </p>
        </div>
    </div>
</div>

@endsection
