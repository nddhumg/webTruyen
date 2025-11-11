@extends('layouts.admin')

@section('title', 'Truyện')
@section('head')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    @vite('resources/js/admin/truyen/show.js')
@endsection
@section('content')
    <div class="p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Chi tiết truyện: {{ $comic->title }}</h1>

        <div class="flex gap-6">
            {{-- Ảnh bìa --}}
            <div>
                <img src="{{ $comic->cover_url }}" alt="{{ $comic->title }}" class="w-48 h-auto rounded">
            </div>

            {{-- Thông tin --}}
            <div class="flex-1">
                <p><strong>Tác giả:</strong> {{ $comic->author }}</p>
                <p><strong>Thể loại:</strong>
                    @foreach ($comic->genres as $genre)
                        <span class="px-2 py-1 bg-gray-200 rounded">{{ $genre->name }}</span>
                    @endforeach
                </p>
                {{-- <p><strong>Trạng thái:</strong> {{ $comic->status }}</p> --}}
                <p><strong>Số chương:</strong> {{ $comic->chapters ? $comic->chapters->count() : 0 }}</p>
                <p><strong>Ngày tạo:</strong> {{ $comic->created_at->format('d/m/Y') }}</p>
                <p><strong>Ngày cập nhật:</strong> {{ $comic->updated_at->format('d/m/Y') }}</p>

                <h2 class="mt-4 font-semibold">Mô tả:</h2>
                <p class="mt-1">{{ $comic->description }}</p>

                {{-- Nút hành động --}}
                <div class="mt-6 flex gap-3">
                    <a href="{{ route('admin.comic.edit', $comic->id) }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Chỉnh sửa</a>

                    <form action="{{ route('admin.comic.destroy', $comic->id) }}" method="POST"
                        onsubmit="return confirm('Bạn có chắc muốn xóa truyện này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Danh sách chapter --}}
    <div class="mt-8 bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Danh sách chương</h2>

        <a href="#" id= 'btnCreateChapter'
            class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            Thêm chương mới
        </a>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 text-left">Chapter</th>
                    <th class="border px-4 py-2 text-left">Ngày tạo</th>
                    <th class="border px-4 py-2 text-left">Ngày cập nhật</th>
                    <th class="border px-4 py-2 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody id='bodyTable'>
                @forelse($chapters as $chapter)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $chapter->chapter_number }}</td>
                        <td class="border px-4 py-2">{{ $chapter->created_at->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $chapter->updated_at->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('admin.chapter.edit', ['id' => $comic->id, 'idChapter' => $chapter->id]) }}"
                                class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Sửa</a>
                            <form
                                action="{{ route('admin.chapter.destroy', ['id' => $comic->id, 'idChapter' => $chapter->id]) }}"
                                method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa chương này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center">Chưa có chương nào</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $chapters->links() }}
        </div>
    </div>
    <div id="parentPopup" class="absolute inset-0 hidden bg-black/50 flex justify-center items-center">

        <!-- Nội dung popup -->
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative" id= 'popupCreateChapter'>
            <h2 class="text-xl font-bold mb-4">Thêm chương mới cho: {{ $comic->title }}</h2>

            <form action="{{ route('admin.chapter.store', $comic->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium mb-1">Số chương</label>
                    <input value="{{ $comic->latestChapter ? $comic->latestChapter->chapter_number + 1 : 1 }}"
                        type="number" min="1" name="chapter_number" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500 outline-none">

                </div>

                <div>
                    <label class="block font-medium mb-1">Chọn thư mục ảnh</label>
                    <input type="file" name="images[]" id="folder" webkitdirectory directory multiple
                        class="w-full border border-gray-300 rounded p-2">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" id="closePopupBtn"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                        Hủy
                    </button>

                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Lưu chương
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- <x-toast/> --}}
@endsection
