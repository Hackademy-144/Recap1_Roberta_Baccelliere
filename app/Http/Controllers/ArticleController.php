<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view("article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create([
            'title'=> $request->input('title'),
            'subtitle'=> $request->input('subtitle'),
            'body'=> $request->input('body'),
            'img'=> $request->has('img')? $request->file('img')->store('public/cover') : '/img/gufojpg.jpg',
        ]);

        $article->tags()->attach($request->input('tag_id'));

        return redirect()->route('home')->with('message','Articolo pubblicato con successo!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title'=> $request->input('title'),
            'subtitle'=> $request->input('subtitle'),
            'body'=> $request->input('body'),
            'img'=> $request->has('img')? $request->file('img')->store('public/cover') : $article->img
        ]);

        $article->tags()->sync($request->input('tag_id'));
        return redirect(route('article.index'))->with('message', 'Articolo modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect(route('article.index'))->with('message', 'Articolo eliminato con successo!');
    }
}
