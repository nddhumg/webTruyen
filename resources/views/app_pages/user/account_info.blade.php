@extends('layouts.app')
@php
use App\Services\ImageService;
@endphp
@section('title', 'Thông tin người dùng')
@section('content')
    <div class="container mx-auto p-4">
        <!-- Breadcrumb -->
        <ul class="flex text-gray-500 text-sm mb-6 space-x-2">
            <li><a href="/" class="hover:text-blue-600">Trang chủ</a> /</li>
            <li class="text-gray-700">Thông tin tài khoản</li>
        </ul>

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar -->
            <div class="md:w-1/4 w-full bg-white rounded-lg shadow p-4">
                <div class="flex flex-col items-center mb-4">

                    <img src="{{ Auth::user()->avatar ? ImageService::url(Auth::user()->avatar) : asset('img/user.png') }}"
                        alt="Avatar" class="w-24 h-24 rounded-full mb-2 object-cover">
                    <div class="text-center">
                        <p class="font-semibold">Tài khoản của</p>
                        <p class="font-medium text-gray-700 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <nav class="space-y-2">

                    <a href="{{ route('users.info') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">
                        <i class="fa fa-info-circle"></i> Thông tin tài khoản
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">
                        <i class="fal fa-book"></i> Truyện theo dõi
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100">
                        <i class="fa fa-comments"></i> Bình luận
                    </a>
                    <a href="{{ route('users.logout') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100 text-red-500">
                        <i class="fad fa-sign-out-alt"></i> Đăng xuất
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="md:w-3/4 w-full bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-bold mb-2">Thông tin tài khoản</h1>
                <h2 class="text-lg font-semibold text-gray-600 mb-4">Cập nhật thông tin tài khoản</h2>

                @if (session('success'))
                    <div class="p-3 bg-green-100 text-green-700 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- Cột trái -->
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-1">Tên</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1">Địa chỉ email</label>
                                <input type="email" value="{{ Auth::user()->email }}" disabled
                                    class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 cursor-not-allowed">
                            </div>
                        </div>

                        <!-- Cột phải -->
                        <div class="space-y-4">
                            <label class="block text-gray-700 mb-1">Avatar</label>
                            <img src="{{asset('img/user.png') }}"
                                alt="Avatar Preview" class="w-32 h-32 rounded-full object-cover mb-2" id="avatarPreview">
                            <input type="file" name="avatar" id="avatarInput" accept="image/*"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                file:rounded file:border-0 file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-500">jpg, jpeg, gif, png &lt; 2MB</p>
                            <p class="text-xs text-red-500">Nếu upload avatar tục tĩu sẽ bị khóa tài khoản vĩnh viễn</p>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                            Cập nhật
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const imgInput = document.getElementById('avatarInput');
            const avatarPreview = document.getElementById('avatarPreview');
            imgInput.addEventListener('change', (event) => {
                const [file] = event.target.files;
                if (file) {
                    avatarPreview.src = URL.createObjectURL(file);
                }
            });
        });
    </script>
@endsection
