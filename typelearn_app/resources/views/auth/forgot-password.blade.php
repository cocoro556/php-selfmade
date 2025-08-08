@extends('layouts.guest') @section('content')
<div class="min-h-screen flex items-center justify-center flex-col">
    <div class="flex justify-center flex-col items-center">
        <x-section-header />
    </div>
    <div
        class="w-full max-w-md p-6 bg-gray-150 dark:bg-gray-900 rounded-lg shadow-md"
    >
        <div class="mb-4 text-xs text-gray-600 dark:text-gray-400">
            パスワードを忘れた場合は、メールアドレスを入力してください。
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="'メールアドレス'" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    パスワードリセットリンクを送信
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
