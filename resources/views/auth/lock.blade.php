@extends('layout.auth_main')

@section('title', 'Locked')

@section('auth_page')
<!-- Flash Alert -->
@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<div class=" login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <!-- Automatic element centering -->
        <div class="lockscreen-wrapper mb-4">
            <div class="lockscreen-logo" style="margin-bottom: 35px;">
                <a href="{{url('/')}}" class="h1"><img src="{{URL::asset('assets/img/logo-black.png')}}" alt="" style="width: 175px;"></a>
            </div>
            <!-- User name -->
            <div class="lockscreen-name text-center mb-3">
                <h5>{{Session::get('user_name')}}</h5>
            </div>

            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img src="{{URL::asset('assets/img/profile/' . Session::get('user_image'))}}" alt="User Image">
                </div>
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <form class="lockscreen-credentials">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="password">

                        <div class="input-group-append">
                            <button type="submit" class="btn">
                                <i class="fas fa-arrow-right text-muted"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- /.lockscreen credentials -->

            </div>
            <!-- /.lockscreen-item -->
            <div class="help-block text-center">
                Enter your password to continue your session
            </div>
            <div class="text-center">
                <a href="{{route('logout')}}">Or sign in as a different user</a>
            </div>
            <div class="lockscreen-footer text-center mt-3">
                <b>Copyright &copy; {{date('Y')}} UProject </b>
                <p>All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.center -->
@endsection