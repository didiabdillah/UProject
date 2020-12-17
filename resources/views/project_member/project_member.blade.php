@extends('layout.user_main')

@section('title', $data["project"]->project_title)

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
                    <a href="{{route('project_detail', $data['project']->project_id)}}" class="btn btn-danger btn-md mt-4 mb-3 btn-block"><i class="fas fa-arrow-left"></i> Project</a>
                </div>
                @if($owner == 'owner')
                <div class="col-6 col-sm-3 col-md-3">
                    <a href="{{route('project_member_add', $data['project']->project_id)}}" class="btn btn-primary btn-md mt-4 mb-3 btn-block"><i class="fas fa-plus"></i> Add Member</a>
                </div>
                @endif
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
                            @if($owner == 'owner')
                            <th></th>
                            @endif
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
                            @if($owner == 'owner')
                            <td>
                                @if($member->member_role != $owner)
                                <form action="{{route('project_member_remove', $project_id)}}" method="POST" id="Delete{{$member->member_id}}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$member->member_id}}">
                                    <button class="btn btn-danger btn-sm" type="submit" id="delete-button" onclick="return confirm('Are you sure ?');">
                                        <i class="fas fa-trash">
                                        </i>
                                        Remove
                                    </button>
                                </form>
                                @endif
                            </td>
                            @endif
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