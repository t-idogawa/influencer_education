@extends('layouts.app')

@section('title', 'お知らせ変更')

@section('content')

<div id="container">
    <div class="back">
        <a href="{{ route('articles.show.list') }}">←戻る</a>
    </div>

    <h1 class="title">お知らせ変更</h1>

    <div id="articles__form__courner">
        <form action="{{ route('articles.regist') }}" method="POST" >
        @csrf
            <input type="hidden" name="id" class="form-control" value="{{ $articles->id }}">
            <dl>
                <dt>投稿日時</dt>
                <dd>
                    <input type="date" name="posted_date" class="form-control" value="{{ $articles->date }}">
                    @if($errors->has('posted_date'))
                        <p>{{ $errors->first('posted_date') }}</p>
                    @endif
                </dd>
            </dl>
            
            <dl>
                <dt>タイトル</dt>
                <dd>
                    <input type="text" name="title" class="form-control" value="{{ $articles->title }}">
                    @if($errors->has('title'))
                        <p>{{ $errors->first('title') }}</p>
                    @endif
                </dd>
                </dd>
            </dl>
            
            <dl>
                <dt>本文</dt>
                <dd>
                    <textarea name="article_contents" class="form-control">@if($articles->article_contents){{ $articles->article_contents }}@endif</textarea>
                    @if($errors->has('article_contents'))
                        <p>{{ $errors->first('article_contents') }}</p>
                    @endif
                </dd>
            </dl>

            <button type="submit">登録</button>
        @csrf
        </form>
    </div> 
</div><!-- #container -->

@endsection
