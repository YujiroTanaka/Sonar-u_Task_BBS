@extends('layout')

@section('content')

    <h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>
    <br />

    <p>投稿日時: {{ $article->updated_at }}</p>


    @if (Auth::check())
        <br/>

        {!! link_to(route('articles.edit', [$article->id]), '編集', ['class' => 'btn btn-primary']) !!}

        <br/>
        <br/>

        {!! delete_form(['articles', $article->id]) !!}
    @endif

    <hr/>


    <h3>コメント</h3>

    <br />


    @foreach($article->comment as $single_comment)
     <h4><li>{{ $single_comment->comment }}</li></h4>
     <p>「{{ $single_comment->commenter }}」さんより</p>
     <br />
    @endforeach

    @if (Auth::check())
    <hr/>
    <br />





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



    @endif
    <br />
@endsection
