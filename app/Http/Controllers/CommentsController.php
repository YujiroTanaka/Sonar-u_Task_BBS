<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controllers\ArticlesController;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ArticleRequest;
use App\Comment;
use App\Article;
use Carbon\Carbon;

class CommentsController extends Controller
{

  protected $comments;

     public function __construct(Comment $comments)
     {
         $this->comments = $comments;
     }

  public function store(CommentRequest $request) {



    $data = [
         'comment' => $request->get('comment'),
         'commenter' => $request->get('commenter'),
         'article_id' => $request->get('article_id')
     ];
     $this->comments->create($data);

    //$data = $request->all();
    //$id = get_the_ID();

    //Comment::create([
        //'comment' => $data['comment'],
        //'commenter' => $data['commenter'],
      //'article_id' => $id
    //]);


    //\Auth::user()->articles()->create($request->all());
      //$inputs = \Request::all();
      //Comment::create($inputs);


      //\Auth::articles()->comments()->create($request->all());

      \Session::flash('flash_message', 'コメントを追加しました。');

      //$inputs = \Request::all();

        //Comment::create($inputs);

      return redirect()->route('articles.index');
  }
    //
}
