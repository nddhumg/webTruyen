@extends('layouts.admin')

@section('title', 'Truyện')
@section('vite_js')
    @vite('resources/js/admin/truyen/index.js')
@endsection

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Danh sách truyện</h1>

        @if ($comics->count())
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <colgroup>
                        <col style="width: 40px" />
                        <col style="width: 200px" />
                        <col style="width: 150px" />
                        <col style="width: 150px" />
                        <col style="width: 300px" />
                        <col style="width: 85px" />
                        <col style="width: 120px" />
                    </colgroup>
                    <thead>
                        <tr class="text-left bg-gray-50 ">
                            <th class="p-3 border text-center">#</th>
                            <th class="p-3 border text-center">Tên</th>
                            <th class="p-3 border text-center">Tác giả</th>
                            <th class="p-3 border text-center">Thể loại</th>
                            <th class="p-3 border text-center">Mô tả</th>
                            <th class="p-3 border text-center">Chap mới nhất</th>
                            <th class="p-3 border text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($comics as $comic)
                            <tr>
                                <td class="p-3 border">{{ $comic['id'] }}</td>
                                <td class="p-3 border">{{ $comic['title'] }}</td>
                                <td class="p-3 border">{{ $comic['author'] }}</td>
                                <td class="p-3 border">
                                    @foreach ($comic->genres as $genre)
                                        <span
                                            class="inline-block bg-gray-200 rounded px-2 py-1 text-sm">{{ Str::limit($genre->name, 10, '...') }}</span>
                                    @endforeach
                                </td>
                                <td class="p-3 border">{{ $comic['description'] }}</td>
                                <td class="p-3 border">{{ $comic['author'] }}</td>
                                <td class="p-3 border">
                                    <div class="flex grid grid-cols-2 items-center gap-2">
                                        <button data-url="{{ route('admin.comic.edit', $comic->id) }}"
                                            class="addBtn col-span-2  px-3 py-1 rounded bg-blue-500 text-white border border-blue-600 hover:bg-blue-600 hover:shadow transition-all">
                                            Thêm chap
                                        </button>

                                        <button data-url="{{ route('admin.comic.edit', $comic->id) }}"
                                            class="editBtn px-3 py-1 rounded bg-yellow-200 text-yellow-700 border border-yellow-500 hover:bg-yellow-300 hover:shadow transition-all">
                                            Sửa
                                        </button>

                                        <button data-id="{{ $comic->id }}"
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
        {{-- <div id="editPopup" class="fixed  inset-0 bg-white/70 flex items-center justify-center">
            <div class="bg-neutral-50 p-6 rounded shadow-lg w-1/2">
                <h2 class="text-xl mb-4">Sửa thông tin</h2>
                <form id="editForm" class="flex flex-col gap-3">
                    <input id="inputId" type="text" name="name" placeholder="Tên" class="hidden" />
                    <input id="inputName" type="text" name="name" placeholder="Tên" class="border p-2 rounded" />
                    <input id="inputAuthor" type="text" name="author" placeholder="Tác giả"
                        class="border p-2 rounded" />
                    <div>
                        <div class="w-full h-[45px] rounded-sm border-1 border-gray-950">

                        </div>
                        <div id="box" class="w-full h-[45px] rounded-b-sm border-1  border-gray-950">
                            <span class="py-2">Nội dung xuất hiện khi click</span>
                            <span>Thêm dòng thứ 2</p>
                        </div>
                    </div>
                    <div id="dropdownMenu"
                        class="absolute z-10 mt-1 w-full bg-white border rounded-lg shadow-lg hidden max-h-60 overflow-auto">
                        <div class="grid grid-cols-2 gap-2 p-2">
                            @foreach ($genres as $genre)
                                <div class="truncate px-2 py-1 hover:bg-indigo-100 rounded cursor-pointer"
                                    data-value="{{ $genre->id }}">
                                    {{ $genre->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label for="description" class="block mb-1 font-medium text-gray-700">Mô tả</label>
                        <textarea id="inputDescription" name="description" rows="4" placeholder="Nhập mô tả truyện"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 max-h-64"></textarea>
                    </div>
                    <div class="flex justify-end gap-2 mt-3">
                        <button type="button" id="closeEdit"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Hủy</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Lưu</button>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>

@endsection
