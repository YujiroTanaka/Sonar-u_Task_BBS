<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommentController;
use App\Article;
use App\Comment;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index() {
        $articles = Article::latest('updated_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id) {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request) {

        \Auth::user()->articles()->create($request->all());

        \Session::flash('flash_message', 'スレッドを追加しました。');

        return redirect()->route('articles.index');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        \Session::flash('flash_message', 'スレッドを編集しました!!');

        return redirect()->route('articles.show', [$article->id]);
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);

        $article->delete();
        \Session::flash('flash_message', 'スレッドを削除しました!!');
        return redirect()->route('articles.index');
    }

    //
}
