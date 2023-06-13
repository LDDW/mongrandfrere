<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Usernotnull\Toast\Concerns\WireToast;

class ArticleController extends Controller
{
    use WireToast;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles', [
            'articles' => Article::orderBy('created_at', 'desc')->get(),
            'latestArticles' => Article::latest()->take(3)->get(),
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
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // verify that the article is published
        if ($article->status !== 'published') {
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
     * Publish the specified resource.
     */
    public function publish(string $id)
    {
        $backtrace = debug_backtrace()[0];

        try {
            // update article status to published
            Article::where('id', $id)->update([
                'status' => 'published'
            ]);
            
            // toast success for ui
            toast()
                ->success('L\'article a bien été publié !', 'Publication réussite')
                ->pushOnNextPage();
            
            // log success
            Log::info('Article published', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->danger('L\'article n\'a pas été publié !', 'Erreur')
                ->pushOnNextPage();

            // log error 
            Log::error('Erreur avec la publication de l\'article', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
        }

        return redirect()->route('admin.articles');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::where('id', $id)->firstOrFail();

        return view('admin.article', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'string',
            'status' => 'required|in:draft,published'
        ]);

        $backtrace = debug_backtrace()[0];

        try {
            // update article
            Article::where('id',$id)->update([
                'title' => ucfirst($request->title),
                'content' => $request->content,
                'status' => $request->status, 
                'img_name' => isset($filename) ? $filename : '',
            ]);

            // if ($request->hasFile('img')) {
            //     $image = $request->file('img');
            //     $filename = $image->getClientOriginalName(). '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('/articles'), $filename);
            // }

            // image upload 
            if(isset($request->img)){
                $image = $request->file('img');
                $filename = $image->getClientOriginalName(). '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/articles'), $filename);
            }

            // toast success for ui
            toast()
                ->success('L\'article a bien été mise à jour !', 'Mise à jour réussite')
                ->pushOnNextPage();
            
            // log success
            Log::info('Article updated', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->danger('L\'article n\'a pas été mise à jour !', 'Erreur')
                ->pushOnNextPage();

            // log error 
            Log::error('Erreur avec la mise à jour de l\'article', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
        }

        return redirect()->route('admin.articles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $backtrace = debug_backtrace()[0];

        try {
            // delete article
            Article::destroy($article->id);

            // toast success for ui
            toast()
                ->success('L\'article a bien été supprimé !', 'Suppression réussite')
                ->pushOnNextPage();

            // log success
            Log::info('Article deleted', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (QueryException $qe) {
            // toast error for ui
            toast()
                ->danger('L\'article n\'a pas été supprimé !', 'Erreur')
                ->pushOnNextPage();

            // log error 
            Log::error('Erreur avec la suppression de l\'article', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $qe->getMessage(),
            ]);
        }
        return redirect()->route('admin.articles');
    }
}
