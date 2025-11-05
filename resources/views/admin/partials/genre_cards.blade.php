<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 m-5">
    @foreach ($genres as $genre)
        <div
            class="flex flex-col bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-5 relative border border-gray-100">

            <!-- Badge HOT -->
            @if ($genre->is_hot)
                <span
                    class="absolute top-3 right-3 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow">
                    HOT
                </span>
            @endif

            <!-- Tên thể loại -->
            <h2 class="text-lg font-semibold mb-3 text-gray-900 truncate" title="{{ $genre->name }}">
                {{ $genre->name }}
            </h2>

            <!-- Phần hành động -->
            <div class="mt-auto pt-3 border-t border-gray-200 flex items-center justify-between text-sm font-medium">
                <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Xem chi tiết</a>
                <form action="{{ route('admin.genre.destroy', ['theloai' => $genre->id]) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc muốn xóa không?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">Xóa</button>
                </form>

            </div>
        </div>
    @endforeach
</div>
