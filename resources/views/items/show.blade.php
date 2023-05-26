@extends('layouts.app')

@section('title', 'Item')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Items</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                <li class="breadcrumb-item active">item</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Details of item</h5>

                    @include('layouts.alerts')
                    <p>Code : <b>{{ $item->code }}</b></p>
                    <p>Name : <b>{{ $item->name }}</b></p>
                    <p>Description : <b>{{ $item->description }}</b></p>
                    <p>Average Cost : <b>Rs. {{ number_format($item->avg_cost, 2) }}</b></p>
                    <p>Group :
                        @if ($item->group)
                        <b>{{ $item->group }}</b>
                        @else
                        n/a
                        @endif
                    </p>
                    <p>Created : {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y @ h:i a')}}</p>
                    <p>Last Updated : <i>{{ \Carbon\Carbon::parse($item->updated_at)->format('d F Y @ h:i a')}}</i></p>

                    <!-- /.row -->
                    <form action="{{ route('items.destroy',$item->id) }}" method="POST">

                        @can('item-edit')
                        <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}"><i class="bi bi-pen"></i>
                            Edit</a>
                        @endcan
                        @can('item-delete')
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this item?');"><i
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