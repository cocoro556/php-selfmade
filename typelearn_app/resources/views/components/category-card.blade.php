@props([ 'href' => '#', 'name' => 'カテゴリ名', 'description' =>
'カテゴリの説明', ])

<a
    href="{{ $href }}"
    class="flex flex-col items-center justify-center text-center w-full h-20 px-4 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-500 rounded transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-900 hover:text-white"
>
    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-1">
        {{ $name }}
    </h2>
    <p class="text-sm text-gray-800 dark:text-gray-400">{{ $description }}</p>
</a>
