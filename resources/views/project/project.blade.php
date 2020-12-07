@extends('layout.user_main')

@section('title', 'Project')

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Overview content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm-2 col-md-2">
                    <a href="{{route('project_add')}}" class="btn btn-primary btn-lg mt-4 mb-3 btn-block"><i class="fas fa-plus"></i> Add</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <!--In Progress content -->
        <section class="content">

            <div class="container-fluid">

                <div class="row mb-2 content-header">
                    <div class="col-sm-12">
                        <h1>In Progress</h1>
                    </div>
                </div>

                <div class="row">
                    @foreach ($data["project"] as $project)
                    <div class="col-md-6 col-lg-4">
                        <!-- Default box -->
                        <div class="card">
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
                                    <a href="{{route('project_detail', $project->project_id)}}" class="text-black">
                                        <h3 class="card-title">
                                            <i class="fas fa-clipboard mr-1"></i>
                                            {{$project->project_title}}
                                        </h3>
                                    </a>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->

                                <!-- Progress Bar -->
                                <div class="progress mb-3" style="height: 1.75rem;">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                        <span>90% Complete (success)</span>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <div class="direct-chat-messages" style="height: 250px;">
                                        <ul class="todo-list" data-widget="todo-list">
                                            @foreach($data["task"] as $task)
                                            @if($task->task_project_id == $project->project_id)
                                            <li>
                                                <!-- checkbox -->
                                                <div class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                                    <label for="todoCheck1"></label>
                                                </div>
                                                <span class="text">{{$task->task_title}}</span>

                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach




                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
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
                        <!-- /.card -->
                    </div>
                    @endforeach
                </div>
        </section>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection