@extends('layout.user_main')

@section('title', Str::words($data["project"]->project_title, 5))

@section('user_page')

<!-- Flash Alert -->
@if (Session::has('alert'))
<div id="flash-alert" data-flashalerticon="{{ Session::get('icon') }}" data-flashalert="{{ Session::get('alert') }}" data-flashsubalert="{{ Session::get('subalert') }}"></div>
@endif

<!-- History Own Css -->
<link rel="stylesheet" href="{{URL::asset('assets/css/HistoryOwnCSS.css')}}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">

    <section class="content">

        <!--In Progress content -->
        <section class="content ">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-9 col-lg-9 mt-4">
                        <!-- TASK -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Default box -->
                                <div class="card ">
                                    <div class="card-header">
                                        <a href="{{route('project_task_add', $data["project"]->project_id)}}" class="btn btn-primary float-left btn-sm">Create a New Task</a>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- TO DO List -->
                                    <div class="card direct-chat direct-chat-primary">
                                        <div class="card-header">
                                            <a href="{{route('project_task', $data["project"]->project_id)}}">
                                                <h3 class="card-title">
                                                    <i class="fas fa-clipboard mr-1"></i>
                                                    <h3 class="card-title">{{$data["project"]->project_title}}</h3>
                                                   
                                                </h3>
                                            </a>
                                        </div>
                                        <!-- /.card-header -->

                                        <!-- Progress Bar -->
                                        @php 
                                        $task_finish = $data["project"]->task()->where('task_finish', 1)->count();
                                        $task_total = $data["project"]->task()->count();
                                        $percentage = ($task_total > 0) ? (int) ($task_finish * 100 / $task_total) : 0;
                                        @endphp
                                        <div class="progress mb-3" style="height: 1.75rem;">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                                <span>{{$percentage}}%</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="direct-chat-messages">
                                                <ul class="todo-list" data-widget="todo-list">
                                                    @foreach($data["project"]->task()->orderBy('task_user_id', 'asc')->get() as $task)
                                                    <li class="@if($task->task_finish == true && $task->task_user_id != Session::get('user_id') ){{'done'}}@endif">
                                                        <!-- checkbox -->
                                                        <div class="icheck-primary d-inline ml-2">
                                                            @if($task->task_user_id == Session::get('user_id') || $data["project"]->member()->where('member_user_id', Session::get('user_id'))->first()->member_role == 'owner')
                                                            <input type="checkbox" value="" name="task{{$task->task_id}}" id="todoCheck{{$task->task_id}}" @if($task->task_finish == true){{'checked'}}@endif>
                                                            <label for="todoCheck{{$task->task_id}}"></label>
                                                            @endif
                                                        </div>

                                                        <!-- todo text -->
                                                        <span class="text">{{$task->task_title}} <small>({{Carbon\Carbon::parse($task->task_deadline)->isoFormat('dddd, D MMMM Y')}})</small></span>
                                                        @if($data["project"]->member()->where('member_user_id', Session::get('user_id'))->first()->member_role == 'owner')
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
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <button type="button" class="btn btn-info btn-block"><i class="fas fa-plus"></i> No Worker</button>
                                        </div>

                                    </div>
                                    <!-- /.card -->
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info btn-block"><i class="fas fa-clock"></i> {{Carbon\Carbon::parse($data["project"]->project_deadline)->isoFormat('dddd, D MMMM Y')}}</button>
                                    </div>
                                    <!-- /.card-footer-->
                                </div>
                            </div>
                        </div>

                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <a href="{{route('project_discussion', $data["project"]->project_id)}}">
                                    <h3 class="card-title">Discussion</h3>
                                </a>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages discussion">
                                    <!-- Message. Default to the left -->
                                    @foreach($discussion as $discuss)
                                    <div class="direct-chat-msg @if($discuss->discussion_user_id == $user_id){{'right'}}@endif">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name @if($discuss->discussion_user_id == $user_id){{'float-right'}}@else{{'float-left'}}@endif">{{$discuss->user_name}}</span>
                                            <span class="direct-chat-timestamp @if($discuss->discussion_user_id == $user_id){{'float-left'}}@else{{'float-right'}}@endif">{{$discuss->created_at}}</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{URL::asset('assets/img/profile/' . $discuss->user_image)}}" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{$discuss->discussion_message}}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    @endforeach
                                    <!-- /.direct-chat-msg -->
                                </div>
                                <!--/.direct-chat-messages-->

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="{{route('project_discussion_add', $data["project"]->project_id)}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!--/.direct-chat --
                        <!-- /.card -->
                    </div>

                    <div class="col-md-3 col-lg-3 mt-4">
                        <!-- MEMBERS -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">MEMBERS</h3>
                                <div class="card-tools">
                                    <span class="badge badge-danger">{{$data["member"]->count()}} Members</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="direct-chat-messages" style="height: 300px;">
                                    <ul class=" users-list clearfix">
                                        @foreach($data["member"] as $member)
                                        <li>
                                            <img src="{{URL::asset('assets/img/profile/' . $member->user_image)}}" alt="User Image">
                                            <a class="users-list-name" href="{{route('profile', $member->user_id)}}">{{$member->user_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{route('project_member', $data['project']->project_id)}}">View All Members</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.direct-chat -->

                        <!-- HISTORY -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">HISTORY</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Timelime example  -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                @foreach($data["history"] as $history)
                                                <div>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> {{$history->created_at->diffForHumans()}}</span>
                                                        <h3 class="timeline-header"><a href="{{route('profile', $history->history_user_id)}}">{{$history->history_subject}} </a> </h3>
                                                        <div class="timeline-body">
                                                            <small>{{$history->history_verb}} <b>{{$history->history_object}}</b></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <!-- END timeline item -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <!-- /.timeline -->
                            </div>
                            <!--/.direct-chat-messages-->
                            <div class="card-footer">
                                <div class="text-center">
                                    <a href="{{route('project_history', $data['project']->project_id)}}">
                                        View All History
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!--/.direct-chat --
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        </section>
</div>
<!-- /.content-wrapper -->

@endsection