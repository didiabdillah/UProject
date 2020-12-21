@extends('layout.auth_main')

@section('title', 'Forgot Password')

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
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <form action="recover-password.html" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
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
                <div class="row ">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mt-3 mb-1 text-center">
                <a href="{{route('login')}}">Back To Login</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection