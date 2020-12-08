@extends('layout.user_main')

@section('title', $data["project"]->project_title)

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm-3 col-md-3">
                    <a href="{{route('project_add')}}" class="btn btn-primary btn-md mt-4 mb-3 btn-block"><i class="fas fa-plus"></i> Add Member</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$data["project"]->project_title}} Members</h3>
                <div class="card-tools">
                    <span class="badge badge-danger">{{$data["member_count"]}} Members</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-striped projects">
                    <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Member Role</th>
                            <th>Task Progress</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["member"] as $member)
                        <tr>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="{{URL::asset('assets/img/profile/' . $member->user_image)}}">
                                    </li>
                                    <li class="list-inline-item">
                                        {{$member->user_name}}
                                    </li>
                                </ul>
                            </td>
                            <td>
                                {{$member->member_role}}
                            </td>
                            <td>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                    </div>
                                </div>
                                <small>
                                    77% Complete
                                </small>
                            </td>
                            <td>
                                <span class="badge badge-success">Success</span>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Remove
                                </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection