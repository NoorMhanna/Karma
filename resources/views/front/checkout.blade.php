@extends('front.layout.master')


@section('content')
    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection



<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <h3 class="text-center">Billing Details</h3>

        <div class="billing_details  w-50 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>

                            {{-- @php

                                dd($order->items)
                            @endphp --}}
                            @foreach ($order->items as $item)
                                <li>
                                    <a href="#">{{ $item->product->name }} <span class="middle">x {{ $item->quantity }}</span> <span
                                            class="last">{{ $item->quantity * $item->product->price }} $</span></a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Total <span>$ {{ $order->amount }}</span></a></li>
                        </ul>

                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>

                        <a class="primary-btn" href="{{ route('paypal.create', $order->id) }}">Proceed to Paypal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->


@endsection
