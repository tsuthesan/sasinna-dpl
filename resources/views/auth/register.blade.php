@extends('layouts.credential')

@section('title', 'Sign Up')

@section('content')

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>DPL </b>ERP</a><br><span>Solution</span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control"
                            placeholder="Name" required autofocus autocomplete="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email"
                            value="{{old('email')}}" required autocomplete="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                            required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control" placeholder="Retype password" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                                <a href="{{route('login')}}" class="text-center">I already have a membership</a>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    @endsection