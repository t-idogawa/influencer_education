@extends('layouts.app')

@section('title', 'パスワード変更')

@section('content')

<div id="container">
    <div class="back">
        <a href="{{ route('profile.show') }}">←戻る</a>
    </div>

    <h1 class="title">パスワード変更</h1>

    <div id="profile__form__courner">
        <form action="{{ route('password.edit') }}" method="POST">
        @csrf
            <input type="hidden" name="id" class="form-control" value="{{ $id }}">
            <dl>
                <dt>旧パスワード</dt>
                <dd>
                    <input type="text" name="password_old" class="form-control" value="">
                    @if($errors->has('password_old'))
                        <p>{{ $errors->first('password_old') }}</p>
                    @endif
                </dd>
            </dl>
            
            <dl>
                <dt>新パスワード</dt>
                <dd>
                    <input type="text" name="password" class="form-control" value="">
                    @if($errors->has('password'))
                        <p>{{ $errors->first('password') }}</p>
                    @endif
                </dd>
                </dd>
            </dl>
            
            <dl>
                <dt>新パスワード確認</dt>
                <dd>
                    <input type="text" name="password_confirmation" class="form-control" value="">
                    @if($errors->has('password_confirmation'))
                        <p>{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </dd>
            </dl>

            <button type="submit">登録</button>
        @csrf
        </form>
    </div> 
</div><!-- #container -->

@endsection
