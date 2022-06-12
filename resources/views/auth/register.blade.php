{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Sign In</title>
    <!--favicon-->
    <link rel="icon" href="{{env('APP_URL').'assets/images/favicon.ico'}}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{env('APP_URL').'assets/css/bootstrap.min.css'}}" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{env('APP_URL').'assets/css/animate.css'}}" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{env('APP_URL').'assets/css/icons.css'}}" rel="stylesheet" type="text/css"/>
    <!-- Custom Style-->
    <link href="{{env('APP_URL').'assets/css/app-style.css'}}" rel="stylesheet"/>
</head>
<body>

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div id="wrapper">

    <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
    <div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="text-center">
                    <img src="assets/images/logo-icon.png" alt="logo icon">
                </div>
                <div class="card-title text-uppercase text-center py-3">Sign Up</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername" class="sr-only">First Name</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="firstName" name="firstName" class="form-control input-shadow @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}" required autocomplete="email" autofocus placeholder="Enter First Name">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername" class="sr-only">Last Name</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="lastName" name="lastName" class="form-control input-shadow @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required autocomplete="email" autofocus placeholder="Enter Last Name">
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername" class="sr-only">Contact</label>
                        <div class="position-relative has-icon-right">
                            <input type="text" id="contact" name="contact" class="form-control input-shadow @error('contact') is-invalid @enderror" value="{{ old('contact') }}" required autocomplete="email" autofocus placeholder="Enter Contact No">
                            <div class="form-control-position">
                                <i class="icon-phone icons"></i>
                            </div>
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername" class="sr-only">Email</label>
                        <div class="position-relative has-icon-right">
                            <input type="email" id="email" name="email" class="form-control input-shadow @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword" class="sr-only">Password</label>
                        <div class="position-relative has-icon-right">
                            <input type="password" id="password" class="form-control input-shadow @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="icheck-material-primary">
                                <input type="checkbox" id="user-checkbox" checked="" />
                                <label for="user-checkbox">Remember me</label>
                            </div>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="form-group col-6 text-right">
                                <a href="{{ route('password.request') }}">Reset Password</a>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
        <div class="card-footer text-center py-3">
            <p class="text-dark mb-0">Do not have an account? <a href="{{ route('login') }}"> Sign In here</a></p>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- sidebar-menu js -->
<script src="assets/js/sidebar-menu.js"></script>
<!-- Custom scripts -->
<script src="assets/js/app-script.js"></script>
</body>
</html>
