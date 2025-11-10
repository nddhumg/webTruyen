<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComicRequest;
use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage', 'comic');
    }

    public function index(Request $request)
    {
        $comics = Comic::with('latestChapter')->get();

        return view('adminComic::index', ['comics' => $comics]);
    }

    public function edit(Request $request, $id)
    {
        $comic = Comic::with('genres')->findOrFail($id);
        $genres = Genre::all();

        return view('adminComic::edit', ['comic' => $comic, 'genres' => $genres]);
    }

    public function create(Request $request)
    {
        $genres = Genre::all();

        return view('adminComic::create', ['genres' => $genres]);
    }

    public function createChapter($id) {}

    public function store(CreateComicRequest $request)
    {
        $comic = Comic::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'cover_image' => $request->cover_image,
        ]);
        $genres = $request->input('genres', []);
        if (is_array($genres) && count($genres) === 1 && str_contains($genres[0], ',')) {
            $genres = explode(',', $genres[0]);
        }
        $genres = array_filter($genres, fn ($id) => $id != 0);
        $genres = array_map('trim', $genres);
        $genres = array_map('intval', $genres);
        if (! empty($genreIds)) {
            $comic->genres()->attach($genreIds);
        }

        return redirect()->route('admin.comic.index')->with('success', 'Truyện đã được tạo!');
    }

    public function update(Request $request, $id)
    {
        $comic = Comic::findOrFail($id);

        // 2. Cập nhật các trường cơ bản
        $comic->title = $request->input('title');
        $comic->author = $request->input('author');
        $comic->description = $request->input('description');
        $comic->save();

        if ($request->has('genres')) {
            $genre_comics = $this->changeToArray($request->input('genres'));
            $comic->genres()->sync($genre_comics);
        }

        return redirect()->route('admin.comic.index')->with('success', 'Truyện đã được sửa!');
    }

    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('admin.comic.index')->with('success', 'Đã xóa truyện thành công!');
    }

    private function changeToArray($object)
    {
        if (is_array($object) && count($object) === 1 && str_contains($object[0], ',')) {
            $object = explode(',', $object[0]);
        }
        $object = array_map('trim', $object);
        $object = array_map('intval', $object);

        return $object;
    }
}
