<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/roll20Alternative.css') }}" type="text/css">
@yield('styles')

<!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    @yield('scripts')

</head>
<body class="bg-white">
<header class="mb-4">
    <nav class="navbar navbar-light navbar-header navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-nowrap text-capitalize" href="{{route('home')}}">
            <img class="img-fluid mr-1" src={{asset("/img/Dice.svg")}} width="25" alt="Logo"><span class="title">Roll20Alternative</span></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link font-weight-bold" href="{{route('create')}}">{{__('nav.game.create')}}</a></li>
                    <li class="nav-item"><a class="nav-link font-weight-bold" href="{{route('join')}}">{{__('nav.game.join')}}</a></li>
                    <li class="nav-item"><a class="nav-link font-weight-bold" href="{{route('createCharacter')}}">{{__('nav.charsheet')}}</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link mr-1 font-weight-bold" href="{{route('profile')}}">{{__('nav.account')}}</a></li>
                        <li><a class="btn btn-danger" role="button" href="{{route('logout')}}">{{__('profile.button.logout')}}</a></li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="window.location='{{route('login')}}'">{{__('profile.login')}}
                                </button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Autres</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('login')}}">{{__('profile.login')}}</a>
                                    <a class="dropdown-item" href="{{route('register')}}">{{__('profile.register')}}</a>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="mb-5">
    @yield('content')
</main>
<footer>
    <div class=" footer footer-app row bg-light">
        <div class="col text-left align-self-center">
            <p class="d-inline-block d-md-flex align-items-md-center footer-left">IUT Nice Côte d'azur - UCA</p>
        </div>
        <div class="col-auto text-center align-self-center"><a class="link" href="{{route('about-us')}}">{{__('about-us.about')}}</a></div>
        <div class="col text-right align-self-center">
            <div class="btn-group dropup">
                <a class="btn btn-sm dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class=" m-auto image-small p-1" src="{{asset(__('nav.flag'))}}">
                    {{__("nav.acronym_language")}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('lang', ['locale' => 'fr']) }}"><img class="image-small p-1" src="{{asset('/img/France.svg')}}">Français</a>
                    <a class="dropdown-item" href="{{ route('lang', ['locale' => 'en']) }}"><img class="image-small p-1" src="{{asset('/img/United-states.svg')}}">English</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
