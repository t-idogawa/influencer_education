@extends('layouts.custom')

@section('content')

<div class="container">
    <div id="carouselBannerIndicators" class="carousel slide text-center" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="carouselBannerIndicators" data-bs-slide="0" class="active" aria-current="true" aria-label="Slide1"></button>
            <button type="button" data-bs-target="carouselBannerIndicators" data-bs-slide="1" aria-label="Slide2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://placehold.jp/36348d/ffffff/700x300.png" alt="サンプル画像" class="banner-size">
            </div>
            <div class="carousel-item">
                <img src="https://placehold.jp/c8cfdf/ffffff/700x300.png" alt="サンプル画像" class="banner-size">
            </div>
        </div>
    </div>

    <div class="mx-auto" style="width: 80%; padding-top: 20px;">
      <h3 class="">お知らせ</h3>
         <div class="card" >
             <div class="card-body">
                @foreach ($articles as $article)
                  <a href="">{{$article->posted_date}} {{ $article->title }}</a>
                @endforeach
             </div>
         </div>
    </div>
</div>
@endsection