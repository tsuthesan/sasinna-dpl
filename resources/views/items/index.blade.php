@extends('layouts.app')

@section('title', 'All items')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>All items</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">All items</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List of items</h5>
                    <div class="card-tools mt-2">
                        <div class="input-group input-group-sm">
                            <form action="{{ route('items.search') }}" method="GET"
                                class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" name="search"
                                        placeholder="item name ..." aria-label="Search" aria-describedby="basic-addon2"
                                        required>
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
                            <a class="text-info" href="{{ route('items.index') }}" title="clear filter"><i
                                    class="fa fa-times"></i></a>
                        </h6>
                        @endif
                    </div>



                    @include('layouts.alerts')
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped table-hover text-nowrap" id="itemTable"
                            width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Average Cost</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @forelse ($items as $item)
                            <tr>
                                <td><a href="{{ route('items.show',$item->id) }}"><b>{{
                                            $item->code }}</b></a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>Rs. {{ number_format($item->avg_cost, 2) }}</td>
                                <td>
                                    <form action="{{ route('items.destroy',$item->id) }}" method="POST">

                                        @can('item-edit')
                                        <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}"
                                            title="Edit"><i class="bi bi-pen"></i></a>
                                        @endcan
                                        @can('item-delete')
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            title="Delete"><i class="bi bi-trash"></i></button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <i class='badge bg-secondary mb-2'>Data Not Available</i>
                            @endforelse
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {!! $items->links('pagination::bootstrap-5') !!}
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