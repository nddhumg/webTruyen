@extends('layouts.admin')

@section('title', 'Thêm chương')

@section('content')
    <div class="p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Thêm chương mới cho: {{ $comic->title }}</h1>

        <form action="{{ route('admin.chapter.store', $comic->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Số chương</label>
                <input type="number" name="number" value="{{ old('number') }}" required class="w-full border rounded p-2">
            </div>

            <input type="file" id="folder" name="images[]" webkitdirectory directory multiple
                style="padding:8px; border:1px solid #ccc; border-radius:6px; width:100%;">

            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                Lưu chương
            </button>
        </form>
    </div>
@endsection
