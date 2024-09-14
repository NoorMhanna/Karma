@extends('dashboard.layout.app')


@section('page_name')
    Products Page
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Starter Page</li>
@endsection

{{-- @push('css')
    <style>
    </style>
@endpush --}}

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-primary">Create New Product</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>category</th>
                            <th>status</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>image</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse  ($products as $product)
                            <tr class="">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td style="max-width: 150px; overflow: auto;">{{ $product->description }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        active
                                    @else
                                        none active
                                    @endif
                                </td>


                                <td>{{ $product->price }} $</td>

                                <td>{{ $product->quantity }}</td>


                                <td> <img src="{{ asset('storage/'. $product->image) }}" width="80" height="80" alt="Product Image"></td>
                                {{-- <td> <img src="storage/D8XkXrPCYrZmjqIv0ohdPCvgFJ1Mg9EnXjyRCIQd.png" width="80" height="80" alt="Product Image"></td> --}}

                                <td>{{ $product->created_at->toDateString() }}</td>

                                <td class="d-flex">

                                    <form class="mr-2"
                                        action="{{ route('dashboard.products.edit', ['product' => $product->id]) }}"
                                        method="get">
                                        @csrf
                                        <button class="mr-2 btn btn-sm btn-primary">Edit</button>
                                    </form>

                                    <form action="{{ route('dashboard.products.destroy', ['product' => $product->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="mr-2 btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center font-weight-bold"> No Product Found </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
