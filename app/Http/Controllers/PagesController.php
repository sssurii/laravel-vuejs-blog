<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function blog()
    {
        return view('blog');
    }

    public function register()
    {
        return view('register');
    }
}
