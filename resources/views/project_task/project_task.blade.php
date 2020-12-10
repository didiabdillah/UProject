@extends('layout.user_main')

@section('title', $data["project"]->project_title)

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Overview content -->
    <section class="content">

        <!--In Progress content -->
        <section class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-6 col-sm-2 col-md-2">
                        <a href="{{route('project_detail', $data['project']->project_id)}}" class="btn btn-danger btn-md mt-4 mb-3 "><i class="fas fa-arrow-left"></i> Project</a>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- TASK -->
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title badge badge-primary">Management</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- TO DO List -->
                            <div class="card direct-chat direct-chat-primary">
                                <div class="card-header">
                                    <a href="{{route('project_task', 1)}}">
                                        <h3 class="card-title">
                                            <i class="fas fa-clipboard mr-1"></i>
                                            <h3 class="card-title">{{$data["project"]->project_title}}</h3>
                                        </h3>
                                    </a>
                                </div>
                                <!-- /.card-header -->

                                <!-- Progress Bar -->
                                <div class="progress mb-3" style="height: 1.75rem;">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$data["project_percentage"]}}%">
                                        <span>{{$data["project_percentage"]}}%</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="direct-chat-messages">
                                        <ul class="todo-list" data-widget="todo-list">
                                            @foreach($data["task"] as $task)
                                            <li class="@if($task->task_finish == true && $task->task_user_id != Session::get('user_id') ){{'done'}}@endif">
                                                <!-- checkbox -->
                                                <div class="icheck-primary d-inline ml-2">
                                                    @if($task->task_user_id == Session::get('user_id'))
                                                    <input type="checkbox" value="" name="task{{$task->task_id}}" id="todoCheck{{$task->task_id}}" @if($task->task_finish == true){{'checked'}}@endif>
                                                    <label for="todoCheck{{$task->task_id}}"></label>
                                                    @endif
                                                </div>

                                                <!-- todo text -->
                                                <span class="text">{{$task->task_title}}</span>
                                                <!-- General tools such as edit or delete-->
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <button type="button" class="btn btn-info btn-block"><i class="fas fa-plus"></i> No Worker</button>
                                </div>

                            </div>
                            <!-- /.card -->
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" class="btn btn-info btn-block"><i class="fas fa-clock"></i> Minggu, 31 Desember 2020</button>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                    </div>
                </div>

        </section>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection