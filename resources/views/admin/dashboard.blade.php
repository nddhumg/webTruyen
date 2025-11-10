@extends('layouts.admin')

@section('title', 'Quản lý - Admin Dashboard')
@section('head')
    @vite('resources/js/admin/dashboard.js')
@endsection
@section('content')

    <!-- Main content -->
    <main class="flex-1 p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Tổng quan</h2>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md">
                <p class="text-gray-500">Tổng số truyện</p>
                <p id="totalComics" class="text-2xl font-bold text-blue-600">{{ $countComic }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md">
                <p class="text-gray-500">Tổng số thể loại</p>
                <p id="totalGenres" class="text-2xl font-bold text-green-600">{{ $countGenre }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md">
                <p class="text-gray-500">Tổng số người dùng</p>
                <p id="totalUsers" class="text-2xl font-bold text-purple-600">{{ $countUser }}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md">
                <p class="text-gray-500">Bình luận mới</p>
                <p id="newComments" class="text-2xl font-bold text-red-600">0</p>
            </div>
        </div>

        <!-- Chart -->
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <h3 class="text-xl font-semibold mb-3">Thống kê lượt xem truyện</h3>
            <canvas id="viewsChart" height="100"></canvas>
        </div>

        <!-- Recent activities -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold mb-4">Hoạt động gần đây</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-left">
                        <th class="p-3 border-b">Người dùng</th>
                        <th class="p-3 border-b">Hành động</th>
                        <th class="p-3 border-b">Thời gian</th>
                    </tr>
                </thead>
                <tbody id="activityTable"></tbody>
            </table>
        </div>
    </main>
@endsection
