@extends('layouts.app')

@section('title', 'Trang chủ - WebTruyen')

@section('content')
    {{-- Banner / Slider --}}
    <section class="mb-6">
        <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl p-8 text-white text-center shadow">
            <h1 class="text-3xl font-bold mb-2">Chào mừng đến với WebTruyen</h1>
            <p class="text-lg">Đọc truyện online miễn phí – cập nhật nhanh nhất!</p>
        </div>
    </section>

    {{-- Truyện nổi bật (fake data) --}}
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4">🔥 Truyện nổi bật</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @for ($i = 1; $i <= 10; $i++)
                <a href="#" class="block bg-white rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://placehold.co/300x400?text=Truyen+{{ $i }}" alt="Truyện {{ $i }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-800 text-sm line-clamp-2">Truyện {{ $i }} - Tiêu đề mẫu</h3>
                        <p class="text-xs text-gray-500 mt-1">Tác giả {{ $i }}</p>
                    </div>
                </a>
            @endfor
        </div>
    </section>

    {{-- Truyện mới cập nhật (fake data) --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">📚 Truyện mới cập nhật</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                    <a href="#" class="block">
                        <h3 class="text-lg font-semibold text-gray-800 hover:text-indigo-600">Truyện mới {{ $i }}</h3>
                        <p class="text-sm text-gray-500">Tác giả {{ $i }}</p>
                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                            Đây là mô tả ngắn cho truyện {{ $i }}. Nội dung mẫu giúp bạn xem giao diện hiển thị khi chưa có dữ liệu thật.
                        </p>
                    </a>
                </div>
            @endfor
        </div>
    </section>
@endsection
