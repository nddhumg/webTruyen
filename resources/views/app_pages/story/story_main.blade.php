@extends('layouts.app')
@section('title', 'Chi tiết truyện')
@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6 bg-white shadow-lg rounded-2xl">
        <div class="flex flex-col md:flex-row gap-2">
            <!-- Ảnh truyện -->
            <div class="flex-shrink-0">
                <img src="https://s2.anhvip.xyz/comics/thien-tai-phep-thuat-nam-giu-khai-niem.jpg"
                    alt="Thiên Tài Phép Thuật Nắm Giữ Khái Niệm"
                    class="w-full md:w-72 aspect-[4/3] object-cover rounded-xl shadow-md">
                <div class="grid grid-cols-5 gap-4 p-4" id="danh_gia">
                    <img src="{{ asset('img/star-off.png') }}" class="">
                    <img src="{{ asset('img/star-off.png') }}" class="">
                    <img src="{{ asset('img/star-off.png') }}" class="">
                    <img src="{{ asset('img/star-off.png') }}" class="">
                    <img src="{{ asset('img/star-off.png') }}" class="">
                </div>
            </div>

            <div class="max-w-md mx-auto p-4 space-y-4">
                <!-- Thông tin chi tiết -->
                <ul class="space-y-3">
                    <li class="flex justify-between  pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-duotone fa-plus mr-2"></i>Tên khác
                        </p>
                        <p class="text-gray-600">Đang cập nhật</p>
                    </li>

                    <li class="flex justify-between  pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-light fa-user text-blue-500 mr-2"></i>Tác giả
                        </p>
                        <p class="text-gray-600">Đang cập nhật</p>
                    </li>

                    <li class="flex justify-between  pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-duotone fa-spinner fa-spin text-sky-500 mr-2"></i>Tình trạng
                        </p>
                        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Đang cập nhật</span>
                    </li>

                    <li class="flex items-center flex-wrap pb-2">
                        <p class="font-semibold text-gray-800 flex items-center mr-2">
                            <i class="fa-light fa-tags text-red-500 mr-2"></i>Thể loại:
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="text-blue-600 ring text-sm p-1">Action</a>
                            <a href="#" class="text-blue-600 ring text-sm p-1">Fantasy</a>
                            <a href="#" class="text-blue-600 ring text-sm p-1">Manhua</a>
                            <a href="#" class="text-blue-600 ring text-sm p-1">Truyện Màu</a>
                        </div>
                    </li>


                    <li class="flex justify-between   pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-light fa-users text-green-500 mr-2"></i>Nhóm dịch
                        </p>
                        <p class="text-gray-600">Đang cập nhật</p>
                    </li>

                    <li class="flex justify-between   pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-light fa-eye text-yellow-500 mr-2"></i>Lượt xem
                        </p>
                        <p class="text-gray-700">10.258</p>
                    </li>

                    <li class="flex justify-between   pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-duotone fa-thumbs-up mr-2"></i>Lượt thích
                        </p>
                        <p class="text-gray-700">21</p>
                    </li>

                    <li class="flex justify-between   pb-2">
                        <p class="font-semibold text-gray-800 flex items-center">
                            <i class="fa-duotone fa-heart text-pink-400 mr-2"></i>Theo dõi
                        </p>
                        <p class="text-gray-700 font-semibold">731</p>
                    </li>
                </ul>

                <!-- Xếp hạng -->
                <div class="text-center text-sm text-gray-700 bg-gray-50 p-2 rounded-md">
                    <p><span class="font-semibold text-gray-900">Mạt Thế: Nhân Hoàng Phiên Mời Chư Vị Nữ Đồ Đệ Nhập
                            Tọa</span></p>
                    <p>Xếp hạng: <span class="text-yellow-600 font-semibold">3.9</span>/5 - 7 lượt đánh giá</p>
                </div>

                <!-- Nút hành động -->
                <div class="flex flex-col sm:flex-row sm:justify-center gap-2">
                    <a href="#"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm flex items-center justify-center gap-2">
                        <i class="fa-regular fa-book"></i> <span>Đọc từ đầu</span>
                    </a>

                    <a href="#"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm flex items-center justify-center gap-2">
                        <i class="fa-light fa-heart"></i> <span>Theo dõi</span>
                    </a>

                    <a href="#"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm flex items-center justify-center gap-2">
                        <i class="fa-light fa-thumbs-up"></i> <span>Thích</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Danh sách chương -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Danh sách chương</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
                @for ($i = 1; $i <= 6; $i++)
                    <a href="#"
                        class="block bg-gray-50 hover:bg-blue-50 border border-gray-200 rounded-lg text-center py-2 text-sm text-gray-700 hover:text-blue-600 transition">
                        Chương {{ $i }}
                    </a>
                @endfor
            </div>
        </div>
    </div>
    <script>
        // const menuItems = document.getElementById('danh_gia');
        // menuItems.forEach(element => {

        // });
    </script>
@endsection
