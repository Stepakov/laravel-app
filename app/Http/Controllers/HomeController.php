<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::lastLimit( 5 );
        return view( 'app.home', compact( 'articles' ) );
    }
}
