@extends('layouts.app')

@section('title', 'お知らせ一覧')

@section('content')

<div id="container">
    <div class="back">
        <a href="">←戻る</a>
    </div>

    <div id="articles__box">
        <p class="date">{{ $articles->year }}年{{ $articles->month }}月{{ $articles->day }}日</p>
        <h1 class="title">{{ $articles->title }}</h1>
        <p class="contents">{{ $articles->article_contents }}</p>
    </div><!-- #articles__box__admin -->

</div><!-- #container -->

@endsection
