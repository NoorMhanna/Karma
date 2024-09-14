@extends('front.layout.master')


@section('content')
    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area py-3">
    <div class="container p-3">
        <div class="row s_product_inner">
            <div class="col-lg-7">
                <div class="h-75">
                    <div class="single-prd-item">
                        <img class="" width="70%" src="{{ asset('storage/' . $product->image) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>{{ $product->price }}</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Category</span> : {{ $product->category->name }}</a>
                        </li>
                        <li><a href="#"><span>Availibility</span> :
                                {{ $product->quantity > 0 ? 'In Stock' : 'Out Of Stock' }}</a></li>
                    </ul>
                    <p>{{ $product->description }}</p>

                    @if ($product->quantity > 0)
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12"
                                value="{{ $product->quantity }}" title="Quantity:" class="input-text qty">
                        </div>

                        {{--
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="#">Add to Cart</a>
                        </div> --}}


                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <div class="card_area d-flex align-items-center">
                                <button type="submit" class=" primary-btn social-info border-0"> Add to Cart
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="align-items-center">
                            <a class="primary-btn" href="{{ route('home') }}">Back To Home</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
