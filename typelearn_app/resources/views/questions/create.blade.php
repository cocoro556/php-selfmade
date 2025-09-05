@extends('layouts.guest') @section('title', '作成画面') @section('content')

<div class="flex flex-col items-center justify-center py-8">
    <x-section-header subtitle="問題を作成" />
    <form
        action="{{ route('questions.store') }}"
        method="post"
        class="w-full max-w-2xl"
    >
        @csrf
        <div class="flex flex-col gap-4 w-full">
            <div class="flex flex-col gap-2">
                <x-form-label for="category">カテゴリ</x-form-label>
                <x-form-select name="category" id="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>

            <div class="flex flex-col gap-2">
                <x-form-label for="difficulty">難易度</x-form-label>
                <x-form-select name="difficulty" id="difficulty">
                    @foreach($difficulties as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-form-select>
            </div>

            <div class="flex flex-col gap-2">
                <x-form-label for="question">問題</x-form-label>
                <x-form-textarea
                    name="question"
                    id="question"
                    rows="4"
                    placeholder="問題文を入力してください"
                >
                </x-form-textarea>
            </div>

            <div class="flex flex-col gap-2">
                <x-form-label for="answer">答え</x-form-label>
                <x-form-textarea
                    name="answer"
                    id="answer"
                    rows="3"
                    placeholder="正解を入力してください"
                >
                </x-form-textarea>
            </div>

            <div class="flex flex-col gap-2">
                <x-form-label for="hint">ヒント</x-form-label>
                <x-form-textarea
                    name="hint"
                    id="hint"
                    rows="2"
                    placeholder="ヒントを入力してください（任意）"
                >
                </x-form-textarea>
            </div>

            <div class="flex items-center justify-center gap-5 mt-6">
                <button
                    type="submit"
                    class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded bg-gray-100 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-900 dark:text-white"
                >
                    問題を作成
                </button>
                <x-button
                    href="{{ route('questions.list') }}"
                    text="キャンセル"
                    bgColor="bg-red-300/100 dark:bg-red-800/70 hover:bg-red-500/90 dark:hover:bg-red-700/90"
                />
            </div>
        </div>
    </form>
</div>
@endsection
