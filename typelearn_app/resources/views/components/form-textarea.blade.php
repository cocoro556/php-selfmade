<textarea {{ $attributes->merge(['class' => 'w-full rounded-md border border-white/20 px-6 py-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 bg-slate-900/70']) }}>
    {{ $slot }}
</textarea>