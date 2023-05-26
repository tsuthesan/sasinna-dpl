@extends('layouts.app')

@section('title', 'Update role')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update role</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Update role</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit role permissions</h5>

          @include('layouts.alerts')
          {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
          @csrf
          @method('PUT')
          <div class="row">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-7">
              <div class="form-group">
                <strong>Name:</strong><span class="text-danger">*</span>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'required')) !!}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
              <div class="form-group">
                <strong>Permissions:</strong><span class="text-danger">*</span><br>
                @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true :
                  false,
                  array('class' => 'name')) }}
                  {{ $value->name }}</label>
                <br />
                @endforeach
              </div>
            </div>

            <div class="col-md-12">

              <button class="btn btn-primary" type="submit"><i class="bi bi-universal-access"></i> Update &
                Save</button>
              <a class="btn btn-danger" href="{{ url()->previous() }}" title="Cancel & go back"><i
                  class="bi bi-x-square"></i></a>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
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