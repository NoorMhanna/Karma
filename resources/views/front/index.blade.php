

@extends('front.layout.master')

@section('content')

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Nike New <br>Collection!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src=" {{asset('front/img/banner/banner-img.png')}} " alt="">
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src=" {{asset('front/img/features/f-icon1.png')}} " alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src=" {{asset('front/img/features/f-icon2.png')}} " alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src=" {{asset('front/img/features/f-icon3.png')}} " alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src=" {{asset('front/img/features/f-icon4.png')}} " alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
                @if ($products->count() >0)
                <div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
							{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua.</p> --}}
						</div>
					</div>
				</div>
                @endif


				<div class="row">
                    @forelse ( $products as $product )
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src=" {{asset('storage/'.$product->image)}} " alt="">
							<div class="product-details">
								<h6>{{$product->name}}</h6>
								<div class="price">
									<h6>$ {{$product->price}}</h6>
								</div>


                                <div class="prd-bottom d-flex">
                                    @auth
                                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="social-info border-0">
                                                    <span class="ti-bag"></span>
                                                    {{-- <p class="hover-text">add to bag</p> --}}
                                            </button>
                                        </form>

                                        {{-- <a href="" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a> --}}

                                        {{-- <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a> --}}
                                    @endauth

                                    @guest

                                        <a href="{{ route('signin') }}" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        {{-- <a href="{{ route('signin') }}" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a> --}}

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
                    @endforelse


				</div>
			</div>
		</div>

	</section>
	<!-- end product Area -->

@endsection


