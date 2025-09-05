@extends('layouts.guest') @section('title', '学習履歴') @section('content')

<div class="flex flex-col items-center justify-center min-h-screen mb-10">
    <x-section-header subtitle="学習履歴" description="あなたの学習進捗を確認できます" />
    <div class="w-full max-w-3xl flex flex-col gap-6">
        <div class="rounded-lg border border-white/10 bg-slate-900/70 text-gray-200">
            <div class="px-6 py-3 border-b border-white/10 font-semibold">最近の練習結果</div>
            <div class="px-6 py-4">
                <div class="grid grid-cols-7 text-sm text-gray-400 mb-2">
                    <div>日時</div>
                    <div class="text-center">カテゴリ</div>
                    <div class="text-center">難易度</div>
                    <div class="text-center">正解数</div>
                    <div class="text-center">問題数</div>
                    <div class="text-center">正解率</div>
                    <div class="text-right">時間</div>
                </div>
                @forelse($recentSessions as $s)
                    <div class="grid grid-cols-7 items-center text-sm py-1 border-t border-white/5">
                        <div>{{ \Illuminate\Support\Carbon::parse($s->ts)->format('Y/m/d H:i') }}</div>
                        <div class="text-center">{{ $s->category_name }}</div>
                        <div class="text-center">{{ $s->difficulty_label }}</div>
                        <div class="text-center">{{ $s->correct }}</div>
                        <div class="text-center">{{ $s->total }}</div>
                        <div class="text-center">{{ $s->total ? round(($s->correct / $s->total) * 100) : 0 }}%</div>
                        <div class="text-right">{{ $s->time_sec }}秒</div>
                    </div>
                @empty
                    <div class="text-center text-gray-400 py-4">まだ履歴がありません。</div>
                @endforelse
                <div class="mt-4">{{ $recentSessions->links() }}</div>
            </div>
        </div>

        <div class="rounded-lg border border-white/10 bg-slate-900/70 text-gray-200">
            <div class="px-6 py-3 border-b border-white/10 font-semibold">総合統計</div>
            <div class="px-6 py-6 grid grid-cols-2 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold">{{ $totalSessions }}</div>
                    <div class="text-sm text-gray-400 mt-1">練習日数</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold">{{ $totalAccuracy }}%</div>
                    <div class="text-sm text-gray-400 mt-1">正解率</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold">{{ $totalAnswers }}</div>
                    <div class="text-sm text-gray-400 mt-1">解答問題数</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold">{{ $avgTimeSec }}秒</div>
                    <div class="text-sm text-gray-400 mt-1">平均時間</div>
                </div>
            </div>
        </div>

        <div class="flex justify-center gap-4">
            <x-button href="{{ route('typing.index') }}" text="タイピング練習" />
            <x-button href="{{ route('dashboard') }}" text="dashboardに戻る" />
        </div>
    </div>
</div>
@endsection
