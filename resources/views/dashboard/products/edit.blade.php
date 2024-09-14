@extends('dashboard.layout.app')


@section('page_name')
    Products
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
                <h3 class="card-title">Update Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('dashboard.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  value="{{old('name',$product->name)}}" class="form-control" id="exampleInputEmail1" name="name"
                            placeholder="Enter Name">
                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text"  value="{{old('description' , $product->description)}}" class="form-control" id="exampleInputEmail1" name="description"
                            placeholder="Enter description">
                        @error('description')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" step="0.1"  value="{{old('price', $product->price)}}" class="form-control" id="exampleInputEmail1" name="price"
                            placeholder="Enter price">
                        @error('price')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" step="0.1"  value="{{old('image')}}" class="form-control" id="exampleInputEmail1" name="image"
                            placeholder="Select image">
                        @error('image')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                        <img src="{{ asset('storage/'. $product->image) }}" alt="product image" class="mt-3" width="120" height="120">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number"   value="{{old('quantity', $product->quantity)}}" class="form-control" id="exampleInputEmail1" name="quantity"
                            placeholder="Enter quantity">
                        @error('quantity')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" class="custom-select form-control-border" id="status">
                            <option value="1" @selected(old('status', $product->status)==1)>active</option>
                            <option value="0" @selected(old('status', $product->status)==0)>not active</option>
                        </select>
                        @error('status')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="parent">Ctegory</label>
                        <select name="category_id" class="custom-select form-control-border" id="parent">


                            <option value="" selected>Select Ctegory </option>
                            @foreach ($categories as $category)
                                <option  @selected(old('category_id', $product->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
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
