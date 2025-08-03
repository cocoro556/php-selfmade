@props(['href' => '#', 'text' => 'ボタン', 'bgColor' => 'bg-gray-800', 'textColor' => 'text-white'])

<a href="{{ $href }}" class="flex items-center justify-center w-48 h-12 px-6 py-2 border border-white rounded {{ $bgColor }} {{ $textColor }}">
    {{ $text }}
</a>






