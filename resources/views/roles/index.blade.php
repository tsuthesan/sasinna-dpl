@extends('layouts.app')

@section('title', 'All roles')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>All roles</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">All roles</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List of roles</h5>
          <div class="card-tools mt-2">
            <div class="input-group input-group-sm">
              <form action="{{ route('roles.search') }}" method="GET"
                class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" name="search"
                    placeholder="user name or e-mail ..." aria-label="Search" aria-describedby="basic-addon2" required>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i> Search
                    </button>
                  </div>
                </div>
              </form>
            </div>
            @if (app('request')->input('search'))
            <h6 class="mt-2 float-right">Searched Results for "<i class="font-weight-bold">{{
                app('request')->input('search') }}</i>"
              <a class="text-info" href="{{ route('users.index') }}" title="clear filter"><i
                  class="fa fa-times"></i></a>
            </h6>
            @endif
          </div>

          @include('layouts.alerts')
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover text-nowrap" id="userTable" width="100%"
              cellspacing="0">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              @forelse ($roles as $key => $role)
              <tr>
                <td><a href="{{ route('roles.show',$role->id) }}"><b>{{
                      $role->name }}</b></a></td>
                <td>
                  @can('role-edit')
                  <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" title="Edit"><i
                      class="bi bi-pen"></i></a>
                  @endcan
                  @can('role-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy',
                  $role->id],'style'=>'display:inline'])
                  !!}
                  <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this role?');" title="Delete"><i
                      class="bi bi-trash"></i></button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @empty
              <i class='badge bg-secondary mb-2'>Data Not Available</i>
              @endforelse
            </table>
          </div>
          <div class="d-flex justify-content-center mt-3">
            {!! $roles->links('pagination::bootstrap-5') !!}
          </div>
          <!-- /.row -->
        </div>

      </div>
    </div>
    </div>
  </section>
  <!-- /.content -->
</main>

@endsection