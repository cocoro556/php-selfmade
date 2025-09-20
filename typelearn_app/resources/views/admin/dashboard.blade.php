@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center flex-col">
    <div class="flex  justify-center flex-col items-center">
        <x-section-header
        subtitle="管理者ダッシュボード"
        />
    </div>
    
    <div class="flex items-center justify-center flex-col space-y-4">


        <x-button href="{{ route('admin.users') }}" text="ユーザー管理" />
        <x-button href="{{ route('admin.questions') }}" text="問題管理" />

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-red-500 rounded bg-red-100 dark:bg-red-900 hover:bg-red-200 dark:hover:bg-red-800 text-red-700 dark:text-red-200 font-semibold">
                ログアウト
            </button>
        </form>
    </div>
</div>
@endsection
