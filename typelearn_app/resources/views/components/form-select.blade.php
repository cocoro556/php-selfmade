<select {{ $attributes->merge(['class' => 'w-full text-center border text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-slate-900/70']) }}>
    {{ $slot }}
</select>