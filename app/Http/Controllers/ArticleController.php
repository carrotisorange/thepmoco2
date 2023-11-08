<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::orderBy("created_at","desc")->paginate(10);

        return view('website.articles.index',[
            'articles' => $articles
        ]);
    }

    public function show($id){
        $article = Article::find($id);

        $articles = Article::orderBy("created_at","desc")->limit(5)->get();

        return view('website.articles.show',[
            'articles' => $articles,
            'article' => $article
        ]);
    }
}
