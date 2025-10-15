<div class="relative w-full overflow-x-hidden">
    <button id="scrollLeft"
        class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700 z-10">←</button>

    <div id="scrollContainer" class="flex gap-4 overflow-x-auto scroll-smooth no-scrollbar py-4 px-4">
        <x-slide-story-card></x-slide-story-card>
        <x-slide-story-card></x-slide-story-card>
        <x-slide-story-card></x-slide-story-card>
        <x-slide-story-card></x-slide-story-card>
        <x-slide-story-card></x-slide-story-card>
        <x-slide-story-card></x-slide-story-card>
        <x-slide-story-card></x-slide-story-card>
    </div>

    <button id="scrollRight"
        class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700 z-10">→</button>
</div>


<script>
   document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("scrollContainer");
    const scrollLeft = document.getElementById("scrollLeft");
    const scrollRight = document.getElementById("scrollRight");

    const gap = 16; // gap-4 = 16px
    const getCardWidth = () => container.querySelector('.slide-item').offsetWidth + gap;

    let autoScrollTimer;
    const autoScrollInterval = 6000;

    function scrollContainer(direction) {
        const cardWidth = getCardWidth();
        const maxScrollLeft = container.scrollWidth - container.clientWidth;

        container.scrollBy({ left: direction * cardWidth, behavior: "smooth" });

        // Nếu đến cuối hoặc đầu, nối tiếp để tạo loop mượt
        setTimeout(() => {
            if (container.scrollLeft >= maxScrollLeft) {
                container.scrollLeft = 0;
            } else if (container.scrollLeft <= 0) {
                container.scrollLeft = maxScrollLeft;
            }
        }, 300);

        startAutoScroll();
    }

    function startAutoScroll() {
        if (autoScrollTimer) clearTimeout(autoScrollTimer);
        autoScrollTimer = setTimeout(() => {
            scrollContainer(1);
        }, autoScrollInterval);
    }

    scrollRight.addEventListener("click", () => scrollContainer(1));
    scrollLeft.addEventListener("click", () => scrollContainer(-1));

    // Bắt đầu auto scroll khi load
    startAutoScroll();
});

</script>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
