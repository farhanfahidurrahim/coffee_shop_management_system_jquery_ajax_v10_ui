@extends('layouts.app')
@section('content')
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            {{-- Session Notification  --}}
            @if (Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif
            <div class="col-md-12 ftco-animate">
                <div class="">
                    <table class="table-dark" style="width: 1100px">
                        <thead style="background-color: #c49b63; height: 60px">
                            <tr class="text-center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Full Address</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() > 0)
                                @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ $order->last_name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->city }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                                @endforeach
                            @else
                                <p class="alert alert-danger">You have No Order!</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            {{-- <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>${{ $totalPrice }}</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>${{ $totalPrice }}</span>
                    </p>
                </div>
                @if ($cartProducts->count() > 0)
                    <form method="post" action="{{ route('checkout.proceed') }}">
                        @csrf
                        <input type="text" name="price" value="{{ $totalPrice }}">
                        <button type="submit" class="btn btn-danger py-3 px-4">Proceed to Checkout</button>
                    </form>
                    @else
                    <p class="text-center alert alert-success">Proceed to Checkout? Add Cart First</a></p>
                @endif
            </div> --}}
        </div>
    </div>
</section>
@endsection
