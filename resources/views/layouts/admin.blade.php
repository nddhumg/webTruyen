<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body class="flex h-screen bg-gray-100 ">


    <!-- Sidebar -->
    {{-- @include('partials.admin.admin_sidebar') --}}

    <!-- Scroll Toggle Button -->
    <button id="scrollToggleBtn"
        class="fixed bottom-6 right-6 w-12 h-12 flex items-center justify-center rounded-full
               bg-gradient-to-r from-gray-900 to-gray-700 text-white shadow-lg
               hover:scale-110 hover:shadow-2xl transition duration-300 z-50">
        <!-- Icon mũi tên mặc định (xuống) -->
        <svg id="scrollIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    @stack('scripts')
    <script>
        const scrollToggleBtn = document.getElementById("scrollToggleBtn");
        const scrollIcon = document.getElementById("scrollIcon");

        function isAtBottom() {
            return window.innerHeight + window.scrollY >= document.body.offsetHeight - 10;
        }

        // Đổi icon khi ở cuối trang
        window.addEventListener("scroll", () => {
            if (isAtBottom()) {
                // Icon ↑
                scrollIcon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />`;
            } else {
                // Icon ↓
                scrollIcon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />`;
            }
        });

        // Xử lý click
        scrollToggleBtn.addEventListener("click", () => {
            if (isAtBottom()) {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            } else {
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: "smooth"
                });
            }
        });
    </script>

</body>
