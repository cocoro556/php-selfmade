@props(['href' => '#', 'text' => 'ボタン','textColor' => 'text-white'])

<a href="{{ $href }}" class="inline-block text-sm {{ $textColor }} hover:text-white dark:hover:text-gray-400 transition duration-150 ease-in-out">
    {{ $text }}
</a>