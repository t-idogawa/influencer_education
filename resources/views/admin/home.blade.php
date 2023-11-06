@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                <p class='text-secondary'>ユーザー名：{{Auth::user()->name}}</p>
                <p class='text-secondary'>メールアドレス：{{Auth::user()->email}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
