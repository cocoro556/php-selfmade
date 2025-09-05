@extends('layouts.guest') @section('title', 'ページが見つかりません') @section('content')

<div class="flex flex-col items-center justify-center min-h-screen text-center">
    <x-section-header subtitle="ページが見つかりません" />

    <div class="w-full max-w-2xl mt-6 rounded-lg border border-white/10 bg-slate-900/70 text-gray-200 px-8 py-10">
        <div class="text-6xl font-extrabold text-gray-300 mb-4">404</div>
        <p class="text-gray-300 mb-6">お探しのページは移動または削除された可能性があります。</p>
        <div class="flex items-center justify-center gap-4">
            <x-button href="{{ route('dashboard') }}" text="ダッシュボードへ" />
            <x-button href="{{ route('home.index') }}" text="トップへ" />
        </div>
    </div>
</div>
@endsection


