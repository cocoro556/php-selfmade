{{-- resources/views/components/difficulty-card.blade.php --}}
@props([ 'href' => '#', 'level' => '初級', 'description' => '説明文', 'bgColor'
=> 'bg-green-700', 'hoverColor' => 'hover:bg-green-800', ])

<a
    href="{{ $href }}"
    class="flex flex-col items-center justify-center px-12 py-3 rounded text-white border-2 border-gray-700
transition duration-200 ease-in-out {{ $bgColor }} {{ $hoverColor }}"
>
    <h2 class="text-2xl font-medium mb-2">{{ $level }}</h2>
    <p class="text-xs text-gray-100">{{ $description }}</p>
</a>
