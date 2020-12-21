@extends('layout.user_main')

@section('title', $data["project"]->project_title)

@section('user_page')
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
                                            <a href="{{route('project_task', $data["project"]->project_id)}}">
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
                                                    @foreach($data["project"]->task as $task)
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
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="https://randomuser.me/api/portraits/men/76.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ratione quasi magnam repellendus sed esse, error molestias consequatur nihil? Nihil quo quis quod eum. Quae ipsam maxime ipsa cupiditate ratione?
                                        </div>

                                        <div class="direct-chat-text">
                                            <div class="attachment">
                                                <h4>Attachments:</h4>

                                                <p class="filename">
                                                    Theme-thumbnail-image.jpg
                                                </p>

                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.attachment -->
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="https://randomuser.me/api/portraits/men/76.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ratione quasi magnam repellendus sed esse, error molestias consequatur nihil? Nihil quo quis quod eum. Quae ipsam maxime ipsa cupiditate ratione?
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="https://randomuser.me/api/portraits/women/68.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam doloribus, dolorum nemo quae ratione explicabo eligendi et laborum tempora maxime fugiat possimus perspiciatis rem. Porro nesciunt eveniet consectetur deserunt.
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="https://randomuser.me/api/portraits/men/76.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eum dolorem voluptates fugit maiores rem animi rerum mollitia odio porro velit earum nobis repellendus hic inventore, quaerat quis cum molestiae!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="https://randomuser.me/api/portraits/women/68.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text text-center">
                                            <img src="https://dummyimage.com/300x1000/000/fff.jpg" alt="" class="" style="max-width: 640px;">
                                        </div>
                                        <div class="direct-chat-text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ad dolorum quasi voluptatum voluptatibus ratione dolores hic illo voluptates, modi reprehenderit nam delectus suscipit, obcaecati laborum et voluptatem dolor sunt?
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                </div>
                                <!--/.direct-chat-messages-->

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-secondary"><i class="fas fa-file-upload"></i></button>
                                            <button type="button" class="btn btn-primary">Send</button>
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
                                    <span class="badge badge-danger">{{$data["member_count"]}} Members</span>
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