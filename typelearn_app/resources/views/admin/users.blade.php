@extends('layouts.guest') @section('content')
<div class="min-h-screen flex items-center justify-center flex-col">
    <div class="flex justify-center flex-col items-center">
        <x-section-header
            :logo="false"
            subtitle="ユーザー管理"
            description="登録ユーザーの一覧と管理"
        />
    </div>

    <!-- ユーザー一覧 -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden mb-8"
    >
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <div class="flex space-x-4 mb-4 p-4">
                <button
                    onclick="filterUsers('all')"
                    id="btn-all"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                >
                    全員
                </button>
                <button
                    onclick="filterUsers('user')"
                    id="btn-user"
                    class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600"
                >
                    一般ユーザー
                </button>
                <button
                    onclick="filterUsers('admin')"
                    id="btn-admin"
                    class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600"
                >
                    管理者
                </button>
            </div>
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    >
                        ID
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    >
                        名前
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    >
                        メールアドレス
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    >
                        権限
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    >
                        登録日
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                    >
                        削除
                    </th>
                </tr>
            </thead>
            <tbody
                id="user-table"
                class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700"
            >
                @foreach($users as $user)
                <tr data-role="{{ $user->role }}">
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"
                    >
                        {{ $user->id }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white"
                    >
                        {{ $user->name }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"
                    >
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 py-1 text-xs font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' }}"
                        >
                            {{ $user->role === 'admin' ? '管理者' : '一般ユーザー' }}
                        </span>
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                    >
                        {{ $user->created_at->format('Y/m/d') }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                    >
                        <form
                            method="POST"
                            action="{{ route('admin.users.destroy', $user) }}"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="text-red-500 hover:text-red-700"
                            >
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 統計情報 -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3
                class="text-lg font-semibold text-gray-900 dark:text-white mb-2"
            >
                総ユーザー数
            </h3>
            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                {{ \App\Models\User::count() }}
            </p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3
                class="text-lg font-semibold text-gray-900 dark:text-white mb-2"
            >
                管理者数
            </h3>
            <p class="text-3xl font-bold text-red-600 dark:text-red-400">
                {{ \App\Models\User::where('role', 'admin')->count() }}
            </p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3
                class="text-lg font-semibold text-gray-900 dark:text-white mb-2"
            >
                一般ユーザー数
            </h3>
            <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                {{ \App\Models\User::where('role', 'user')->count() }}
            </p>
        </div>
        <div class="flex justify-center mt-10">
            <x-button
                href="{{ route('admin.dashboard') }}"
                text="Back button"
            />
        </div>

    </div>
</div>
@endsection
