@extends('layouts.custom')

@section('content')

<div class="container">
    <div class="row">
        <a href="">←戻る</a>
        <div class="col-md-6 text-center movie">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/-cX9tXJEq1U?si=-nLQL35kV_11K--V" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-md-6 align-items-center d-flex justify-content-center">
         @if($progress === '' || $progress === 0) 
           <button id="check-btn" class="btn btn-clear btn-lg" data-id="{{ $curriculums->id }}">受講しました</button>
         @elseif(isset($progress) && $progress === 1)
           <button id="check-btn" class="btn btn-clear btn-lg" data-id="{{ $curriculums->id }}" disabled>受講済み</button>
         @else
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