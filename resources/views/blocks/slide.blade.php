<div class="relative w-full max-w-6xl mx-auto">
    <!-- Nút trái -->
    <button id="scrollLeft"
        class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700 z-10">
        ←
    </button>

    <!-- Container cuộn ngang -->
    <div id="scrollContainer" class="flex overflow-x-auto scroll-smooth gap-4 px-10 py-4 no-scrollbar">
        <!-- Slide-item trực tiếp -->
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">
            <a href="#">
                <img src="https://static.nettruyenus.com/data/comics/85/dao-hai-tac.jpg" alt="One Piece"
                    class="w-full h-80 object-cover">
            </a>
            <div class="slide-info p-3">
                <h3 class="text-lg font-semibold truncate mb-2">
                    <a href="#" class="hover:text-yellow-400 transition">One Piece</a>
                </h3>
                <div class="detail-slide flex justify-between items-center text-sm text-gray-300">
                    <a href="#" class="slide-chap chapter text-cyan-400 hover:text-cyan-300 transition">Chapter
                        1120</a>
                    <span class="slide-time flex items-center gap-1">
                        <i class="fa fa-history"></i> 3 ngày trước
                    </span>
                </div>
            </div>
        </div>

        <!-- Copy thêm các thẻ khác -->
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
        <div class="slide-item bg-gray-900 text-white rounded-xl overflow-hidden shadow-lg w-64 flex-shrink-0">...</div>
    </div>

    <!-- Nút phải -->
    <button id="scrollRight"
        class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700 z-10">
        →
    </button>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById("scrollContainer");
            const scrollLeft = document.getElementById("scrollLeft");
            const scrollRight = document.getElementById("scrollRight");

            const cards = container.querySelectorAll(".slide-item");
            const gap = 16; // gap-4 = 16px
            const scrollAmount = cards[0].offsetWidth + gap;

            scrollRight.addEventListener("click", () => {
                if (container.scrollLeft + container.offsetWidth >= container.scrollWidth) {
                    // Nếu đang ở cuối -> quay về đầu
                    container.scrollTo({
                        left: 0,
                        behavior: "smooth"
                    });
                } else {
                    container.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                }
            });

            scrollLeft.addEventListener("click", () => {
                if (container.scrollLeft <= 0) {
                    // Nếu đang ở đầu -> chuyển về cuối
                    container.scrollTo({
                        left: container.scrollWidth - container.offsetWidth,
                        behavior: "smooth"
                    });
                } else {
                    container.scrollBy({
                        left: -scrollAmount,
                        behavior: "smooth"
                    });
                }
            });
        });
    </script>

    <style>
        /* Ẩn scrollbar cho tất cả trình duyệt */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Edge */
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE 10+ */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

</div>
