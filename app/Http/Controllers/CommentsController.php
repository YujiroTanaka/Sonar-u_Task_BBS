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


      \Session::flash('flash_message', 'コメントを追加しました。');


      return redirect()->route('articles.show', [$request->get('article_id')]);
  }
    //
}
