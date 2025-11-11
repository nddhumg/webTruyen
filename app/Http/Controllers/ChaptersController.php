<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChapterRequest;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Comic;

class ChaptersController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage', 'comic');
    }

    public function create(Request $request, $idComic)
    {
        $comic = Comic::findOrFail($idComic);
        return view('adminChapter::create',['comic' => $comic]);
    }

    public function store(CreateChapterRequest $request, $id)
    {
        $comic = Comic::findOrFail($id);
        $chapter = $comic->chapters()->create([
            'chapter_number' => $request->chapter_number,
        ]);
        return redirect()->route('admin.comic.show', $comic->id);
    }

      public function destroy($id)
    {
        // $comic = Comic::findOrFail($id);
        // $comic->delete();
        // if (request()->wantsJson()) {
        //     return response()->json(['success' => true]);
        // }

        // return redirect()->route('admin.comic.index')->with('success', 'Đã xóa truyện thành công!');
    }
}
