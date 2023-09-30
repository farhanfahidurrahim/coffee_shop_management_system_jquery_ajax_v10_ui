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
                    <div class="cart-list">
                        <table class="table-dark" style="width: 1100px">
                            <thead style="background-color: #c49b63; height: 60px">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cartProducts->count() > 0)
                                    @foreach ($cartProducts as $cartProduct)
                                    <tr class="text-center">
                                        <td class="product-remove"><a href="{{ route('cart.delete',$cartProduct->product_id) }}"><span class="icon-close"></span></a></td>
                                        <td class="image-prod"><img width="100" height="80" src="{{ asset('uploads/products/'.$cartProduct->image) }}"></td>
                                        <td class="product-name">
                                            <h3>{{ $cartProduct->name }}</h3>
                                            <p>Far far away, behind the word mountains, far from the countries</p>
                                        </td>
                                        <td class="price">${{ $cartProduct->price }}</td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <input disabled type="text" name="quantity"
                                                    class="quantity form-control input-number" value="1" min="1"
                                                    max="100">
                                            </div>
                                        </td>
                                        <td class="total">${{ $cartProduct->price }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <p class="alert alert-danger">You Have No Product in Cart!</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
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
                </div>
            </div>
        </div>
    </section>
@endsection
