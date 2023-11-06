@extends('layouts.app')

@section('content')

<body id="timetableContent">
<ul class="list-inline d-flex flex-row bd-highlight">
    <li class="ms-3"><a type="button" class="text-decoration-none fs-3 text-dark">←戻る</a></li>
            <li class="ms-3">
            <a type="button" class="text-decoration-none fs-2 text-dark ms-3 mt-3" id="prevMonthButton" data-class-id="{{ $class_id }}">◀︎</a>
        </li>
        <li class="ms-3 mt-3">
            <a type="button" class="text-decoration-none fs-2 text-dark " id="currentMonthLabel">
                {{ $currentYear }}年{{ $currentMonth }}月スケジュール
            </a>
        </li>
        <li class="ms-3">
            <a type="button" class="text-decoration-none fs-2 text-dark mt-3" id="nextMonthButton" data-class-id="{{ $class_id }}">▶︎</a>
        </li>
        <input type="hidden" id="currentYear" value="{{ $currentYear }}">
        <input type="hidden" id="currentMonth" value="{{ $currentMonth }}">
        <input type="hidden" id="classId" value="{{ $class_id }}">

    <!-- headerに学年を表示 -->
    <div class="d-flex flex-column align-self-start m-2">
        @foreach($classes as $class)
            @if($class_id == $class->id)
            @if (strpos($class->name, '中学校') !== false)
                            <a href="#"
                            class="button junior-highschool-btn text-decoration-none fs-4 text-light text-center rounded-pill m-3 px-5 py-1"  >{{ $class->name }}</a>
                        @elseif (strpos($class->name, '高校') !== false) 
                            <a href="#" 
                            class="button highschool-btn text-decoration-none fs-4 text-light text-center rounded-pill m-3 px-5 py-1" >{{ $class->name }}</a>
                        @else
                        <a href="#"
                        class="button primary-school text-decoration-none fs-4 text-light text-center rounded-pill m-3 px-5 py-1">{{ $class->name }}</a>
                        @endif
            @endif
        @endforeach
    </div>
</ul>


<div class="d-flex">
    <form action="" class="mt-5 pt-5">
        <div class="bd-highlight">
            <div class="d-flex flex-column align-self-start bd-highlight ms-5 ps-5">
            <div class="d-flex flex-row mb-3">
                <!-- 学年選択ボタン -->
                <div class="d-flex flex-column align-self-start w-50">
                    @foreach($classes as $class)
                        @if (strpos($class->name, '中学校') !== false) 
                            <a id="gradeButton_{{ $class->id }}" href="#" 
                                class="button junior-highschool-btn text-decoration-none text-light text-center rounded-pill m-2 py-1" data-class-id="{{ $class_id }}">{{ $class->name }}</a>
                        @elseif (strpos($class->name, '高校') !== false) 
                            <a id="gradeButton_{{ $class->id }}" href="#" 
                                class="button highschool-btn text-decoration-none text-light text-center rounded-pill m-2 py-1" data-class-id="{{ $class_id }}">{{ $class->name }}</a>
                        @else
                            <a id="gradeButton_{{ $class->id }}" href="#" 
                                class="button primary-school text-decoration-none text-light text-center rounded-pill m-2 py-1" data-class-id="{{ $class_id }}">{{ $class->name }}</a>
                        @endif
                    @endforeach
                </div>
           <!-- カリキュラムと月別時間割を表示 -->
<div  class="row row-cols-1 row-cols-md-3 g-4 mx-5 px-5 pt-2 h-25">
    @foreach($curriculums as $curriculum)
        @if($curriculum->classes_id = $class->id)
            <div class="col ">
                <div class="card card-sm">
                    <img src="{{ asset('storage/'.$curriculum->thumbnail)}}" class="img-fluid m-2 p-2" alt="...">
                    <div class="card-body">
                        <ul class="list-group list-group-flush list-inline">
                            <li class="mb-3">
                                <a type="button" class="text-decoration-none text-dark" href="{{$curriculum->video_url}}">{{$curriculum->title}}</a>
                            </li>
                            @foreach($delivery_times as $delivery_time)
                                @if($curriculum->id === $delivery_time->curriculums_id)
                                    @if($curriculum->alway_delivery_flg == 1)
                                        <li><a class="text-decoration-none text-dark" href="{{$curriculum->video_url}}">常時公開</a></li>
                                    @else
                                        <li><a class="text-dark text-decoration-none" href="{{$curriculum->video_url}}">{{ $delivery_time->formatted_delivery }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>


    </div>
</div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/timetable.js') }}"></script>
@endsection