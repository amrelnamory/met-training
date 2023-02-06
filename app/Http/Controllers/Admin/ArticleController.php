<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('article_category')->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article_categories = ArticleCategory::get();
        return view('admin.articles.create', compact('article_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'article_category_id' => 'required',
            'title' => 'required|max:191|min:10',
            'content' => 'required|min:30',
            'image' => 'required|image|mimes:png,jpg',
        ]);

        if ($image = $request->file('image')) {

            $name = $image->hashName();

            $data['image'] = $image->storeAs('articles', $name, 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article has been Saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article_categories = ArticleCategory::get();
        return view('admin.articles.edit', compact('article', 'article_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'article_category_id' => 'required',
            'title' => 'required|max:191|min:10',
            'content' => 'required|min:30',
            'image' => 'nullable|image|mimes:png,jpg',
        ]);

        if ($image = $request->file('image')) {

            Storage::disk('public')->delete($article->image);
            
            $name = $image->hashName();

            $data['image'] = $image->storeAs('articles', $name, 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article has been Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article has been Deleted.');
    }
}
