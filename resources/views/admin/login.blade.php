@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="text-end mt-5">
                <a class="fs-4 text-secondary text-decoration-none" href="{{route('admin.register')}}">新規会員登録はこちら</a>
            </div>
                
            <div>
                <p class="m-5 fs-1 text-secondary text-center" >管理画面ログイン</p>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/login') }}">
                        @csrf

                        <div class="row mt-5  py-4">
                            <label for="email" class="text-secondary col-md-4 col-form-label text-md-end fs-5">{{ __('メールアドレス') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <label for="password" class="fs-5 text-secondary col-md-4 col-form-label text-md-end ">{{ __('パスワード') }}</label>
                            
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-0" name="password" required autocomplete="current-password">
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
