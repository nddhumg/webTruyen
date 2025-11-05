@extends('layouts.admin')

@section('title', 'Người dùng')
@section('vite_js')
    @vite('resources/js/admin/user/index.js')
@endsection
@section('content')

    <div class="min-h-screen p-6">
        <header class="mb-6">
            <h1 class="text-2xl font-semibold">Quản lý người dùng - Admin truyện</h1>
            <p class="text-sm text-gray-600">Danh sách, tìm kiếm, lọc, thêm, sửa, xóa người dùng</p>
        </header>

        <section class="bg-white shadow rounded-lg p-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                <div class="flex items-center gap-3">
                    <input id="searchInput" type="text" placeholder="Tìm kiếm theo tên, email, username..."
                        class="w-64 p-2 border rounded" />
                    <select id="roleFilter" class="p-2 border rounded">
                        <option value="">Tất cả vai trò</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="flex items-center gap-3">
                    <button id="btnAdd" class="px-3 py-2 bg-green-600 text-white rounded">Thêm người dùng</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <colgroup>
                        <col class="w-[30px]" />
                        <col class="w-[250px]" />
                        <col class="w-[200px]" />
                        <col class="w-[70px]" />
                        <col class="w-[80px]" />
                    </colgroup>
                    <thead>
                        <tr class="text-left bg-gray-50">
                            <th class="p-3 border">#</th>
                            <th class="p-3 border">Email</th>
                            <th class="p-3 border">Username</th>
                            <th class="p-3 border">Vai trò</th>
                            <th class="p-3 border">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @if ($users)
                            @foreach ($users as $user)
                                <tr>
                                    <td class="p-3 border">{{ $user['id'] }}</td>
                                    <td class="p-3 border">{{ $user['email'] }}</td>
                                    <td class="p-3 border">{{ $user['name'] }}</td>
                                    <td class="p-3 border">{{ $user['id'] }}</td>
                                    <td class="p-3 border">
                                        <button data-id="{{ $user }}"
                                            class="editBtn px-2 py-1 border rounded mr-1">Sửa</button>
                                        <button data-id="{{ $user }}"
                                            class="deleteBtn px-2 py-1 border rounded text-red-600">Xóa</button>
                                    </td>
                                <tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex items-center justify-between">
                <div id="infoText" class="text-sm text-gray-600">Hiển thị 0 người dùng</div>
                <div class="flex items-center gap-2">
                    <button id="prevPage" class="px-3 py-1 border rounded">Prev</button>
                    <span id="currentPageText" class="px-2">1</span>
                    <button id="nextPage" class="px-3 py-1 border rounded">Next</button>
                </div>
            </div>
        </section>
    </div>
    <div id="userModal" class="fixed inset-0 bg-white/70 hidden items-center justify-center">
        <div class="bg-neutral-50 rounded-lg w-full max-w-xl p-4 shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <h2 id="modalTitle" class="text-lg font-semibold">Thêm người dùng</h2>
                <button id="closeModal" class="text-gray-600">✕</button>
            </div>
            <form id="userForm" class="grid grid-cols-1 gap-3">
                <input type="hidden" id="userId" />
                <div>
                    <label class="block text-sm">Email</label>
                    <input id="emailInput" type="email" class="w-full p-2 border rounded" required />
                </div>
                <div>
                    <label class="block text-sm">Username</label>
                    <input id="usernameInput" type="text" class="w-full p-2 border rounded" required />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm">Vai trò</label>
                        <select id="roleInput" class="w-full p-2 border rounded">
                            <option value="user">User</option>
                            <option value="editor">Editor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 mt-3">
                    <button type="button" id="cancelBtn" class="px-3 py-2 border rounded">Hủy</button>
                    <button type="submit" id="saveBtn" class="px-3 py-2 bg-blue-600 text-white rounded">Lưu</button>
                </div>
            </form>
        </div>
    </div>

    <div id="confirmModal" class="fixed inset-0 bg-white/70 hidden flex items-center justify-center">
        <div class="bg-neutral-50  rounded-lg p-4 shadow-lg w-full max-w-sm">
            <p class="mb-4">Bạn có chắc muốn xóa người dùng này?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelDelete" class="px-3 py-2 border rounded">Hủy</button>
                <button id="confirmDelete" class="px-3 py-2 bg-red-600 text-white rounded">Xóa</button>
            </div>
        </div>
    </div>
@endsection
