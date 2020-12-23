@extends('layout.user_main')

@section('title', Str::words($data["project"]->project_title, 5))

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

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Discussion</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages" style="height: 720px;">
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
                    </div>
                </div>
                <!-- /.row -->

        </section>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection