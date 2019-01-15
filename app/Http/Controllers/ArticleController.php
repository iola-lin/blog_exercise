<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $articles = $user->articles()->paginate(5);
        return view('articles.list', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $article = $user->articles()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $tags_id = $request->tags;
        $article->tags()->attach($tags_id);

        return redirect('/articles/'.$article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * @TODO: 處理line break的顯示
     */
    public function show($id)
    {
        // TODO: change to something like policy or middleware
        $user = auth()->user();
        $article = Article::find($id);
        if ($user->id === $article->user_id) {
            return view('articles.info', ['article' => $article]);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // TODO: change to something like policy or middleware
        $user = auth()->user();
        $article = Article::with('tags')->find($id);
        if ($user->id === $article->user_id) {
            return view('articles.edit', ['article' => $article]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: change to something like policy or middleware
        $user = auth()->user();
        $article = Article::find($id);
        if ($user->id === $article->user_id) {
            $article->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

            $tags_id = $request->tags;
            $article->tags()->sync($tags_id);

            return redirect('/articles/'.$article->id);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: change to something like policy or middleware
        $user = auth()->user();
        $article = Article::find($id);
        if ($user->id === $article->user_id) {
            $article->delete();
            return back()->withInput();
        } else {
            abort(403);
        }
    }
}
