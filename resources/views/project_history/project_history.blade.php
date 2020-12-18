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
                <!-- /.row -->

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- timeline item -->
                            @foreach($history as $data)
                            <div>
                                <i class="{{$data->history_icon}} {{$data->history_background}}"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{$data->created_at}}</span>
                                    <h3 class="timeline-header"><a href="{{route('profile', $data->history_user_id)}}">{{$data->history_subject}}</a></h3>

                                    <div class="timeline-body">
                                        {{$data->history_verb}} <b>{{$data->history_object}}</b>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- END timeline item -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
        </section>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection