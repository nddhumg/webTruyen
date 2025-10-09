<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Truyện')</title>

    {{-- Google Fonts: Inter + Noto Serif (cho tiêu đề truyện) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 font-[Inter]">

    {{-- Header --}}
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600 font-[Noto_Serif]">📚 Web Truyện</h1>
            <nav class="space-x-4 text-[15px]">
                <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium">Trang chủ</a>
                <a href="/index" class="text-gray-700 hover:text-indigo-600 font-medium">Danh sách</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium">Liên hệ</a>
            </nav>
        </div>
    </header>

    {{-- Nội dung trang --}}
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t mt-10 py-4 text-center text-gray-500 text-sm">
        © {{ date('Y') }} Web Truyện. All rights reserved.
    </footer>

</body>
</html>
