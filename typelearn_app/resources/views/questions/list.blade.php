@extends('layouts.guest') @section('title', '問題一覧') @section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <x-section-header subtitle="問題一覧" description="問題を管理" />
    <div class="flex flex-col items-center justify-center gap-10">
        <x-button
            href="{{ route('questions.create') }}"
            text="新しい問題を作成"
        />
        <x-button
            href="{{ route('dashboard') }}"
            text="トップへ戻る"
        />Ï
</div>
@endsection
