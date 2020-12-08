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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Member Name
                            </th>
                            <th style="width: 30%">
                                Member Role
                            </th>
                            <th>
                                Task Progress
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["member"] as $member)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="{{URL::asset('assets/img/profile/' . $member->user_image)}}">
                                    </li>
                                    {{Str::words($member->user_name), 3}}
                                </ul>
                            </td>
                            <td>
                                {{$member->member_role}}
                            </td>
                            <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                    </div>
                                </div>
                                <small>
                                    57% Complete
                                </small>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Remove
                                </a>
                            </td>
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