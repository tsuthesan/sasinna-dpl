@extends('layouts.app')

@section('title', 'User')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Details of user</h5>

                    @include('layouts.alerts')
                    <p>Username : <b>{{ $user->name }}</b></p>
                    <p>E-mail : <b>{{ $user->email }}</b></p>
                    <p>User Role :
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge bg-secondary">{{ $v }}</label>
                        @endforeach
                        @endif
                    </p>
                    <p>Phone :
                        @if ($user->phone)
                        <b>{{ $user->phone }}</b>
                        @else
                        n/a
                        @endif
                    </p>
                    <p>Created : {{ \Carbon\Carbon::parse($user->created_at)->format('d F Y @ h:i a')}}</p>
                    <p>Last Updated : <i>{{ \Carbon\Carbon::parse($user->updated_at)->format('d F Y @ h:i a')}}</i></p>

                    <!-- /.row -->
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                        @can('user-edit')
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pen"></i>
                            Edit</a>
                        @endcan
                        @can('user-delete')
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this user?');"><i
                                class="bi bi-trash"></i> Delete</button>
                        @endcan
                        <a class="btn btn-dark" href="{{ url()->previous() }}" title="Go back"><i
                                class="bi bi-arrow-left"></i></a>
                    </form>
                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
</main>

@endsection