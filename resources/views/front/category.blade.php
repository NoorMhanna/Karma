@extends('front.layout.master')


@section('content')
    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection
<!-- End Banner Area -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <ul class="main-categories">

                    @foreach ($categories as $category)
                        <li class="main-nav-list">
                            <a data-toggle="collapse" href="#{{ $category->name }}" aria-expanded="false"
                                aria-controls="{{ $category->name }}"><span
                                    class="lnr lnr-arrow-right"></span>{{ $category->name }}
                            </a>

                            <ul class="collapse" id="{{ $category->name }}" data-toggle="collapse" aria-expanded="false"
                                aria-controls="{{ $category->name }}">

                                @foreach ($category->childrens as $child)
                                    <li class="main-nav-list child">
                                        <a href="{{ route('category') }}?category={{ $child->id }}">{{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->


            <div class="filter-bar align-items-center text-center text-white">
                All Gategories
            </div>

            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                    @forelse ($products as $product)
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}"
                                    alt="product Image">
                                <div class="product-details">
                                    <h6>{{ $product->name }}</h6>
                                    <div class="price">
                                        <h6>{{ $product->price }}</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>

                                    <div class="prd-bottom d-flex">

                                        @auth
                                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="social-info border-0">
                                                    <a class="social-info">
                                                        <span class="ti-bag transparent-bg"></span>
                                                    </a>
                                                </button>
                                            </form>
                                        @endauth

                                        @guest

                                            <a href="{{ route('signin') }}" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">add to bag</p>
                                            </a>
                                            <a href="{{ route('signin') }}" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Wishlist</p>
                                            </a>

                                        @endguest

                                        <a href="{{ route('products.show', $product->id) }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="w-50 mx-auto p-2">
                            <br>
                            <h3 class="text-center"> No Product Active Yet!</h3>
                            <br>
                            <div class="container w-50 mx-auto ">
                                <a type="submit" href="{{ route('home') }}" class="primary-btn">
                                    Back To HOME
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </div>
</div>


@endsection
