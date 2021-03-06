@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit user</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            {!! Form::open(['route' => ['users.update', $user->getKey()],
                            'method' => 'put']) !!}
                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-6">

                            @include('admin.errors')

                            <input type="hidden" name="updatedUserId" value="{{ $user->getKey() }}">
                            <div class="form-group">
                                <label for="inputEmail">Email<span class="field-required_star"> *</span></label>
                                <input type="text" name="email" class="form-control" id="inputEmail" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password<span class="field-required_star"> *</span></label>
                                <input type="password" name="password" class="form-control" id="inputPassword">
                            </div>
                            <div class="form-group">
                                <label for="inputPasswordConfirm">Confirm password<span class="field-required_star"> *</span></label>
                                <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirm">
                            </div>
                            <div class="form-group">
                                <label>User role<span class="field-required_star"> *</span></label>
                                @forelse ($roles as $role)
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                type="radio"
                                                name="role_id"
                                                value="{{ $role->getKey() }}"
                                                @if ($user->role_id === $role->getKey()) {{ 'checked' }} @endif
                                            >
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @empty
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" checked disabled>
                                            none
                                        </label>
                                    </div>
                                @endforelse
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
                        <button class="btn btn-warning">Update</button>
                        <a href="{{ route('users.index')}}" class="btn btn-default">Back</a>
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
