@props([ 'title' => 'TYPELEARN', 'subtitle' => '', 'description' => '', 'logo' => true])

@if ($logo)
<div>
    <x-application-logo />
</div>

<h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-1">
    {{ $title }}
</h1>

<x-borderline width="w-20" />
@endif

@if ($subtitle)
<h2 class="text-2xl text-gray-900 dark:text-gray-200 mb-2">
    {{ $subtitle }}
</h2>
@endif @if ($description)
<p class="text-sm text-gray-600 dark:text-gray-400 mb-8">
    {{ $description }}
</p>
@endif
