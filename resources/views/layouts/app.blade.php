<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bjora') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/register.js') }}" defer></script>
    <script src="{{ asset('js/time-stamp.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand text-danger" href="{{ url('/') }}">
                    {{ config('app.name', 'Bjora') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @guest

                        @else
                            <li class="nav-item pl-2">
                                <a class="nav-link text-white" href="/user/{{ Auth::id() }}/questions">{{ __('My Question') }}</a>
                            </li>
                            <li class="nav-item pl-1">
                                <a class="nav-link text-white" href="/user/{{ Auth::id() }}/inbox">{{ __('Inbox') }}</a>
                            </li>
                    @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item border border-primary rounded bg-primary">
                                <a class="nav-link text-white" href="{{ route('add_question') }}">{{ __('Add Question') }}</a>
                            </li>
                            <li class="nav-item pl-4 pr-4">
                                <a class="nav-link text-white" href="/user/{{Auth::id()}}">{{ __('Profile') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bg-dark shadow-sm pb-2">
            <div class="container">
                <div id="displayDateTime" class="text-white"></div>
            </div>
        </div>
        <div class="content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <footer class="footer bg-dark pt-2 pb-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-white d-inline">&copy 2019 Copyright</div>
                    <div class="text-danger d-inline">&nbspBjora.com</div>
                </div>
            </div>
        </footer> 
    </div>
</body>
</html>
