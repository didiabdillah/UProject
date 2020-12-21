@extends('layout.user_main')

@section('title', $data["project"]->project_title)

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm-2 col-md-2">
                    <a href="{{route('project_member', $data['project']->project_id)}}" class="btn btn-danger btn-md mt-4 mb-3 btn-block"><i class="fas fa-arrow-left"></i> Member</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Project Member</h3>
                </div> 
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('project_member_add_post', $project_id)}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Members</label>
                            <select class="select2 @error('member') is-invalid @enderror" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="member[]">
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

                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Member</button>

                </form>
            </div>
            <!-- /.card -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection