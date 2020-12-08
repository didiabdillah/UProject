@extends('layout.user_main')

@section('title', $data["project"]->project_title)

@section('user_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm-2 col-md-2">
                    <a href="{{route('project_member', $data['project']->project_id)}}" class="btn btn-danger btn-md mt-4 mb-3 btn-block"><i class="fas fa-arrow-left"></i> Member</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Project Member</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Member</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Member</button>

                </form>
            </div>
            <!-- /.card -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection