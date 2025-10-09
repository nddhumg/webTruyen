<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WebTruyen')</title>

    {{-- Favicon --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"> --}}

    {{-- Tailwind CSS / Bootstrap --}}
    @vite('resources/css/app.css') {{-- hoặc link CDN nếu không dùng Vite --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet"> --}}

    {{-- Custom CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    @stack('head')
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    {{-- Header --}}
    {{-- @include('partials.app.app_header') --}}

    {{-- Navbar --}}
    {{-- @include('partials.app.app_navbar') --}}

    {{-- Main Content --}}
    <main class="container mx-auto px-4 py-6 min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    {{-- @include('partials.app.app_footer') --}}

    {{-- Scripts --}}
    @vite('resources/js/app.js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    @stack('scripts')

</body>
</html>
