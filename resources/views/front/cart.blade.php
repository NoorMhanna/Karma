@extends('front.layout.master')


@section('content')
    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <form method="POST" action="{{ route('order.store') }}">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $total = 0;
                            @endphp

                            @forelse ($cart as $item)

                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <p>{{ $item['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $item['price'] }}</h5>
                                    </td>

                                    <td>
                                        <img class="" src=" {{ asset('storage/' . $item['image']) }} "
                                            width="100px" height="100" alt="">
                                    </td>

                                    <td>
                                        <div class="product_count">
                                            <input readonly type="text" name="qty" id="sst" maxlength="12"
                                                value="{{ $item['quantity'] }}" title="Quantity:"
                                                class="input-text qty">
                                        </div>
                                    </td>

                                    <td>
                                        <h5>{{ $item['quantity'] * $item['price'] }} $</h5>
                                    </td>
                                </tr>

                                @php
                                    $total += $item['quantity'] * $item['price'];
                                @endphp


                            @empty
                                <tr>
                                    <td colspan="4">
                                        <h3 class="text-center"> No Item in cart</h3>
                                    </td>
                                </tr>

                            @endforelse


                            @if (empty($cart))

                            <tr class="">
                                <td></td>
                                <td></td>
                                <td colspan="4" class="">
                                    <div class="container">
                                        <a type="submit" href="{{route('home')}}" class="primary-btn">
                                            Back To HOME
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @else

                            <tr class="">
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $total }} $</h5>
                                    </td>
                                </tr>

                                <td></td>
                                <td></td>
                                <td colspan="5" class="">
                                    <div class="container">
                                        <button type="submit" class="primary-btn">Proceed to checkout</button>
                                        <input type="hidden" name="amount" value="{{ $total }}">
                                    </div>
                                </td>
                            </tr>



                            @endif



                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->


@endsection
