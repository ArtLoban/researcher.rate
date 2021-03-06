@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add profile
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            {!! Form::open(['route' => 'profiles.store']) !!}
                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-6">

                            @include('admin.errors')

                            <div class="form-group">
                                <label for="ProfileName">Name<span class="field-required_star"> *</span></label>
                                <input
                                    class="form-control"
                                    id="ProfileName"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label for="ProfileSurame">Surame<span class="field-required_star"> *</span></label>
                                <input
                                    class="form-control"
                                    id="ProfileSurame"
                                    type="text"
                                    name="surname"
                                    value="{{ old('surname') }}"
                                    required
                                >
                            </div>
                            <div class="form-group">
                                <label for="ProfilePatronymic">Patronymic</label>
                                <input
                                    class="form-control"
                                    id="ProfilePatronymic"
                                    type="text"
                                    name="patronymic"
                                    value="{{ old('patronymic') }}"
                                >
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Date of birth<span class="field-required_star"> *</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input
                                        type="date"
                                        class="form-control"
                                        name="birth_date"
                                        value="{{ old('birth_date') }}"
                                        required
                                    >
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Position<span class="field-required_star"> *</span></label>
                                <select name="position_id" class="form-control" required>
                                    <option></option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->getKey() }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Academic Degree<span class="field-required_star"> *</span></label>
                                <select name="ac_degree_id" class="form-control" required>
                                    <option></option>
                                    @foreach($academicDegrees as $academicDegree)
                                        <option value="{{ $academicDegree->getKey() }}">{{ $academicDegree->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Academic Title<span class="field-required_star"> *</span></label>
                                <select name="ac_title_id" class="form-control" required>
                                    <option></option>
                                    @foreach($academicTitles as $academicTitle)
                                        <option value="{{ $academicTitle->getKey() }}">{{ $academicTitle->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Department<span class="field-required_star"> *</span></label>
                                <select name="department_id" class="form-control" required>
                                    <option></option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->getKey() }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <p class="help-block">
                            <span class="field-required_star"> *</span> - Field is required
                        </p>
                        <p class="help-block">** The personal key for a blank user will be generated automatically</p>
                    </div>

                    <!-- /.box-body -->
                    <div class="body">
                        <button class="btn btn-success">Add</button>
                        <a href="{{ route('profiles.index') }}" class="btn btn-default">Back</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            {!! Form::close() !!}

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
