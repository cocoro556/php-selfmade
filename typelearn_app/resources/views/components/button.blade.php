@props(['href' => '#', 'text' => 'ボタン', 'bgColor' => 'bg-gray-100 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700', 'textColor' => 'text-gray-900 dark:text-white'])

<a href="{{ $href }}" class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-gray-500 rounded {{ $bgColor }} {{ $textColor }}">
    {{ $text }}
</a>

