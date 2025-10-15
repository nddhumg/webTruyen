<!DOCTYPE html>
<html lang="vi" class="dark">
<head>
    <title>@yield('title', 'WebTruyen')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100 font-sans text-gray-800 dark:bg-gray-900 dark:text-white px-4">
    {{-- Header --}}
    @include('blocks.header')

    {{-- Main --}}
    <main class="container mx-auto px-4 py-6 min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('blocks.footer')


</body>
</html>
