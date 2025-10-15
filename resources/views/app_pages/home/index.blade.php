@extends('layouts.app')

@section('title', 'Trang chủ - WebTruyen')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('blocks.slide')

        {{-- Truyện mới cập nhật --}}
        <section class="mt-8">
            <h2 class="text-xl font-semibold px-4 sm:px-6 lg:px-8">📚 Truyện mới cập nhật</h2>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                    <!-- Card Truyện 1 -->
                    <x-story-card></x-story-card>

                    <!-- Card Truyện 2 -->
                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://s2.anhvip.xyz/comics/con-trai-ut-cua-dai-phap-su-lung-danh.jpg"
                                alt="Con Trai Út Của Đại Pháp Sư Lừng Danh" class="w-full h-60 object-cover rounded-t-2xl">
                            <div
                                class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white text-xs rounded-lg px-2 py-1 flex gap-2">
                                <span>👁️ 98.8K</span>
                                <span>💬 9</span>
                                <span>❤️ 818</span>
                            </div>
                        </div>
                        <div class="p-3 pt-2">
                            <h2 class="font-semibold text-lg hover:text-blue-600 truncate">
                                <a href="#">Con Trai Út Của Đại Pháp Sư Lừng Danh</a>
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">Thể loại: Action, Manhwa, Fantasy</p>
                            <p class="text-sm text-gray-500">Chương mới nhất: <a href="#"
                                    class="text-blue-500">Chapter
                                    98</a></p>
                        </div>
                    </div>

                    <!-- Card Truyện 3 -->
                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                        <!-- Nội dung tương tự Card 2 -->
                    </div>

                    <!-- Card Truyện 4 -->
                    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                        <!-- Nội dung tương tự Card 2 -->
                    </div>

                </div>
            </div>
            </section>

            <x-pagination></x-pagination>
    </div>
@endsection
