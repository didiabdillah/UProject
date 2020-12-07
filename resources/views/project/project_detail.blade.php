@extends('layout.user_main')

@section('title', 'Project Title')

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">

    <section class="content">

        <!--In Progress content -->
        <section class="content ">

            <div class="container-fluid">

                <div class="row">
                    <!-- TASK -->
                    <div class="col-md-9 col-lg-9 mt-4">
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
                                                    <h3 class="card-title">Title</h3>
                                                </h3>
                                            </a>

                                        </div>
                                        <!-- /.card-header -->

                                        <!-- Progress Bar -->
                                        <div class="progress mb-3" style="height: 1.75rem;">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                <span>90% Complete (success)</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="direct-chat-messages">
                                                <ul class="todo-list" data-widget="todo-list">
                                                    @for($i=0; $i<10; $i++) <li>
                                                        <!-- checkbox -->
                                                        <div class="icheck-primary d-inline ml-2">
                                                            <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                                            <label for="todoCheck1"></label>
                                                        </div>

                                                        <!-- todo text -->
                                                        <span class="text">Design a nice theme</span>
                                                        <!-- General tools such as edit or delete-->
                                                        <div class="tools">
                                                            <i class="fas fa-edit"></i>
                                                            <i class="fas fa-trash"></i>
                                                        </div>
                                                        </li>
                                                        @endfor
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
                                <a href="{{route('project_discussion', 1)}}">
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

                    <!-- MEMBERS -->
                    <div class="col-md-3 col-lg-3 mt-4">
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">MEMBERS</h3>
                                <div class="card-tools">
                                    <span class="badge badge-danger">99 Members</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="direct-chat-messages" style="height: 300px;">
                                    <ul class=" users-list clearfix">
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Dessy</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/women/94.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Aisyah</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/women/10.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Jane</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/women/74.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Rere</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/9.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Alexander</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/20.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">John</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">David</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Dave</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">James Alan Hetfield</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/78.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">David</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">Dave</a>
                                        </li>
                                        <li>
                                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
                                            <a class="users-list-name" href="#">James Alan Hetfield</a>
                                        </li>
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{route('project_member', 1)}}">View All Members</a>
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
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-red">10 Feb. 2014</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-envelope bg-blue"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                        <div class="timeline-body">
                                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                            quora plaxo ideeli hulu weebly balihoo...
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a class="btn btn-primary btn-sm">Read more</a>
                                                            <a class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-comments bg-yellow"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                                        <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a class="btn btn-warning btn-sm">View comment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-green">3 Jan. 2014</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fa fa-camera bg-purple"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                                        <div class="timeline-body">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                            <img src="https://placehold.it/150x100" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-video bg-maroon"></i>

                                                    <div class="timeline-item">
                                                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>

                                                        <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                                                        <div class="timeline-body">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <div>
                                                    <i class="fas fa-clock bg-gray"></i>
                                                </div>
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
                                    <a href="{{route('project_history', 1)}}">
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