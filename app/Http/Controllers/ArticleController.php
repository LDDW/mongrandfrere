<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles', [
            'articles' => Article::all()
        ]);
    }

    public function admin()
    {
        return view('admin.articles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required|in:draft,published'
        ]);

        $article = Article::create([
            'title' => ucfirst($request->title),
            'content' => $request->content,
            'status' => $request->status, 
            'img_path' => '',
        ]);

        return redirect()->route('admin.articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // verify that the article is published
        if (!$article->published) {
            abort(404);
        }

        return view('article', [
            'article' => $article,
            'latestArticles' => Article::latest()->take(3)->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function preview(Article $article) 
    {
        return view('admin.article_preview', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return redirect()->route('admin.articles');
    }
}
