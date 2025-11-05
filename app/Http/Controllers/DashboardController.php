<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Genre;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        view()->share('currentPage', 'dashboard');
    }

    public function index()
    {
        $countUser = User::count();
        $countComic = Comic::count();
        $countGenre = Genre::count();

        return view('admin::dashboard', [
            'countUser' => $countUser,
            'countComic' => $countComic,
            'countGenre' => $countGenre,
        ]);
    }
}
