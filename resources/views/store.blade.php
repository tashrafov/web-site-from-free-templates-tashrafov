@extends('layouts.layout')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->

            <div class="row">
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="put"/>
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Categories</h3>
                            <div class="checkbox-filter">
                                @foreach($category as $temp_cat)
                                    <div class="input-checkbox">
                                        <input name="category" type="checkbox"
                                               @if(isset($_POST['category']) && ($temp_cat->id == $_POST['category'] || $temp_cat->category == $_POST['category'] )) checked
                                               @endif id="c-{{$temp_cat->id}}" value="{{$temp_cat->category}}">
                                        <label for="c-{{$temp_cat->id}}">
                                            <span></span>
                                        {{$temp_cat->category}}
                                        <!--<small>(120)</small>-->
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input name="min_price" id="price-min" type="number"
                                           @if(isset($_POST['min_price'])) value={{$_POST['min_price']}} @endif>
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input name="max_price" id="price-max" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Brand</h3>
                            <div class="checkbox-filter">
                                @foreach($brands as $brand)
                                    <div class="input-checkbox">
                                        <input name="brand" type="checkbox" id="{{$brand->id}}" value="{{$brand->name}}"
                                               @if( isset($_POST['brand']) && $brand->name == $_POST['brand']) checked @endif>
                                        <label for="{{$brand->id}}">
                                            <span></span>
                                            {{$brand->name}}
                                            <small>{{$brand->quantity}}</small>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="aside">
                            <div class="add-to-cart">
                                <button type="submit" class="btn"
                                        style="color:#fff;background-color:#343a40;border-color:#343a40">Filter
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store products -->
                    <div class="row">

                        @foreach($products as $product)

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
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{url('/product/'.$product->id)}}">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                to
                                                cart
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix visible-sm visible-xs"></div>
                        @endforeach

                    </div>
                    <!-- /store products -->

                </div>
                <!-- /STORE -->
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
                        <form method="POST" action="{{route('store/subscribe')}}">
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
        @if(isset($_POST['keyword']))
        document.getElementById('searchbox').value = "{{$_POST['keyword']}}";
        @endif
    </script>
@endsection