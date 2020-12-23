@extends('layout.user_main')

@section('title', 'Home')

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Overview content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row mb-2 content-header">
                <div class="col-sm-12">
                    <h1>Overview</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Members</span>
                            <span class="info-box-number">
                                10
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-project-diagram"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Projects</span>
                            <span class="info-box-number">
                                10
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
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
                                            @foreach($project->task as $task)
                                            <li class="@if($task->task_finish == true && $task->task_user_id != Session::get('user_id') ){{'done'}}@endif">
                                                <!-- checkbox -->
                                                <div class="icheck-primary d-inline ml-2">
                                                    @if($task->task_user_id == Session::get('user_id') || $project->member()->where('member_user_id', Session::get('user_id'))->first()->member_role == 'owner')
                                                    <input type="checkbox" value="" name="task{{$task->task_id}}" id="todoCheck{{$task->task_id}}" @if($task->task_finish == true){{'checked'}}@endif>
                                                    <label for="todoCheck{{$task->task_id}}"></label>
                                                    @endif
                                                </div>

                                                <!-- todo text -->
                                                <span class="text">{{$task->task_title}} <small>({{Carbon\Carbon::parse($task->task_deadline)->isoFormat('dddd, D MMMM Y')}})</small></span>
                                              
                                                @if($project->member()->where('member_user_id', Session::get('user_id'))->first()->member_role == 'owner')
                                                <!-- General tools such as edit or delete-->
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                                @endif
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
                                <button type="button" class="btn btn-info btn-block"><i class="fas fa-clock"></i> {{Carbon\Carbon::parse($project->project_deadline)->isoFormat('dddd, D MMMM Y')}}</button>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                    @endforeach
                </div>
            </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection