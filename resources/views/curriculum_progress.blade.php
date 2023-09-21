@extends('layouts.app')

@section('title', '授業進捗')

@section('content')

<div id="container">
    <div class="back">
        <a href="">←戻る</a>
    </div>
    
    <div id="curriculum__progress">
        <div id="progress__user__box">
            <div class="progress__user__img">
                <img src="{{ asset('storage/' . $users->profile_image) }}">
            </div>
            <div class="progress__user">
                <p>{{ $users->name }}さんの授業進捗</p>
                <p>現在の学年：<span class="primary">{{ $users->class }}</span></p>
            </div>
        </div><!-- #progress__user__box -->

        <div id="curriculum__progress__box">
            @foreach ($classes as $class)
                <div class="curriculum">
                    <p class="title {{ $class->level }}">{{ $class->name }}</p>
                    <ul>
                        @foreach ($curriculums as $curriculum)
                            @if($curriculum->classes_id === $class->id)
                                <li class="{{ $curriculum->progress }} {{ $curriculum->inactive }}"><a href="">{{ $curriculum->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach

        </div><!-- #curriculum__progress__box -->

        </div><!-- #curriculum__progress -->
</div><!-- #container -->

@endsection
