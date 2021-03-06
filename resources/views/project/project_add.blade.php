@extends('layout.user_main')

@section('title', 'Project Add')

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
                    <a href="{{route('project')}}" class="btn btn-danger btn-md mt-4 mb-3 btn-block"><i class="fas fa-arrow-left"></i> Project</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Project</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('project_add_post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Project Title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Project Description" name="description" id="description"></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_deadline">Project Deadline</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" min="{{date('Y-m-d')}}" class="form-control @error('date_deadline') is-invalid @enderror" id="date_deadline" name="date_deadline" placeholder="Project Deadline">
                                    @error('date_deadline')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control @error('time_deadline') is-invalid @enderror" id="time_deadline" name="time_deadline" placeholder="Project Deadline">
                                    @error('date_deadline')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                    <label class="custom-file-label" for="image">Project Image</label>
                                </div>
                            </div>
                            @error('image')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Members</label>
                            <select class="select2 @error('member') is-invalid @enderror" multiple="multiple" data-placeholder="Select members" style="width: 100%;" name="member[]">
                                @foreach($members as $member)
                                <option value="{{$member->user_id}}">{{$member->user_name . " (" . $member->user_email . ")"}}</option>
                                @endforeach
                            </select>
                            @error('member')
                            <div class="invalid-feedback">
                                Please select users
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
                </form>
            </div>
            <!-- /.card -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection