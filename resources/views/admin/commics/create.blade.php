@extends('layouts.admin')

@section('title', 'Truyện')

@section('vite_js')
    @vite('resources/js/admin/truyen/create.js')
@endsection

@section('content')
    <div class=" p-8 w-full ">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Tạo truyện mới</h1>
        <form action="{{ route('admin.commic.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- Tên truyện -->
            <div>
                <label for="title" class="block mb-1 font-medium text-gray-700">Tên truyện</label>
                <input type="text" id="title" name="title" placeholder="Nhập tên truyện"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Tác giả -->
            <div>
                <label for="author" class="block mb-1 font-medium text-gray-700">Tác giả</label>
                <input type="text" id="author" name="author" placeholder="Nhập tên tác giả"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Thể loại -->
            <div class="relative w-full max-w-md">
                <label class="block mb-1 font-medium text-gray-700">Thể loại</label>

                <!-- Nút dropdown -->
                <button type="button" id="dropdownButton"
                    class="w-full px-4 py-2 border rounded-lg text-left bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    -- Chọn thể loại --
                </button>

                <!-- Menu dropdown -->
                <div id="dropdownMenu"
                    class="absolute z-10 mt-1 w-full bg-white border rounded-lg shadow-lg hidden max-h-60 overflow-auto">
                    <div class="grid grid-cols-2 gap-2 p-2">
                        @if (count($genres) != 0)
                            @foreach ($genres as $genre)
                                <div class="truncate px-2 py-1 hover:bg-indigo-100 rounded cursor-pointer"
                                    data-value="{{ $genre->id }}">
                                    {{ $genre->name }}
                                </div>
                            @endforeach
                        @else
                            <div>
                                Chưa có thể loại nào
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Hidden input lưu mảng thể loại -->
                <input type="hidden" name="genres[]" id="genresInput">
            </div>




            <!-- Mô tả -->
            <div>
                <label for="description" class="block mb-1 font-medium text-gray-700">Mô tả</label>
                <textarea id="description" name="description" rows="4" placeholder="Nhập mô tả truyện"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <!-- Ảnh bìa -->
            <div>
                <label for="cover" class="block mb-1 font-medium text-gray-700">Ảnh bìa</label>
                <input type="file" id="cover" name="cover_image"
                    class="w-full text-gray-700 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Nút submit -->
            <div class="text-center">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Tạo truyện
                </button>
            </div>
        </form>
    </div>
@endsection
