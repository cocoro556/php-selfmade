@extends('layouts.guest') @section('title', 'TypeLearnゲストダッシュボード')
@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    @auth
    <x-section-header
        subtitle="{{ Auth::user()->name }} さん"
        description="ようこそ！"
    />
@else
    <x-section-header
        subtitle="ゲストモード"
        description="ログインせずにタイピング練習を楽しめます"
    />
@endauth


    <div class="flex gap-4">
        <x-button href="{{ route('typing.index') }}" text="タイピング練習" />
        @auth
        <x-button href="{{ route('questions.list') }}" text="問題を管理" />
        @endauth @auth
        <x-button href="{{ route('typing.history') }}" text="学習履歴" />
        @endauth
    </div>

    <!-- 注意事項 -->
    <div class="mt-8 text-center">
        @guest
        <p class="text-gray-600 dark:text-gray-500 text-xs mb-4">
            ※ ゲストモードでは練習データは保存されません
        </p>
        <p class="text-gray-600 dark:text-gray-500 text-xs mb-6">
            ※ より多くの機能を利用するにはログインしてください
        </p>
        @endguest
    </div>

    <x-back-button
        href="{{ route('home.index') }}"
        text="←トップページへ戻る"
    />
</div>
@endsection
