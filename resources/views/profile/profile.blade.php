@extends('layout.user_main')

@section('title', Str::words($user->user_name, 3))

@section('user_page')
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
                                    <li class="nav-item"><a class="nav-link active" href="#">Profile</a></li>
                                    @if($user_id == Session::get('user_id'))
                                    <li class="nav-item"><a class="nav-link" href="{{route('profile_settings', 'me')}}">Settings</a></li>
                                    @endif
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <!-- About Me Box -->
                                        <div class="card card-primary">

                                            <div class="card-body">
                                                <strong><i class="fas fa-user mr-1"></i>Name</strong>

                                                <p class="text-muted">
                                                    {{$user->user_name}}
                                                </p>

                                                <hr>

                                                <strong><i class="fas fa-envelope mr-1"></i>Email</strong>

                                                <p class="text-muted">{{$user->user_email}}</p>

                                                <hr>

                                                <strong><i class="fas fa-pencil-alt mr-1"></i>Member Since</strong>

                                                <p class="text-muted">
                                                    {{date('d F Y', strtotime($user->created_at))}}
                                                </p>

                                                <hr>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.tab-pane -->

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