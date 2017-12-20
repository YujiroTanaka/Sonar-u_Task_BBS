@extends('layout')

@section('content')

    <h1>{{ $article->title }}</h1>

    <hr/>

    @include('errors.form_errors')

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>
    <br />

    <p>投稿日時: {{ $article->updated_at }}</p>


        <br/>
        <div class="btn-toolbar">
        {!! link_to(route('articles.edit', [$article->id]), '編集', ['class' => 'btn btn-primary']) !!}

        {!! delete_form(['articles', $article->id]) !!}
        </div>

    <hr/>


    <h3>コメント</h3>

    <br />


    @foreach($article->comment as $single_comment)
     <h4><li>{{ $single_comment->comment }}</li></h4>
     {{ $single_comment->commenter }} さんより<br />
     {{ $single_comment->updated_at }}
     <br />
    @endforeach

    @if (Auth::check())
    <hr/>


    <h3>コメント投稿</h3>


    {!! Form::open(['url' => 'comments']) !!}


    {!! Form::open(['route' => 'comments.store'], array('class' => 'form')) !!}

 <div class="form-group">
     <label for="commenter" class="">名前</label>
     <div class="">
         {!! Form::text('commenter', null, array('class' => '')) !!}
     </div>
 </div>

 <div class="form-group">
     <label for="comment" class="">コメント</label>
     <div class="">
         {!! Form::textarea('comment', null, array('class' => '')) !!}
     </div>
 </div>

 {!! Form::hidden('article_id', $article->id) !!}

 <div class="form-group">
     <button type="submit" class="btn btn-primary">投稿する</button>
 </div>

 {!! Form::close() !!}



    @endif
    <br />
@endsection
