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
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

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

                {{--                <x-jet-validation-errors class="mb-4"/>--}}

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
                        <x-jet-input id="email" class="form-control" placeholder="Enter Your Email" type="email"
                                     name="email"
                                     :value="old('email')" required/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                    <div class="input-group mb-3">
                        {{--                            <x-jet-label for="password" value="{{ __('Password') }}" />--}}
                        <x-jet-input id="password" class="form-control" type="password"
                                     placeholder="Enter Password,one special character" name="password" required
                                     autocomplete="new-password"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
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
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                    </div>

                    <div class="row">
                        <div class="col-8">

                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
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
{{--                    Password: <input type="password" value="" id="myInput"><br><br>--}}
{{--                    <input type="checkbox" onclick="myFunction()">Show Password--}}

{{--                    <script>--}}
{{--                        function myFunction() {--}}
{{--                            var x = document.getElementById("myInput");--}}
{{--                            if (x.type === "password") {--}}
{{--                                x.type = "text";--}}
{{--                            } else {--}}
{{--                                x.type = "password";--}}
{{--                            }--}}
{{--                        }--}}
{{--                    </script>--}}


                </form>

            </x-guest-layout>

            {{--
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <!-- /.social-auth-links -->
                {{--                <a href="{{url('auth/facebook')}}" class="btn btn-block btn-primary">--}}
                {{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
                {{--                </a>
                <a href="{{url('auth/google')}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign Up using Google
                </a>

            </div>
        --}}

            <div class="flex items-center justify-end mt-10">
                <a class="text-center" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

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
