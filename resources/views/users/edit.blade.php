@extends('layouts.app')

@section('title', 'Update user')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update user</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Update user</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit user details</h5>

                    @include('layouts.alerts')
                    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>Username:</strong><span class="text-danger">*</span>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        placeholder="Name of the user" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>E-mail address:</strong><span class="text-danger">*</span>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                        placeholder="E-mail of the user" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>Phone number:</strong>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                                        placeholder="Phone number of the user">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>New Password:</strong>
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="Create a new password for the user">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>User Role:</strong><span class="text-danger">*</span>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' =>
                                    'form-control','multiple','required')) !!}
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">

                                <button class="btn btn-primary" type="submit"><i class="bi bi-person"></i> Update &
                                    Save</button>
                                <a class="btn btn-danger" href="{{ url()->previous() }}" title="Cancel & go back"><i
                                        class="bi bi-x-square"></i></a>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
</main>

@endsection