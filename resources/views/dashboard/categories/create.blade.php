@extends('dashboard.layout.app')


@section('page_name')
    Categories
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
    <div class="col-md-6 mx-auto">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('dashboard.categies.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  value="{{old('name')}}" class="form-control" id="exampleInputEmail1" name="name"
                            placeholder="Enter Name">

                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" class="custom-select form-control-border" id="status">
                            <option value="1" @selected(old('status')==1)>active</option>
                            <option value="0" @selected(old('status')==0)>not active</option>
                        </select>
                        @error('status')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select name="parent_id" class="custom-select form-control-border" id="parent">


                            <option value="" selected>Select Parent Category</option>
                            @foreach ($parents as $parent)
                                <option @selected(old('parent_id') == $parent->id) value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>

                        @error('parent_id')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
