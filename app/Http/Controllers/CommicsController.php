<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommicRequest;
use App\Models\Commics;
use App\Models\Genres;
use Illuminate\Http\Request;

class CommicsController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage', 'commic');
    }

    public function index(Request $request)
    {
        $commics = Commics::with('genres')->get();
        $genres = Genres::all();

        return view('adminCommic::index', ['commics' => $commics, 'genres' => $genres]);
    }

    public function edit(Request $request, $id)
    {
        $comic = Commics::with('genres')->findOrFail($id);
        $genres = Genres::all();

        return view('adminCommic::edit', ['comic' => $comic, 'genres' => $genres]);
    }

    public function create(Request $request)
    {
        $genres = Genres::all();

        return view('adminCommic::create', ['genres' => $genres]);
    }

    public function store(CreateCommicRequest $request)
    {
        $commic = Commics::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'cover_image' => $request->cover_image,
        ]);

        $genres = $request->input('genres');
        if (is_array($genres) && count($genres) === 1 && str_contains($genres[0], ',')) {
            $genres = explode(',', $genres[0]);
        }
        $genres = array_map('trim', $genres);
        $genres = array_map('intval', $genres);
        $commic->genres()->attach($genres);

        return redirect()->route('admin.commic.index')->with('success', 'Truyện đã được tạo!');
    }

    public function update(Request $request, $id)
    {
        $comic = Commics::findOrFail($id);

        // 2. Cập nhật các trường cơ bản
        $comic->title = $request->input('title');
        $comic->author = $request->input('author');
        $comic->description = $request->input('description');
        $comic->save();

        if ($request->has('genres')) {
            $genre_commics = $this->changeToArray($request->input('genres'));
            $comic->genres()->sync( $genre_commics);
        }

        return redirect()->route('admin.commic.index')->with('success', 'Truyện đã được sửa!');
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
