@extends('layouts.admin')
@section('title', 'Thể loại')

@section('vite_js')
    @vite('resources/js/admin/theloai/index.js')
@endsection

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Danh sách thể loại</h1>

        <button id="btnAddGenre" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 my-4">
            + Thêm thể loại
        </button>
        <div class="mb-4 flex items-center space-x-2">
            <input type="text" id="searchInput" data-search-url="{{ route('admin.genre.search') }}" placeholder="Tìm theo tên thể loại..."
                class="border rounded p-2 w-full md:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div id="genreList">
            @if ($genres->count())
                @include('admin.partials.genre_cards', ['genres' => $genres])


                {{-- <div class="mt-6">
                {{ $genres->links() }}
            </div> --}}
            @else
                <p>Chưa có thể loại nào.</p>
            @endif
        </div>
        <form action="{{ route('admin.genre.store') }}" method="POST">
            @csrf
            <div class="absolute inset-0 bg-gray-800/75 flex justify-center items-center hidden" id="createPopup">
                <div class="relative bg-white text-gray-950 p-6 rounded-xl w-96 opacity-100 z-50">
                    <!-- Nút tắt -->
                    <button type="button"
                        class="absolute top-3 right-3 text-gray-500 hover:text-white bg-gray-200 hover:bg-red-500 rounded-full w-7 h-7 flex items-center justify-center shadow-md transition"
                        onclick="this.closest('#createPopup').classList.add('hidden')">
                        ✕
                    </button>

                    <h2 class="text-xl font-semibold mb-4 text-center">Nhập thông tin</h2>
                    @error('name')
                        <div class= "text-red-900">{{ $message }}</div>
                    @enderror
                    <!-- Thêm name để gửi dữ liệu -->
                    <span id="genreValidationError" class="hidden"
                        data-has-error="{{ $errors->has('name') ? '1' : '0' }}"></span>

                    <input value="{{ old('name') }}" type="text" name="name" id="name"
                        placeholder="Tên thể loại" class="border rounded w-full p-2 mb-3">
                    <!-- Nút submit -->
                    <button class="bg-blue-500 text-white w-full py-2 rounded hover:bg-blue-600" type="submit">
                        Thêm
                    </button>
                </div>
            </div>
        </form>


    </div>

@endsection
