@extends('layout.auth_main')

@section('title', 'Register')

@section('auth_page')

@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{url('/')}}" class="h1"><img src="{{URL::asset('assets/img/logo-black.png')}}" alt="" style="width: 175px;"></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new user</p>

            <form action="{{route('register_process')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('register_name') is-invalid @enderror" placeholder="Full name" name="register_name" id="register_name" value="{{old('register_name')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('register_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('register_email') is-invalid @enderror" placeholder="Email" name="register_email" id="register_email" value="{{old('register_email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('register_email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div id="register_email_field">

                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('register_password') is-invalid @enderror" placeholder="Password" name="register_password" id="register_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('register_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('retype_password') is-invalid @enderror" placeholder="Retype password" name="retype_password" id="retype_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('retype_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}" {{--style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"--}}></div>
                            @if($errors->has('g-recaptcha-response'))
                            <small class="text-danger">
                                {{$errors->first('g-recaptcha-response')}}
                            </small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" id="terms">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                        @error('terms')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" id="register_submit">Register</button>
                    </div>
                </div>
            </form>

            {{-- <div class="social-auth-links text-center mt-2 mb-2">
                <a href="{{route('login_google')}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google mr-2"></i> Sign up using Google
                </a>
                <a href="{{route('login_github')}}" class="btn btn-block btn-dark">
                    <i class="fab fa-github mr-2"></i> Sign up using Github
                </a>
            </div> --}}
            <!-- /.social-auth-links -->

            <p class="text-center mt-3">
                <a href="{{route('login')}}" class="text-center">Back to login</a>
            </p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection