@extends('layout.user_main')

@section('title', 'Project')

@section('user_page')
<!-- Flash Alert -->
@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Overview content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3">
                    <a href="{{route('project_add')}}" class="btn btn-primary btn-lg mt-4 mb-3 btn-block"><i class="fas fa-plus"></i> Create a New Project</a>
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
                    @foreach ($projects as $project)
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
                                    <a href="{{route('project_detail',$project->project_id)}}" class="text-black">
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
                                @php 
                                    $task_finish = $project->task()->where('task_finish', 1)->count();
                                    $task_total = $project->task()->count();
                                    $percentage = ($task_total > 0) ? (int) ($task_finish * 100 / $task_total) : 0;
                                @endphp
                                <div class="progress mb-3" style="height: 1.75rem;">
                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                        <span>{{$percentage}}%</span>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <div class="direct-chat-messages" style="height: 250px;">
                                        <ul class="todo-list" data-widget="todo-list">
                                            @foreach($project->task()->orderBy('task_user_id', 'asc')->get() as $task)
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