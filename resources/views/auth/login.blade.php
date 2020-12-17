@extends('layout.auth_main')

@section('title', 'Login')

@section('auth_page')

<!-- Flash Alert -->
@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<div class=" login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{url('/')}}" class="h1"><img src="{{URL::asset('assets/img/logo-black.png')}}" alt="" style="width: 175px;"></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start apllication</p>

            <form action="{{route('login_process')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('login_email') is-invalid @enderror" placeholder="Email" name="login_email" id="login_email" value="{{old('login_email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('login_email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div id="login_email_field"></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control  @error('login_password') is-invalid @enderror" placeholder="Password" name="login_password" id="login_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('login_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                    @if($errors->has('g-recaptcha-response'))
                    <small class="text-danger">
                        {{$errors->first('g-recaptcha-response')}}
                    </small>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember" value="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="login_submit">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google mr-2"></i> Sign in using Google
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1 text-center">
                <a href="{{route('forgot_password')}}">I forgot my password</a>
            </p>
            <p class="mb-0 text-center">
                <a href="{{route('register')}}" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection