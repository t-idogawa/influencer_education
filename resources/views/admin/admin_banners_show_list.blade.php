@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                    <div>
                    <a type="button" class="btn btn-secondary btn-lg m-2" href="{{route('admin.home')}}">←戻る</a>
                    <p class="fs-1">バナー管理</p>
                    </div>
                        <form action="" class="ms-5 ps-5">
                            <div class="d-flex justify-content-start ms-5">
                                <div class="ms-5 ps-2">
                                    <img src="https://placehold.jp/250x150.png" class="img-fluid m-2 p-2 max-width: 100%; , height: auto; " alt="...">
                                </div>
                                    <div class="mt-5 mx-2">
                                        <div class="input-group m-2 p-2">
                                            <label type="button" class="input-group-text px-3 fs-4" for="formFile">ファイルを選択</label>
                                            <input type="file" id="formFile" style="display: none;">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <form action="">
                                            <input type="button" class="btn btn-danger btn-circle rounded-circle p-0 mt-2 ms-2"  style="width:2rem;height:2rem;" value="ー">
                                        </form>
                                    </div>
                            </div>
                        </form>
    </div>
</div>

@endsection