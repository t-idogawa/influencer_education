@extends('layouts.custom')

@section('content')

<div class="container">
    <div class="row">
        <a href="">←戻る</a>
        <!-- 左側動画表示部分 時間内なら動画、時間外なら画像を表示 -->
        @if($viewFlg === true)
            <div class="col-md-6 text-center movie">
              <iframe src="$curriculums->video_url" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>></iframe>
            </div>
        @elseif($viewFlg === false)
            <div class="col-md-6 text-center">
              <img src="{{ asset('storage/'. $curriculums->thumbnail) }}" alt="" class="thumbnail">
            </div>
        @else <!-- 仮 -->
            <div class="col-md-6 text-center">
              <img src="{{ asset('storage/'. $curriculums->thumbnail) }}" alt="" class="">
            </div>
        @endif
        <!-- 右側ボタン部分 -->
        <div class="col-md-6 align-items-center d-flex justify-content-center">
         @if(($progress === '' || $progress === 0) && $viewFlg = true) <!-- $progressが空文字または0、かつ配信時間内 -->
           <button id="check-btn" class="btn btn-clear btn-lg" data-id="{{ $curriculums->id }}">受講しました</button>
         @elseif(($progress === '' || $progress === 0) && $viewFlg = false) <!-- $progressが空文字または0、かつ配信時間外 -->
           <button id="check-btn" class="btn btn-clear btn-lg" data-id="{{ $curriculums->id }}" disabled>配信時間外</button>
         @elseif(isset($progress) && $progress === 1) <!-- $progressが設定されている&1の場合 -->
           <button id="check-btn" class="btn btn-clear btn-lg" data-id="{{ $curriculums->id }}" disabled>受講済み</button>
         @else <!-- $progressが0でも1でもない場合(想定していない数字) -->
           <button id="check-btn" class="btn btn-clear btn-lg" data-id="{{ $curriculums->id }}">受講しました</button>
         @endif
        </div>
        <div>
           <div class="delivery rounded">{{ $curriculums->classes->name }}</div>
           <h3 style="margin: 10px;">{{ $curriculums->title }}</h3>
           <p style="margin: 10px;">{{ $curriculums->description }}</p>
        </div>
    </div>
</div>
@endsection