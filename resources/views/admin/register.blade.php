@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="text-end mt-5">
                <a class="fs-4 text-secondary text-decoration-none" href="{{route('admin.login')}}">ログインはこちら</a>
            </div>
                
            <div>
                <p class="m-5 fs-1 text-secondary text-center" >新規管理ユーザー登録</p>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/register') }}">
                        @csrf

                        <div class="row mt-5">
                            <label for="name" class="text-secondary col-md-4 col-form-label text-md-end fs-5">{{ __('ユーザーネーム') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror rounded-0" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row py-2">
                            <label for="kana" class="text-secondary col-md-4 col-form-label text-md-end fs-5">{{ __('カナ') }}</label>

                            <div class="col-md-4">
                                <input id="kana" type="kana" class="form-control @error('kana') is-invalid @enderror rounded-0" name="kana" value="{{ old('kana') }}" required autocomplete="kana" autofocus>

                                @error('kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <label for="email" class="text-secondary col-md-4 col-form-label text-md-end fs-5">{{ __('メールアドレス') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row py-2">
                            <label for="password" class="fs-5 text-secondary col-md-4 col-form-label text-md-end ">{{ __('パスワード') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-0" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <label for="password" class="fs-5 text-secondary col-md-4 col-form-label text-md-end ">{{ __('パスワード確認') }}</label>

                            <div class="col-md-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                                <button type="submit" class="fs-2 btn btn-secondary rounded-0 btn-lg mt-5 p-0 px-5 ">
                                    {{ __('ログイン') }}
                                </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
