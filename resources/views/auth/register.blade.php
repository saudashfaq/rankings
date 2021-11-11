<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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
        <a href="http://localhost:8000/"><b>Register Your Account</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Register a New Membership</p>

            <x-guest-layout>

                <x-jet-validation-errors class="mb-4"/>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        {{--                            <x-jet-label for="name" value="{{ __('Name') }}" />--}}
                        <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                                     placeholder="Enter Name" required autofocus autocomplete="name"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        {{--                            <x-jet-label for="email" value="{{ __('Email') }}" />--}}
                        <x-jet-input id="email" class="form-control" placeholder="Enter Email" type="email" name="email"
                                     :value="old('email')" required/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        {{--                            <x-jet-label for="password" value="{{ __('Password') }}" />--}}
                        <x-jet-input id="password" class="form-control" type="password"
                                     placeholder="Enter Your Password" name="password" required
                                     autocomplete="new-password"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        {{--                           <p style="color:red;">Valid password should be Minimum 8 character's long and should have one special character.</p>--}}
                    </div>
                    <div class="input-group mb-3">
                        {{--                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
                        <x-jet-input id="password_confirmation" class="form-control"
                                     placeholder="Enter confirm Password" type="password" name="password_confirmation"
                                     required autocomplete="new-password"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">

                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                                            <x-jet-button class="btn btn-primary btn-block">
                                                {{ __('Register') }}
                                            </x-jet-button>
                        </div>
                        <!-- /.col -->
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-3">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif


                </form>

            </x-guest-layout>


            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="{{url('auth/facebook')}}" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="{{url('auth/google')}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google
                </a>

            </div>
            <div class="flex items-center justify-end mt-10">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <!-- /.social-auth-links -->

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

{{--<x-guest-layout>--}}

{{--    --}}
{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="name" value="{{ __('Name') }}" />--}}
{{--                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--                <b style="color: red;">Valid password should be Minimum 8 character's long and should have one special character.</b>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-jet-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-jet-checkbox name="terms" id="terms"/>--}}

{{--                            <div class="ml-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-jet-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}

{{--        </form>--}}

{{--</x-guest-layout>--}}
