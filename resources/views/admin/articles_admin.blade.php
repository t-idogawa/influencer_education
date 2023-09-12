@extends('layouts.app')

@section('title', 'お知らせ一覧')

@section('content')

<div id="container">
    <div class="back">
        <a href="">←戻る</a>
    </div>

    <h1 class="title">お知らせ一覧</h1>

    <div class="regist__button__box">
        <a href="{{ route('articles.detail.admin.new') }}" class="button regist__btn">新規登録</a>
    </div>

    <div id="articles__box__admin">
        <table>
        <tr>
            <td>投稿日時</td>
            <td>タイトル</td>
            <td></td>
        </tr>
    @foreach ($articles as $article)
        <tr>
            <td><p class="date">{{ $article->year }}年{{ $article->month }}月{{ $article->day }}日</p></td>
            <td>
                <div class="title">
                    <p>{{ $article->title }}</p>
                </div>
            </td>
            <td>
                <div class="articles__button__courner">
                    <div class="regist__button__box">
                        <form action="{{ route('articles.detail.admin') }}" method="POST" >
                        @csrf
                            <input type="hidden" value="{{ $article->id }}" name="id">
                            <button type="submit" class="button fix__btn">変更する</button>
                        @csrf
                        </form>
                    </div>
                    <div class="regist__button__box">
                        <form method="POST" class="delete__form">
                        @csrf
                            <input type="hidden" value="{{ $article->title }}" name="title{{ $article->id }}" class="title{{ $article->id }}">
                            <button type="submit" class="button delete__btn" value="{{ $article->id }}">削除</button>
                        @csrf
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
        </table>
    </div><!-- #articles__box__admin -->

    <div id="modal__courner">
        <div class="modal">
            <p class="modal__title"></p>
            <p>削除してよろしいですか？</p>
            <div class="modal__button__courner">
                <div class="regist__button__box">
                    <form action="{{ route('articles.delete') }}" method="POST" >
                    @csrf
                        <input type="hidden" value="" name="id" class="modal__yes">
                        <button type="submit" class="button yes__btn">はい</button>
                    @csrf
                    </form>
                </div>
                <div class="regist__button__box">
                    <button type="submit" class="button no__btn">いいえ</button>
                </div>
            </div>
        </div>
    </div><!-- #modal__courner -->

</div><!-- #container -->

@endsection
