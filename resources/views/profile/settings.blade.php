@extends('layout.user_main')

@section('title', Str::words($user->user_name, 3))

@section('user_page')

<!-- Flash Alert -->
@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Overview content -->
    <section class="content">

        <!--In Progress content -->
        <section class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3 mt-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{URL::asset('assets/img/profile/' . $user->user_image)}}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{Str::words($user->user_name, 3)}}</h3>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Status</b> <a class="float-right">@if($user->user_email_verified_at != NULL){{'active'}}@else{{'deactive'}} @endif</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Role</b> <a class="float-right">{{$user->user_role}}</a>
                                    </li>
                                </ul>

                                @if($user_id == Session::get('user_id'))
                                <a href="#" class="btn btn-primary btn-block"><b><i class="fas fa-camera"></i> Upload Profile Picture</b></a>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9 mt-4">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="{{route('profile', 'me')}}">Profile</a></li>
                                    @if($user_id == Session::get('user_id'))
                                    <li class="nav-item"><a class="nav-link active" href="#">Settings</a></li>
                                    @endif
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="profile">

                                    </div>
                                    <!-- /.tab-pane -->

                                    @if($user_id == Session::get('user_id'))
                                    <div class="tab-pane  active" id="settings">
                                        <!-- general form elements -->
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Account</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{route('profile_settings_user', 'me')}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Full Name</label>
                                                        <input name="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter name" value="{{$user->user_name}}">
                                                        @error('user_name') 
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input name="user_email" type="email" class="form-control @error('user_email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" value="{{$user->user_email}}">
                                                        @error('user_email') 
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card -->

                                        <!-- general form elements -->
                                        <div class="card card-danger">
                                            <div class="card-header">
                                                <h3 class="card-title">Change Password</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{route('profile_settings_password', 'me')}}" method="POST">
                                                @csrf 
                                                @method('patch')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Old Password</label>
                                                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter old password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">New Password</label>
                                                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter new password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Retype New Password</label>
                                                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter retype password">
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    @endif
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

        </section>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection