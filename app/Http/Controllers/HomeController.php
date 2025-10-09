<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('app_pages.home.index'); // Trả về view resources/views/home.blade.php
    }

   
}
