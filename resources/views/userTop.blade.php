@extends('layouts.custom')

@section('content')

<div class="container">
    <!-- bannersテーブルにレコードがあれば表示、無しの場合はサンプル画面表示 -->
    @if(count($banners) > 0)
        <div id="carouselBannerIndicators" class="carousel slide text-center" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($banners as $key => $banner)
                <button type="button" data-bs-target="#carouselBannerIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-label="Slide{{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($banners as $key => $banner)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/'. $banner->image) }}" alt="" class="banner-size">
                </div>
                @endforeach
            </div>
        </div>
    @else
        <div id="carouselBannerIndicators" class="carousel slide text-center" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="carouselBannerIndicators" data-bs-slide="0" class="active" aria-current="true" aria-label="Slide1"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                   <img src="https://placehold.jp/36348d/ffffff/700x300.png" alt="サンプル画像" class="banner-size">
                </div>
            </div>  
        </div>
    @endif

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