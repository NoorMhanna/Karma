@extends('dashboard.layout.app')


@section('page_name')
    Categories Page
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
                    <a href="{{ route('dashboard.categies.create') }}" class="btn btn-sm btn-primary">Create New Category</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                {{-- @if (session()->has('success'))
                    {{ session('success') }}
                @endif --}}
                {{-- @if (session()->has('error'))
                    {{ session('error') }}
                @endif --}}
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse  ($categories as $category)
                            {{-- parents --}}
                            <tr class="bg-secondary">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->status == 1)
                                        active
                                    @else
                                        none active
                                    @endif
                                </td>
                                <td>{{ $category->created_at->toDateString() }}</td>
                                <td class="d-flex">

                                    <form class="mr-2"
                                        action="{{ route('dashboard.categies.edit', ['categy' => $category->id]) }}"
                                        method="get">
                                        @csrf
                                        <button class="mr-2 btn btn-sm btn-primary">Edit</button>
                                    </form>


                                    <form action="{{ route('dashboard.categies.destroy', ['categy' => $category->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="mr-2 btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @php
                                $current_loop = $loop->iteration;
                            @endphp
                            {{-- Childrens --}}
                            @if ($category->childrens->count() > 0)
                                @foreach ($category->childrens as $child)
                                    <tr>
                                        <td>{{ $current_loop . '-' . $loop->iteration }}</td>
                                        <td>{{ $child->name }}</td>
                                        <td>
                                            @if ($child->status == 1)
                                                active
                                            @else
                                                none active
                                            @endif
                                        </td>
                                        <td>{{ $child->created_at->toDateString() }}</td>
                                        <td class="d-flex">
                                            <form class="mr-2"
                                                action="{{ route('dashboard.categies.edit', ['categy' => $child->id]) }}"
                                                method="get">
                                                @csrf
                                                <button class="mr-2 btn btn-sm btn-primary">Edit</button>
                                            </form>

                                            <form
                                                action="{{ route('dashboard.categies.destroy', ['categy' => $child->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="mr-2 btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        @empty

                            <tr>
                                <td colspan="5" class="text-center font-weight-bold"> No Categories Found </td>
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
