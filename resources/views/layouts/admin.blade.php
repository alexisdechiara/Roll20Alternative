<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <link rel="stylesheet" href="{{ asset('/css/roll20Alternative.css') }}" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/css/ready.css">
    <link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper pt-0">
            <div class="user">
                <div class="photo">
                    <?php
                    $user = \Illuminate\Support\Facades\Auth::user();
                    ?>
                    <img src="{{ ($user['profile_picture'] !== NULL) ? $user['profile_picture'] : asset("/img/user.svg")}}">
                </div>
                <div class="info">
                    <a href="{{ route('profile') }}">
                        <span>
                            {{ $user['first_name'] . ' ' . $user['last_name'] }}
                            <span class="user-level">{{ userSlug($user) }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item @yield('dashboard')">
                    <a href="{{ route('dashboard') }}">
                        <i class="la la-dashboard"></i>
                        <p>{{__('admin.dashboard')}}</p>
                    </a>
                </li>
                <li class="nav-item @yield('users')">
                    <a href="{{ route('dashboard_users') }}">
                        <i class="la la-users"></i>
                        <p>{{__('admin.members')}}</p>
                    </a>
                </li>
                <li class="nav-item @yield('parties')">
                    <a href="{{ route('dashboard_parties') }}">
                        <i class="la la-gamepad"></i>
                        <p>{{__('admin.games')}}</p>
                    </a>
                </li>
                <li class="nav-item @yield('characters')">
                    <a href="{{ route('dashboard_characters') }}">
                        <i class="la la-newspaper-o"></i>
                        <p>{{__('admin.character_sheets')}}</p>
                    </a>
                </li>
            <!--<li class="nav-item">
                    <a href="{{ route('dashboard_migrations') }}">
                        <i class="la la-database"></i>
                        <p>{{__('admin.migrations')}}</p>
                    </a>
                </li>-->
            </ul>
        </div>
    </div>
    <div class="main-panel mt-0">
        <div class="content mt-0">
            <div class="container-fluid">
        @yield('content')
            </div>
        </div>
        <footer class="footer row m-0 p-0">
            <div class="col text-left align-self-center">
                <p class="d-inline-block d-md-flex align-items-md-center footer-left">IUT Nice Côte d'azur - UCA</p>
            </div>
            <div class="col-auto text-center align-self-center"><a class="link" href="{{route('about-us')}}">{{__('about-us.about')}}</a></div>
            <div class="col text-right align-self-center">
                <div class="btn-group dropup">
                    <a class="btn btn-sm dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class=" m-auto image-small p-1" src="{{asset(__("nav.flag"))}}">
                        {{__("nav.acronym_language")}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('lang', ['locale' => 'fr']) }}"><img class="image-small p-1" src="{{asset('/img/France.svg')}}">Français</a>
                        <a class="dropdown-item" href="{{ route('lang', ['locale' => 'en']) }}"><img class="image-small p-1" src="{{asset('/img/United-states.svg')}}">English</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chartist/chartist.min.js"></script>
<script src="../assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/js/ready.min.js"></script>
</html>
