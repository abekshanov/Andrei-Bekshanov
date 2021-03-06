<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  {{--подключение ajax--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{--    из trusty.layout--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{--верхнее меню--}}
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Athlete-profile') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <a class="navbar-brand" href="#!">Мои тренировки</a>
                            <a class="navbar-brand" href="{{route('functional-profile')}}">Мои показатели</a>
                            <div class="btn-group">
                                <a href="#!" class="navbar-brand dropdown-toggle" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Тестирование</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('list-tests')}}">Тесты</a>
                                    <a class="dropdown-item" href="#!">Результаты</a>
                                    <a class="dropdown-item" href="#!">Динамика</a>
                                </div>
                            </div>
                        @endauth
                        @role(['superadministrator', 'admin'])
                            <div class="btn-group">
                                <a href="#!" class="navbar-brand dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Пользователи</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('trusty.users.index') }}">Все пользователи</a>
                                    <a class="dropdown-item" href="{{ route('trusty.roles.index') }}">Роли</a>
                                    <a class="dropdown-item" href="{{ route('trusty.permissions.index') }}">Права</a>
                                </div>
                            </div>
                        @endrole
                        @role(['coach'])
                            <div class="btn-group">
                                <a href="#!" class="navbar-brand dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Атлеты</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#!">1</a>
                                    <a class="dropdown-item" href="#!">2</a>
                                    <a class="dropdown-item" href="#!">3</a>
                                </div>
                            </div>
                            <a class="navbar-brand" href="{{ route('training-programs') }}">Программы</a>
                            <a class="navbar-brand" href="#!">Отчеты атлетов</a>
                        @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> {{-- div Collapse--}}
            </div>
        </nav>

        <main class="py-4">
            {{--Вывод ошибок или статуса--}}
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="my-0 py-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
             <!--end-->
            @yield('content')
        </main>
    </div>
</body>
</html>
