<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->limit(5)->get();
        return view('home', [
            'news' => $news
        ]);
    }
}
