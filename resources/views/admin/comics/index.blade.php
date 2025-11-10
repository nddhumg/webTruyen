@extends('layouts.admin')

@section('title', 'Truyện')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/admin/truyen/index.js')
@endsection

@section('content')
    <div class="container mx-auto py-8  h-full">
        <h1 class="text-2xl font-bold mb-6">Danh sách truyện</h1>

        @if ($comics->count())
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <colgroup>
                        <col style="width: 40px" />
                        <col style="width: 200px" />
                        <col style="width: 150px" />
                        <col style="width: 100px" />
                        <col style="width: 100px" />
                        <col style="width: 140px" />
                    </colgroup>
                    <thead>
                        <tr class="text-left bg-gray-50 ">
                            <th class="p-3 border text-center">#</th>
                            <th class="p-3 border text-center">Tên</th>
                            <th class="p-3 border text-center">Ảnh bìa</th>
                            <th class="p-3 border text-center">Chap mới nhất</th>
                            <th class="p-3 border text-center">Ngày cập nhập</th>
                            <th class="p-3 border text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($comics as $comic)
                            <tr>
                                <td class="p-3 border">{{ $comic['id'] }}</td>
                                <td class="p-3 border">{{ $comic['title'] }}</td>
                                <td class="p-3 border text-center">ảnh</td>
                                @if ($comic->latestChapter)
                                    <td class="p-3 border text-center">
                                        {{ $comic->latestChapter->chapter_number }}
                                    </td>
                                    <td class="p-3 border text-center">
                                        {{ $comic->latestChapter->chapter_number->created_at }}
                                    </td>
                                @else
                                    <td class="p-3 border text-center">
                                        Chưa có chap
                                    </td>
                                    <td class="p-3 border text-center">
                                        Chưa có chap
                                    </td>
                                @endif

                                <td class="p-3 border">
                                    <div class="flex grid grid-cols-2 items-center gap-2">
                                        <button data-url="{{ route('admin.comic.edit', $comic->id) }}"
                                            class="comicBtn col-span-2  px-3 py-1 rounded bg-blue-500 text-white border border-blue-600 hover:bg-blue-600 hover:shadow transition-all">
                                            Chi tiết
                                        </button>

                                        <button data-url="{{ route('admin.comic.edit', $comic->id) }}"
                                            class="editBtn px-3 py-1 rounded bg-yellow-200 text-yellow-700 border border-yellow-500 hover:bg-yellow-300 hover:shadow transition-all">
                                            Sửa
                                        </button>

                                        <button data-id="{{ $comic->id }}"
                                            data-url="{{ route('admin.comic.destroy', $comic->id) }}"
                                            class="deleteBtn px-3 py-1 rounded bg-red-600 text-white border border-red-700 hover:bg-red-700 hover:shadow transition-all">
                                            Xóa
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Chưa có truyện nào.</p>
        @endif

        <div id="modalOverlay" class="fixed inset-0 bg-black/40 flex items-center hidden justify-center z-50">
            <div id="modalBox" class="bg-white rounded-lg shadow-lg p-6 w-80">
                <h2 class="text-lg font-semibold mb-4 text-center">Xác nhận xóa?</h2>
                <div class="flex justify-center gap-4">
                    <button id="cancelBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Hủy</button>
                    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700" id="deleteBtn"
                        name="submit">Xóa</button>
                </div>
            </div>
        </div>
    </div>

@endsection
