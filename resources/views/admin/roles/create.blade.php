@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add role
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            {!! Form::open(['route' => 'roles.store']) !!}

            <div class="box-body">
                <div class="col-md-6">

                    @include('admin.errors')

                    <div class="form-group">
                        <label for="inputName">Name<span class="field-required_star"> *</span></label>
                        <input type="text" class="form-control" name="name" id="inputName" required>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <p class="help-block">
                    <span class="field-required_star"> *</span> - Field is required
                </p>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-success">Add</button>
                <a href="{{ route('roles.index')}}" class="btn btn-default">Back</a>
            </div>
            <!-- /.box-footer-->
            {!! Form::close() !!}

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
