<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::get();
        $sliderArticles = Article::where('show_slider', 1)->inRandomOrder()->take(5)->get();

        // dd($mostRecentArticle);
        return view('front.articles.index', [
            'articles' => $articles,
            'sliderArticles' => $sliderArticles,
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('front.articles.show', compact('article'));
    }
}
