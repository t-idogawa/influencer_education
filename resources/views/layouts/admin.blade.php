<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    @auth
        <nav class="navbar navbar-expand-md navbar-light p-4 bg-info">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">
                    <div>
                        <a type="button" class="btn btn-secondary btn-lg m-2" href="{{route('classes.show.list')}}">授業管理</a>
                    </div>
                    <div>
                        <a type="button" class="btn btn-secondary btn-lg m-2" href="{{route('articles.show.list')}}">お知らせ管理</a>
                    </div>
                    <div>
                        <a type="button" class="btn btn-secondary btn-lg m-2" href="{{route('banners.show.list')}}">バナー管理</a>
                    </div>
                    </ul>
                    <ul class="navbar-nav ms-auto">

                            <li class="nav-item">
                                <div type="button" class="btn">
                                    <a class="btn link-light fs-3" role="button" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
