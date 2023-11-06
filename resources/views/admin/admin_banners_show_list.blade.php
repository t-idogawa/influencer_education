@extends('layouts.admin')

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <a type="button" class="btn btn-light btn-lg mx-2 fs-4" href="{{ route('admin.home') }}">←戻る</a>
                <p class="fs-1">バナー管理</p>
            </div>
            <form  action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="ms-5 ps-5">
                @csrf
                <!-- 一覧表示 -->
                
                @foreach($banners as $banner)
                <div class="input-group ms-5 ps-5 mx-2">
                    <div class="ms-5 ps-5">
                        <img src="{{ asset('storage/'. $banner->image) }}" alt="" width="250" height="150">
                    </div>
                    <div class="m-5">
                        <label type="button" class="input-group-text m-2 p-2 px-3 fs-4" for="image">ファイルを選択</label>
                    </div>
                    <div  class="mt-5 p-2">
                        <input type="file" name="image" style="display: none;">
                        <!-- 削除ボタン -->
                        <button type="submit" formaction="{{ route('admin.banners.destroy', $banner->id) }}" formmethod="POST" class="btn btn-danger btn-circle rounded-circle p-0 mt-2 ms-2" style="width:2rem;height:2rem;">ー</button>
                        @csrf
                    </div>
                </div>
                @endforeach
                    <!-- 登録フォーム -->
                    <input type="button" class="btn btn-success btn-circle rounded-circle p-0 mt-2 ms-2" style="width:2rem;height:2rem;" value="+" onclick="addBannerInput()">
                        <div id="banner-container" class="text-center">
                        <input type="file" id="image" name="image" style="display: none;">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="fs-5 btn btn-secondary rounded-0 btn-lg mt-5 p-0 px-5">
                                {{ __('登録') }}
                            </button>
                        </div>

            </form>
        </div>
    </div>
</body>
<script src="{{ asset('js/banner.js') }}"></script>
@endsection
