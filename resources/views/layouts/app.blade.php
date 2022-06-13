<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--favicon-->
    <link rel="icon" href="{{env('APP_URL')}}assets/images/favicon.ico" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{env('APP_URL')}}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="{{env('APP_URL')}}assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{env('APP_URL')}}assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{env('APP_URL')}}assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="{{env('APP_URL')}}assets/css/sidebar-menu.css" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="{{env('APP_URL')}}assets/css/app-style.css" rel="stylesheet"/>
    <!-- skins CSS-->
    <link href="{{env('APP_URL')}}assets/css/skins.css" rel="stylesheet"/>
    <!-- skins CSS-->
    <link href="{{env('APP_URL')}}assets/css/skins.css" rel="stylesheet"/>
    <!-- DataTables CSS-->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--Select Plugins-->
    <link href="{{env('APP_URL')}}assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
    <!--multi select-->
    <link href="{{env('APP_URL')}}assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">

    @yield('third_party_stylesheets')
</head>

<body>

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner"><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div id="wrapper">

    @include('layouts.sidebar')

    <!--Start topbar header-->
    <header class="topbar-nav">
        <nav id="header-setting" class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link toggle-menu" href="javascript:void();">
                        <i class="icon-menu menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <form class="search-bar">
                        <input type="text" class="form-control" placeholder="Enter keywords">
                        <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center right-nav-link">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                        <span class="user-profile"><img src="{{env('APP_URL')}}assets/images/avatars/avatar-13.png" class="img-circle" alt="user avatar"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item user-details">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <div class="avatar"><img class="align-self-start mr-3" src="{{env('APP_URL')}}assets/images/avatars/avatar-13.png" alt="user avatar"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
                                        <p class="user-subtitle">mccoy@example.com</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!--End topbar header-->
        <div class="clearfix"></div>
    @yield('content')

    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                Copyright © {{date('Y')}} Admin
            </div>
        </div>
    </footer>
    <!--End footer-->

    <!--start color switcher-->
    <div class="right-sidebar">
        <div class="switcher-icon">
            <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
        <div class="right-sidebar-content">


            <p class="mb-0">Header Colors</p>
            <hr>

            <div class="mb-3">
                <button type="button" id="default-header" class="btn btn-outline-primary">Default Header</button>
            </div>

            <ul class="switcher">
                <li id="header1"></li>
                <li id="header2"></li>
                <li id="header3"></li>
                <li id="header4"></li>
                <li id="header5"></li>
                <li id="header6"></li>
            </ul>

            <p class="mb-0">Sidebar Colors</p>
            <hr>

            <div class="mb-3">
                <button type="button" id="default-sidebar" class="btn btn-outline-primary">Default Header</button>
            </div>

            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>

        </div>
    </div>
    <!--end color switcher-->

</div><!--End wrapper-->


<!-- Bootstrap core JavaScript-->
<script src="{{env('APP_URL')}}assets/js/jquery.min.js"></script>
<script src="{{env('APP_URL')}}assets/js/popper.min.js"></script>
<script src="{{env('APP_URL')}}assets/js/bootstrap.min.js"></script>

<!-- simplebar js -->
<script src="{{env('APP_URL')}}assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="{{env('APP_URL')}}assets/js/sidebar-menu.js"></script>

<!-- Custom scripts -->
<script src="{{env('APP_URL')}}assets/js/app-script.js"></script>

<!--Peity Chart -->
<script src="{{env('APP_URL')}}assets/plugins/peity/jquery.peity.min.js"></script>

<!-- jQuery From Validation -->
<script src="{{env('APP_URL')}}assets/jquery.validate.min.js"></script>
<script src="{{env('APP_URL')}}assets/additional-methods.min.js"></script>
<!-- DataTables js -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!--Select Plugins Js-->
<script src="{{env('APP_URL')}}assets/plugins/select2/js/select2.min.js"></script>

@yield('scripts')
</body>
</html>
