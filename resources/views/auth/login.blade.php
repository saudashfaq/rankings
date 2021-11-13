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
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
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

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
{{--                <a href="{{url('auth/facebook')}}" class="btn btn-block btn-primary">--}}
{{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--                </a>--}}
                <a href="{{url('auth/google')}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google
                </a>
            </div>
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
                <a href="http://localhost:8000/register" class="text-center">Register a new membership</a>
            </p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

{{--<x-guest-layout>--}}


{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="email" class="form-control" placeholder="Email">--}}
{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-envelope"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="password" class="form-control" placeholder="Password">--}}
{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-lock"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-8">--}}
{{--                <div class="icheck-primary">--}}
{{--                    <input type="checkbox" id="remember">--}}
{{--                    <label for="remember">--}}
{{--                        Remember Me--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--            <div class="col-4">--}}
{{--                <button type="submit" class="btn btn-primary btn-block">Sign In</button>--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--        </div>--}}
{{--    </form>--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="btn" href="{{ url('auth/facebook') }}"--}}
{{--                   style="background-color: #3B5499; color: #ffffff; padding: 8px; width: 100%; text-align: center; display: block; border-radius:4px;">--}}
{{--                    Login with Facebook--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a href="{{ url('auth/google') }}">--}}
{{--                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">--}}
{{--                </a>--}}
{{--            </div>--}}


{{--        </form>--}}

{{--</x-guest-layout>--}}
