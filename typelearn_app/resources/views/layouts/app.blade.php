<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield('title', config("app.name", "Laravel"))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-black">
        <div
            id="particle-canvas"
            class="relative w-full min-h-screen flex flex-col"
        >
            <!-- 左上 -->
            <div
                class="hidden md:block fixed top-4 left-8 w-10 h-10 border-t-2 border-l-2 border-gray-500 z-50"
            ></div>

            <!-- 右上 -->
            <div
                class="hidden md:block fixed top-4 right-8 w-10 h-10 border-t-2 border-r-2 border-gray-500 z-50"
            ></div>

            <!-- 左下 -->
            <div
                class="hidden md:block fixed bottom-4 left-8 w-10 h-10 border-b-2 border-l-2 border-gray-500 z-50"
            ></div>

            <!-- 右下 -->
            <div
                class="hidden md:block fixed bottom-4 right-8 w-10 h-10 border-b-2 border-r-2 border-gray-500 z-50"
            ></div>
            <main class="flex-1">@yield('content')</main>

            <!-- フッター -->
            @include('components.footer')
        </div>
        <script src="{{ asset('js/typing.js') }}"></script>
    </body>
</html>
