@extends('layouts.layout')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
            <form method="post" action="{{route('checkout/placeorder')}}">
                @csrf
                <input type="hidden" name="_method" value="put"/>
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip_code" placeholder="ZIP Code">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Telephone">
                        </div>
                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" name="create_account" id="create_account">
                                <label for="create_account">
                                    <span></span>
                                    Create Account?
                                </label>
                                <div class="caption">
                                    <p>Please insert your password:</p>
                                    <input class="input" type="password" name="password"
                                           placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Billing Details -->

                    <!-- Shiping Details -->
                    <div class="shiping-details">
                        <div class="section-title">
                            <h3 class="title">Shiping address</h3>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" name="shipping_address" id="shiping-address" name="shipping_address">
                            <label for="shiping-address">
                                <span></span>
                                Ship to a diffrent address?
                            </label>
                            <div class="caption">
                                <div class="form-group">
                                    <input class="input" type="text" name="s_first_name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="s_last_name" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="s_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="s_address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="s_city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="s_country" placeholder="Country">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="s_zip_code" placeholder="ZIP Code">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="s_tel" placeholder="Telephone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Shiping Details -->

                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea class="input" placeholder="Order Notes"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            <?php $total = 0;?>
                            @if(isset($_COOKIE['productID']))
                                @for($i=1;$i<=count($_COOKIE['productID']);$i++)
                                    <div class="order-col">
                                        <div>{{$_COOKIE['productNumber'][$i]}}x {{$_COOKIE['productName'][$i]}}</div>
                                        <div>${{$_COOKIE['productNumber'][$i]*$_COOKIE['productPrice'][$i]}}</div>
                                    </div>
                                        <?php $total += $_COOKIE['productNumber'][$i] * $_COOKIE['productPrice'][$i]?>
                                @endfor
                            @endif

                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">${{$total}}</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Direct Bank Transfer
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Cheque Payment
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Paypal System
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div>

                    <button type="submit" class="primary-btn order-submit">Place order</button>
                </div>
                <!-- /Order Details -->
            </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form method="POST" action="{{route('checkout/subscribe')}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"/>
                            <input class="input" name="email" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@endsection