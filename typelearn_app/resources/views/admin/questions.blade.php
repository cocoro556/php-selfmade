@extends('layouts.guest') @section('title', '問題管理') @section('content')

<div class="min-h-screen flex items-center justify-center flex-col m-10">
    <div class="flex justify-center flex-col items-center">
        <x-section-header
            :logo="false"
            subtitle="問題管理"
            description="問題の追加・編集・削除"
        />
        
        <!-- 問題数の表示 -->
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            全 {{ $questions->total() }} 問中 {{ $questions->firstItem() }} - {{ $questions->lastItem() }} 問を表示
        </div>
    </div>
<!-- メインコンテナ -->
    <div class="flex items-center justify-center flex-col space-y-4">

    <!-- 問題一覧 -->   
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden mb-8">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">問題</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">カテゴリ</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">難易度</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">作成日</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">編集</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">削除</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($questions as $question)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $question->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $question->content }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $question->category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $question->difficulty }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $question->created_at->format('Y/m/d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <a
                            href="{{ route('admin.questions.edit', $question) }}"
                            class="px-3 py-1 text-sm rounded bg-green-700 hover:bg-green-500 text-white"
                            >編集</a
                        >
                    </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <form method="POST" action="{{ route('admin.questions.destroy', $question) }}"
                            onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm rounded bg-red-700 hover:bg-red-500 text-white">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- ページネーション -->
        <div class="mt-6">
            {{ $questions->links() }}
        </div>
        
        <!-- 戻るボタン -->
        <div class="flex justify-center gap-10">
            <x-button
                href="{{ route('admin.dashboard') }}"
                text="Back button"
            />

            <x-button
            href="{{ route('admin.questions.create') }}"
            text="新しい問題を作成"
        />
        </div>
    </div>
</div>
@endsection
