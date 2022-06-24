<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newArticle = new Article();

        $newArticle->title = $data['title'];
        $newArticle->author = $data['author'];
        $newArticle->content = $data['content'];
        $newArticle->published = isset($data['published']);
        $newArticle->category_id = $data['category_id'];
        $newArticle->slug = $this->getSlug($newArticle->title);
        $newArticle->save();

        if(isset($data['tags'])){
            $newArticle->tags()->sync($data['tags']);        
        }

        return redirect()->route('admin.articles.show', $newArticle->id);
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
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
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
        $data = $request->all();

        if($article->title != $data['title']) {
            $article->title = $data['title'];

            $slug = Str::of($article->title)->slug('-');
            if($slug != $article->slug){
                $article->slug = $this->getSlug($article->title);
            }
        }
        
        $article->author = $data['author'];
        $article->content = $data['content'];
        $article->published = isset($data['published']);
        $article->category_id = $data['category_id'];
        $article->update();

        if(isset($data['tags'])){
            $article->tags()->sync($data['tags']);        
        }
        return redirect()->route('admin.articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index');
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while(Article::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        };

        return $slug;
    }
}
