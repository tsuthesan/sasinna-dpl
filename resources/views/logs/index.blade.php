@extends('layouts.app')

@section('title', 'History logs')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">History logs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">History logs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">List of logs</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" name="table_search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @include('layouts.alerts')

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap" id="logTable" width="100%"
                            cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Activity</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            @forelse ($logs as $log)
                            <tr>
                                <td>{{$log->name }}</a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d F Y @ h:i a')}}</td>
                            </tr>
                            @empty
                            <i class='badge badge'>Data Not Available</i>
                            @endforelse
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {!! $logs->links('pagination::bootstrap-5') !!}
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection