@props(['title', 'imageLink', 'url', 'chapters' => []])
<div class="bg-white rounded-2xl shadow hover:shadow-lg transition-shadow overflow-hidden max-w-xs">
    <button >
        <!-- Hình truyện -->
        <div class="relative">
            <img src="{{ $imageLink }}"
                alt="{{ $title }}"
                class="w-full h-60 object-cover rounded-t-2xl transition-transform duration-300 hover:scale-105">

            <!-- Stats overlay -->
            <div
                class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white text-xs rounded-lg px-2 py-1 flex gap-2">
                <span>👁️ 6.6K</span>
                <span>💬 6</span>
                <span>❤️ 252</span>
            </div>
        </div>

        <!-- Thông tin truyện -->
        <div class="p-3 pt-2">
            <h2 class="font-semibold text-lg hover:text-blue-600 transition-colors duration-300">
                <a href="{{ $url }}">{{ $title }}</a>
            </h2>


            <!-- 3 Chapter mới nhất -->
            <div class="flex flex-col gap-1 mt-2">
                @foreach($chapters as $chapter)
                    <a href="{{ $url }}" class="text-gray-900 hover:text-red-500">{{ $chapter }}</a>
                @endforeach
            </div>
        </div>
    </button>
</div>
