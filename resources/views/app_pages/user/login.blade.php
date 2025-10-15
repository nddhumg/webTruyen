@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('content')
    <div class="flex justify-center mt-12">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-gray-100">ĐĂNG NHẬP</h1>

            <form action="{{ route('login') }}" method="POST" class="space-y-4" novalidate>
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-1">Email</label>
                    <div class="relative">
                        <input  value="{{ old('email') }}" type="email" name="email" placeholder="Email" autofocus
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 dark:bg-gray-700 dark:text-gray-100">
                        <i class="fas fa-envelope absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                @error('email')
                    <div class= "text-red-900">{{ $message }}</div>
                @enderror
                <!-- Password -->
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-1">Mật khẩu</label>
                    <div class="relative">
                        <input type="password" name="password" placeholder="Password"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 dark:bg-gray-700 dark:text-gray-100">
                        <i class="fas fa-lock absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                @error('password')
                    <div class= "text-red-900">{{ $message }}</div>
                @enderror
                <!-- Remember + Submit -->
                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center space-x-2 text-gray-700 dark:text-gray-200">
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-yellow-400">
                        <span>Ghi nhớ</span>
                    </label>

                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        Đăng nhập
                    </button>
                </div>
            </form>

            <!-- Social login -->
            <div class="mt-6 text-center">
                <a href="."
                    class="inline-block w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-lg transition-colors duration-200">
                    <i class="fab fa-google-plus-g mr-2"></i> Đăng nhập bằng Google
                </a>
            </div>

            <!-- Register link -->
            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-yellow-500 hover:underline font-medium">
                    Đăng ký thành viên mới
                </a>
                <p class="text-red-500 mt-2 text-sm">
                    *Lưu ý: Sử dụng đăng nhập bằng Google để trải nghiệm đọc truyện được tốt nhất.
                </p>
            </div>
        </div>
    </div>
@endsection
