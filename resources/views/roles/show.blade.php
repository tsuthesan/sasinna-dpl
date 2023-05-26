@extends('layouts.app')

@section('title', 'Role')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Role</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Role</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Permissions of role</h5>

          @include('layouts.alerts')
          <p>Name : <b>{{ $role->name }}</b></p>
          <p>Permissions:
            @if(!empty($rolePermissions))
            @foreach($rolePermissions as $v)
            <label class="label label-success text-info">{{ $v->name }},</label>
            @endforeach
            @endif
          </p>
          <span>Created : {{ \Carbon\Carbon::parse($role->created_at)->format('d F Y @ h:i a')}}</span>
          <p>Last Updated : <i>{{ \Carbon\Carbon::parse($role->updated_at)->format('d F Y @ h:i a')}}</i></p>

          <!-- /.row -->
          <form action="{{ route('roles.destroy',$role->id) }}" method="POST">

            @can('role-edit')
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="bi bi-pen"></i>
              Edit</a>
            @endcan
            @can('role-delete')
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"
              onclick="return confirm('Are you sure you want to delete this role?');"><i class="bi bi-trash"></i>
              Delete</button>
            @endcan
            <a class="btn btn-dark" href="{{ url()->previous() }}" title="Go back"><i class="bi bi-arrow-left"></i></a>
          </form>
        </div>

      </div>
    </div>
    </div>
  </section>
  <!-- /.content -->
</main>

@endsection