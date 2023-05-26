@extends('layouts.app')

@section('title', 'Create new role')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create new role</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Create new role</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">New role form</h5>

          @include('layouts.alerts')
          {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'required')) !!}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Permission:</strong>
                <br />
                @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                  {{ $value->name }}</label>
                <br />
                @endforeach
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary"><i class="bi bi-universal-access"></i> Submit &
                Save</button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>

      </div>
    </div>
    </div>
  </section>
  <!-- /.content -->
</main>

@endsection