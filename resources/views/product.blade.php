@extends('layouts.layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img" class="slick-initialized slick-slider">
                        <button class="slick-prev slick-arrow" onclick="lClick()" aria-label="Previous" type="button"
                                style="display: block;">Previous
                        </button>
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1832px;">
                                <div class="product-preview slick-slide slick-current slick-active" id="imageBox1"
                                     data-slick-index="0" aria-hidden="false" tabindex="0"
                                     style="width: 458px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1; overflow: hidden;">
                                    <img src="{{asset('/storage/'.$products->avatar)}}" id="imgWZoom"
                                         alt="{{$products->name}}">
                                    <img role="presentation" id="imgZoom" src="{{asset('/storage/'.$products->avatar)}}"
                                         class="zoomImg"
                                         style="position: absolute; top: -96.7336px; left: -30.8493px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                </div>

                                @php

                                    $images = array_filter(explode(',',trim($products->images,'\,')));
                                    $index=-4;
                                    $i=1;
                                @endphp
                                @foreach($images as $img)
                                    <?php $img = trim(str_replace(array('[', ']'), '', $img), "\""); ?>
                                    <div class="product-preview slick-slide" id="imageBox{{++$i}}" data-slick-index="1"
                                         aria-hidden="true" tabindex="-1"
                                         style="width: 458px; position: relative; left: -458px; top: 0px; z-index: 998; opacity: 0; overflow: hidden;">
                                        <img src="{{asset('/storage/'.$img)}}" alt="{{$products->name}}">
                                        <img role="presentation" src="{{asset('/storage/'.$img)}}" class="zoomImg"
                                             style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="slick-next slick-arrow" onclick="rClick()" aria-label="Next" type="button"
                                style="display: block;">Next
                        </button>
                    </div>
                </div>
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs" class="slick-initialized slick-slider slick-vertical">
                        <button class="slick-prev slick-arrow" onclick="lClick()" aria-label="Previous" type="button"
                                style="display: block;">Previous
                        </button>
                        <div class="slick-list draggable" style="height: 465px; padding: 0px;">
                            <div class="slick-track" id="upDownDiv"
                                 style="opacity: 1; height: 1860px; transform: translate3d(0px, 0px, 0px);">
                                <div class="product-preview slick-slide slick-cloned" id="imageBoxx1"
                                     data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="{{asset('/storage/'.$products->image)}}" alt="">
                                </div>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($images as $img)
                                    <div class="product-preview slick-slide slick-cloned" id="imageBoxx{{++$i}}"
                                         data-slick-index="{{$index}}" aria-hidden="true" tabindex="-1"
                                         style="width: 155px;">
                                        <?php $img = trim(str_replace(array('[', ']'), "", $img), "\""); $index++;?>
                                        <img src="{{asset('/storage/'.$img)}}" alt="">
                                    </div>
                                @endforeach
                                <div class="product-preview slick-slide slick-current slick-active slick-center"
                                     id="imageBoxx{{++$i}}" data-slick-index="0" aria-hidden="false" tabindex="0"
                                     style="width: 155px;">
                                    <img src="{{asset('/storage/'.$products->image)}}" alt="">
                                </div>
                                @foreach($images as $img)
                                    <div class="product-preview slick-slide slick-active" id="imageBoxx{{++$i}}"
                                         data-slick-index="1" aria-hidden="false" tabindex="0" style="width: 155px;">
                                        <?php $img = trim(str_replace(array('[', ']'), "", $img), "\"")?>
                                        <img src="{{asset('/storage/'.$img)}}" alt="">
                                    </div>
                                @endforeach
                                <div class="product-preview slick-slide slick-cloned slick-center"
                                     id="imageBoxx{{++$i}}" data-slick-index="4" aria-hidden="true" tabindex="-1"
                                     style="width: 155px;">
                                    <img src="{{asset('/storage/'.$products->image)}}" alt="">
                                </div>
                                @foreach($images as $img)
                                    <div class="product-preview slick-slide slick-cloned" id="imageBoxx{{++$i}}"
                                         data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                        <?php $img = trim(str_replace(array('[', ']'), "", $img), "\"")?>
                                        <img src="{{asset('/storage/'.$img)}}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <button class="slick-next slick-arrow" onclick="rClick()" aria-label="Next" type="button"
                                style="display: block;">Next
                        </button>
                    </div>
                </div>


                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{$products->name}}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">{{$products->num_reviews}} | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">${{$products->price}} @if(isset($products->price_old))
                                    <del class="product-old-price">${{$products->price_old}}</del>@endif</h3>
                            @if($products->in_stock==1)
                                <span class="product-available">In Stock</span>
                            @else
                                <span class="product-available">Out of Stock</span>
                            @endif
                        </div>
                        <p>{{$products->details}}</p>
                        <form action="{{url('/product')}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="post"/>
                            <input type="hidden" name="productId" value="{{$products->id}}"/>
                            <input type="hidden" name="productName" value="{{$products->name}}"/>
                            <input type="hidden" name="productImage" value="{{$products->avatar}}"/>
                            <input type="hidden" name="productPrice" value="{{$products->price}}"/>
                            <div class="product-options">

                                <label>
                                    Size
                                    <select name="size" class="input-select">
                                        <option value="3.5">
                                            3.5 in
                                        </option>
                                        <option value="3.7">
                                            3.7 in
                                        </option>
                                        <option value="4.0">
                                            4.0 in
                                        </option>
                                    </select>
                                </label>
                                <label>
                                    Color
                                    <select name="color" class="input-select">
                                        <option value="Red">
                                            Red
                                        </option>
                                        <option value="Green">
                                            Green
                                        </option>
                                        <option value="Blue">
                                            Blue
                                        </option>
                                        <option value="Black">
                                            Black
                                        </option>
                                        <option value="White">
                                            White
                                        </option>
                                        <option value="Yellow">
                                            Yellow
                                        </option>
                                        <option value="Grey">
                                            Grey
                                        </option>
                                    </select>
                                </label>
                            </div>

                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Quantity
                                    <div class="input-number">
                                        <input name="quantity" type="number"
                                               value="1">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                    cart
                                </button>
                            </div>

                            <ul class="product-btns">
                                <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Category:</li>
                                @foreach($category as $temp_cat)
                                    @if($temp_cat->id==$products->fk_category)
                                        <li><a href="{{url('store/'.$temp_cat->category)}}">{{$temp_cat->category}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews ({{$products->num_reviews}})</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{$products->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{$products->details}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>4.5</span>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 80%;"></div>
                                                    </div>
                                                    <span class="sum">3</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 60%;"></div>
                                                    </div>
                                                    <span class="sum">2</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>When the phone arrived excited to use it then boom it does
                                                            not work! It is an UNLOCKED phone they say but it really
                                                            isn't. Their Customer Service stinks and are no help. I want
                                                            my money back!/p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Received the phone. It worked fine for the first 6 weeks,then
                                                            I lost battery power I turned the phone off at night while
                                                            charging, did not help. Then every else started to fail. Was
                                                            sent to "Youbrakeifi " by Samsung tech support. Diagnostic
                                                            showed a flawed motherboard. I am leaving for overseas next
                                                            week. Amazon declined refund,so I have no phone. This the
                                                            only way I can communicate, no other phone in house. I have
                                                            to spend an other$700 today to buy a phone. Will never ever
                                                            purchase a phone from Amazon. No support.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">John</h5>
                                                        <p class="date">27 DEC 2018, 8:0 PM</p>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Repackaged with sticky cellophane that left adhesive on back
                                                            of phone and camera lenses that can't be removed. Finger
                                                            sensor appears dirty. And nothing was in box except phone.
                                                            No papers, no chargers, no headset. Nothing.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form">
                                                <input class="input" type="text" placeholder="Your Name">
                                                <input class="input" type="email" placeholder="Your Email">
                                                <textarea class="input" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label
                                                                for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label
                                                                for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label
                                                                for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label
                                                                for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label
                                                                for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>


                <!-- product -->
                @foreach($related as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset('/storage/'.$product->avatar)}}" alt="{{$product->name}}">
                            </div>
                            <div class="product-body">
                                @foreach($category as $temp_cat)
                                    @php if($temp_cat->id==$product->fk_category) echo "<p class='product-category'>".$temp_cat->category."</p>" @endphp@endforeach
                                <h3 class="product-name"><a
                                            href="{{url('/product/'.$product->id)}}">{{$product->name}}</a></h3>
                                <h4 class="product-price">${{$product->price}} @if($product->price_old!=null)
                                        <del class="product-old-price">${{$product->price_old}}</del>@endif</h4>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span>
                                    </button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span>
                                    </button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                                    </button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm visible-xs"></div>
            @endforeach
            <!-- /product -->


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form method="POST" action="{{route('product/subscribe')}}">
                            @csrf
                            <input type="hidden" name="_method" value="post"/>
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
    <script>
        var r = 1;
        var u = 1;
        var maxx = parseInt("{{count($images)}}");
        var oldValue = 0;
        var lF = maxx + 1;

        function lClick() {
            if (r > 1) {
                r--;
                document.getElementById("imageBox" + r).style.visibility = 'visible';
                document.getElementById("imageBox" + r).style.opacity = '1';
                document.getElementById("imageBox" + r).setAttribute('aria-hidden', 'false');
                document.getElementById("imageBox" + r).style.left = (-1 * (r - 1) * 458) + "px";


                document.getElementById("imageBox" + (r + 1)).style.visibility = 'hidden';
                document.getElementById("imageBox" + (r + 1)).style.opacity = '0';
                document.getElementById("imageBox" + (r + 1)).setAttribute('aria-hidden', 'true');
                document.getElementById("imageBox" + (r + 1)).style.left = (r * 458) + "px";
                var tmp = maxx + 1;
                oldValue += 155;
                document.getElementById('upDownDiv').style.transform = 'translate3d(0px,' + (oldValue) + 'px,0px)';

                if (lF - maxx > maxx) {
                    lF--;
                    for (var i = 1; i <= 3 * (maxx + 1); i++) {
                        if (i > lF && tmp > 0) {
                            document.getElementById("imageBoxx" + i).setAttribute('aria-hidden', 'false');
                            document.getElementById("imageBoxx" + i).setAttribute('tabindex', '0');
                            tmp--;
                        }
                        else {
                            document.getElementById("imageBoxx" + i).setAttribute('aria-hidden', 'true');
                            document.getElementById("imageBoxx" + i).setAttribute('tabindex', '-1');
                        }

                    }

                }

            }
        }

        function rClick() {
            if (r < maxx) {
                r++;

                document.getElementById("imageBox" + r).style.visibility = 'visible';
                document.getElementById("imageBox" + r).style.opacity = '1';
                document.getElementById("imageBox" + r).setAttribute('aria-hidden', 'false');
                document.getElementById("imageBox" + r).style.left = (-1 * (r - 1) * 458) + "px";

                document.getElementById("imageBox" + (r - 1)).style.visibility = 'hidden';
                document.getElementById("imageBox" + (r - 1)).style.opacity = '0';
                document.getElementById("imageBox" + (r - 1)).setAttribute('aria-hidden', 'true');
                document.getElementById("imageBox" + (r - 1)).style.left = (r * 458) + "px";
                var tmp = maxx + 1;
                oldValue -= 155;
                document.getElementById('upDownDiv').style.transform = 'translate3d(0px,' + oldValue + 'px,0px)';
                if (lF + maxx < 3 * tmp) {
                    lF++;
                    for (var i = 1; i <= 3 * (maxx + 1); i++) {
                        if (i > lF && tmp > 0) {
                            document.getElementById("imageBoxx" + i).setAttribute('aria-hidden', 'false');
                            document.getElementById("imageBoxx" + i).setAttribute('tabindex', '0');
                            tmp--;
                        }
                        else {
                            document.getElementById("imageBoxx" + i).setAttribute('aria-hidden', 'true');
                            document.getElementById("imageBoxx" + i).setAttribute('tabindex', '-1');
                        }

                    }

                }

            }
        }

    </script>
    <script>
        $('div.input-number').each(function () {
            var $this = $(this),
                $input = $this.find('input[type="number"]'),
                up = $this.find('.qty-up'),
                down = $this.find('.qty-down');

            down.on('click', function () {
                var value = parseInt($input.val()) - 1;
                value = value < 1 ? 1 : value;
                $input.val(value);
                $input.change();
            })

            up.on('click', function () {
                var value = parseInt($input.val()) + 1;
                $input.val(value);
                $input.change();
            })
        });
    </script>

@endsection