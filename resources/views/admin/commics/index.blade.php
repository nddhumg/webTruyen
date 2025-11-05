@extends('layouts.admin')

@section('title', 'Truyện')
@section('vite_js')
    @vite('resources/js/admin/truyen/index.js')
@endsection

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Danh sách truyện</h1>

        @if ($commics->count())
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <colgroup>
                        <col class="w-[20px]" />
                        <col class="w-[100px]" />
                        <col class="w-[100px]" />
                        <col class="w-[130px]" />
                        <col class="w-[80px]" />
                        <col class="w-[10px]" />
                    </colgroup>
                    <thead>
                        <tr class="text-left bg-gray-50">
                            <th class="p-3 border">#</th>
                            <th class="p-3 border">Tên</th>
                            <th class="p-3 border">Tác giả</th>
                            <th class="p-3 border">Thể loại</th>
                            <th class="p-3 border">Mô tả</th>
                            <th class="p-3 border">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($commics as $commic)
                            <tr>
                                <td class="p-3 border">{{ $commic['id'] }}</td>
                                <td class="p-3 border">{{ $commic['title'] }}</td>
                                <td class="p-3 border">{{ $commic['author'] }}</td>
                                <td class="p-3 border">
                                    @foreach ($commic->genres as $genre)
                                        <span
                                            class="inline-block bg-gray-200 rounded px-2 py-1 text-sm">{{ Str::limit($genre->name, 10, '...') }}</span>
                                    @endforeach
                                </td>
                                <td class="p-3 border">{{ $commic['description'] }}</td>
                                <td class="p-3 border">
                                    <button data-url="{{ route('admin.commic.edit', $commic->id) }}"
                                        class="hover:bg-blue-600 editBtn px-2 py-1 border rounded mr-1">Sửa</button>
                                    <button data-id="{{ $commic->id }}"
                                        class="deleteBtn px-2 py-1 border rounded text-red-600">Xóa</button>
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
