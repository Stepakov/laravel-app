<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::allPaginate( 10 );
        return view( 'app.article.index', compact( 'articles' ) );
    }

    public function show( $slug )
    {
//        dd( $slug );
        $article = Article::findBySlug( $slug );
//        $articles = Article::allPaginate( 10 );
        return view( 'app.article.show', compact( 'article' ) );
    }

    public function allByTag( Tag $id )
    {
//        dd( 'asdf' );
        $articles = $id->articles()->findByTag();
//        $articles = Article::findByTag( $tag, 7 );
//        $articles = Article::allPaginate( 10 );
        return view( 'app.article.byTag', compact( 'articles' ) );
    }
}
