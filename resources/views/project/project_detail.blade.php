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
                                            <h3 class="card-title">
                                                <i class="ion ion-clipboard mr-1"></i>
                                                Title
                                            </h3>

                                            <div class="card-tools">
                                                <ul class="pagination pagination-sm">
                                                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                                                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                                </ul>
                                            </div>
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
                                <h3 class="card-title">Direct Chat</h3>

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
                                <a href="javascript:">View All Users</a>
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
                                    <ul class=" products-list product-list-in-card pl-2 pr-2">
                                        @for($i=0; $i<50; $i++) <li class="item">
                                            <div class="product-img">
                                                <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Product Image" class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">Alexander Bullock Graham Bell
                                                    <span class="badge badge-warning float-right"><i class="fas fa-clock"></i> 1 Second Ago</span></a>
                                                <span class="product-description">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem omnis provident, repudiandae animi aut asperiores possimus sit eos vero quod iure modi soluta voluptatem nulla ex rerum quibusdam minima pariatur!
                                                </span>
                                            </div>
                                            </li>
                                            @endfor
                                    </ul>
                                    <!-- /.item -->
                                </div>
                                <!--/.direct-chat-messages-->
                                <div class="card-footer">
                                    <div class="text-center">
                                        <a href="#">
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