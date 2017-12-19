@extends('layout')

@section('content')
    <h1>スレッド作成</h1>

    <hr/>

    @include('errors.form_errors')

    {!! Form::open(['url' => 'articles']) !!}
        @include('articles.form', ['published_at' => date('Y-m-d'), 'submitButton' => '送信'])
    {!! Form::close() !!}
@endsection
