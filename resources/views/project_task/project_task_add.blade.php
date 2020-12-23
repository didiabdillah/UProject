@extends('layout.user_main')

@section('title', Str::words($project->project_title, 5))

@section('user_page')
<!-- Flash Alert -->
@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm-2 col-md-2">
                    <a href="{{route('project_detail', $project->project_id)}}" class="btn btn-danger btn-md mt-4 mb-3 btn-block"><i class="fas fa-arrow-left"></i> Project</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Task</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('project_task_add_post', $project->project_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Task Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Task Title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_deadline">Task Deadline</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" min="{{date('Y-m-d')}}" class="form-control @error('date_deadline') is-invalid @enderror" id="date_deadline" name="date_deadline" placeholder="Task Deadline">
                                    @error('date_deadline')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control @error('time_deadline') is-invalid @enderror" id="time_deadline" name="time_deadline" placeholder="Task Deadline">
                                    @error('date_deadline')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control select2 @error('user') is-invalid @enderror" data-placeholder="Select user" style="width: 100%;" name="user">
                                <option value="">Select user</option>
                                @foreach($users as $user)
                                <option value="{{$user->user_id}}">{{$user->user_name . " (" . $user->user_email . ")"}}</option>
                                @endforeach
                            </select>
                            @error('user')
                            <div class="invalid-feedback">
                                Please select user
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="active" name="active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                        </div>

                        <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Create</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection