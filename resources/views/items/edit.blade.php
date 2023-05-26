@extends('layouts.app')

@section('title', 'Update item')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update item</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                <li class="breadcrumb-item active">Update item</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit item details</h5>

                    @include('layouts.alerts')
                    <form action="{{ route('items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @csrf

                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>Code:</strong><span class="text-danger">*</span>
                                    <input type="text" name="code" class="form-control" value="{{ $item->code }}"
                                        placeholder="Code of the item" required>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>Name:</strong><span class="text-danger">*</span>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}"
                                        placeholder="Name of the item" required>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>Description:</strong><span class="text-danger">*</span>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ $item->description }}" placeholder="Description of the item" required>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <strong>Average Cost:</strong><span class="text-danger">*</span>
                                    <input type="text" name="avg_cost" class="form-control"
                                        value="{{ $item->avg_cost }}" placeholder="Average Cost of the item" required>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">

                                <button class="btn btn-primary" type="submit"><i class="fa fa-item"></i> Update &
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