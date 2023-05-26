@extends('layouts.app')

@section('title', 'Create new item')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create new item</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                    <li class="breadcrumb-item active">Create new item</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New item form</h5>

                        @include('layouts.alerts')
                        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Code:</strong><span class="text-danger">*</span>
                                        <input type="text" name="code" class="form-control" placeholder="Code of the item"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Name:</strong><span class="text-danger">*</span>
                                        <input type="text" name="name" class="form-control" placeholder="Name of the item"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Description:</strong><span class="text-danger">*</span>
                                        <input type="text" name="description" class="form-control"
                                               placeholder="Description of the item" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Average Cost:</strong><span class="text-danger">*</span>
                                        <input type="number" name="avg_cost" class="form-control"
                                               placeholder="Average Cost of the item" required>
                                    </div>
                                </div>
                                @livewire('create-drop')
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Unit of Measurement:</strong><span class="text-danger">*</span>
                                        <select name="avg_cost" class="form-select" aria-label="Default select example">
                                            <option selected value="0">Kilograms</option>
                                            <option value="1">Meters</option>
                                            <option value="2">Liters</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Product Type</strong><span class="text-danger">*</span>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                   id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Spare Parts
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                   id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Product
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="form-group">
                                        <strong>Free Issue:</strong><span class="text-danger">*</span>
                                        <select name="avg_cost" class="form-select" aria-label="Default select example">
                                            <option selected value="0">No free issue</option>
                                            <option value="1">Value 1</option>
                                            <option value="2">Value 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">

                                    <button class="btn btn-primary" type="submit"><i class="bi bi-person"></i> Create
                                        item</button>
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
