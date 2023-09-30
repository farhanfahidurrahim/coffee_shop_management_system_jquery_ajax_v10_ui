@extends('layouts.app')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-md-12 ftco-animate">
                    <form action="{{ route('order') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firt Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="country" id="" class="form-control">
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="America">America</option>
                                            <option value="China">China</option>
                                            <option value="Japan">Japan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Full Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="House number and street name, Appartment, suite, unit etc: (optional)">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" name="postcode" value="{{ old('postcode') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Total Price</label>
                                    <input type="text" name="total_price" value="{{ session('totalPrice') }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->


                    <!--
                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex">
                                      <span>Subtotal</span>
                                      <span>$20.60</span>
                                  </p>
                                  <p class="d-flex">
                                      <span>Delivery</span>
                                      <span>$0.00</span>
                                  </p>
                                  <p class="d-flex">
                                      <span>Discount</span>
                                      <span>$3.00</span>
                                  </p>
                                  <hr>
                                  <p class="d-flex total-price">
                                      <span>Total</span>
                                      <span>$17.60</span>
                                  </p>
                                  </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="radio">
                                                 <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="radio">
                                                 <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="radio">
                                                 <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="checkbox">
                                                 <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                              </div>
                                          </div>
                                      </div>
                                      <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
                                  </div>
                    </div>
                </div> -->
                </div> <!-- .col-md-8 -->


            </div>

        </div>
        </div>
    </section> <!-- .section -->
@endsection
