<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage', 'genre');
    }

    public function index(Request $request)
    {
        $genres = Genre::all();
        return view('adminGenre::index', ['genres' => $genres]);
    }

    public function store(CreateGenreRequest $request)
    {
        Genre::create([
            'name' => $request->name,
        ]);
        $genres = Genre::all();

        return redirect()->route('admin.genre.index')->with('success', 'Thể loại đã được tạo!');
    }

    public function search(Request $request)
    {
        $query = Genre::query();

        if ($search = $request->input('q')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $genres = $query->get();

        return view('admin.partials.genre_cards', compact('genres'));
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('admin.genre.index')->with('success', 'Đã xóa thể loại thành công!');
    }
    // public function create() {}   // Hiển thị form tạo mới
    // public function show($id) {}  // Hiển thị chi tiết 1 user
    // public function edit($id) {}  // Hiển thị form sửa
    // public function update($id) {}// Cập nhật user
}
