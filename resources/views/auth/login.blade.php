<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="http://localhost:8000/"><b>Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login in to start your session</p>
            <x-guest-layout>
                <x-jet-validation-errors class="mb-2"/>

                @if (session('status'))
                    <div class="form-control red">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        {{--                                <x-jet-label  for="email" value="{{ __('Email') }}" />--}}
                        {{--                                <input type="email" class="form-control" placeholder="Email">--}}

                        <x-jet-input id="email" class="form-control" type="email" placeholder="Enter Email" name="email"
                                     :value="old('email')" required autofocus/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <x-jet-input id="password" class="form-control" type="password" name="password"
                                     placeholder="Enter password" required autocomplete="current-password"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>


                    {{--                        <div class="mt-2">--}}
                    {{--                                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
                    {{--                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Enter password" required autocomplete="current-password" />--}}
                    {{--                            </div>--}}

                    <div class="row">
                        <div class="col-8">
                            <input type="checkbox" value="remember_me" id="remember_me" name="remember_me">
                            <label for="remember_me">
                                Remember Me
                            </label>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <x-jet-button class="btn btn-primary btn-block">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>


            </x-guest-layout>

            {{--
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                {{--                <a href="{{url('auth/facebook')}}" class="btn btn-block btn-primary">--}}
                {{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
                {{--                </a>
                <a href="{{url('auth/google')}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google
                </a>
            </div>
        --}}
            <!-- /.social-auth-links -->
            <p class="mb-0">
                @if (Route::has('password.request'))
                    <a class="text-center"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
