@extends('layouts.app')

@section('title', 'プロフィール変更')

@section('content')

<div id="container">
    <div class="back">
        <a href="">←戻る</a>
    </div>

    <h1 class="title">プロフィール変更</h1>

    <div id="profile__form__courner">
        <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="id" class="form-control" value="{{ $profiles->id }}">
            <div class="profile__img__box">
                <div class="profile__img">
                    <img src="{{ asset('storage/' . $profiles->profile_image) }}">
                </div>
                <div class="profile__chenge">
                    <h3>プロフィール画像</h3>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    @if($errors->has('profile_image'))
                        <p>{{ $errors->first('profile_image') }}</p>
                    @endif
                </div>
            </div>

            <dl>
                <dt>ユーザーネーム</dt>
                <dd>
                    <input type="text" name="name" class="form-control" value="{{ $profiles->name }}">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </dd>
            </dl>
            
            <dl>
                <dt>カナ</dt>
                <dd>
                    <input type="text" name="name_kana" class="form-control" value="{{ $profiles->name_kana }}">
                    @if($errors->has('name_kana'))
                        <p>{{ $errors->first('name_kana') }}</p>
                    @endif
                </dd>
                </dd>
            </dl>
            
            <dl>
                <dt>メールアドレス</dt>
                <dd>
                    <input type="text" name="email" class="form-control" value="{{ $profiles->email }}">
                    @if($errors->has('email'))
                        <p>{{ $errors->first('email') }}</p>
                    @endif
                </dd>
                </dd>
            </dl>
            
            <dl>
                <dt>パスワード</dt>
                <dd>
                    <a href="{{ route('password') }}" class="password__link">パスワードを変更する</a>
                </dd>
                </dd>
            </dl>

            <button type="submit">登録</button>
        @csrf
        </form>
    </div> 
</div><!-- #container -->

@endsection
