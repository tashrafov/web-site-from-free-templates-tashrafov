<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>
@php
    $about_us=\App\aboutus::get()[0];
    $categories=\App\p_category::get();
@endphp
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> {{$about_us->phone}}</a></li>
                <li><a href="{{route('contact-us')}}"><i class="fa fa-envelope-o"></i> {{$about_us->email}}</a></li>
                <li><a href="{{route('about-us')}}"><i class="fa fa-map-marker"></i> {{$about_us->address}}</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('index')}}" class="logo">
                            <img src="{{asset('img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="post" action="{{route('store.select')}}">
                            @csrf
                            <input type="hidden" name="_method" value="put"/>
                            <select name="category" class="input-select">
                                <option value="0">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                            <input id="searchbox" name="keyword" class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{isset($_COOKIE['productID']) ? count($_COOKIE['productID']) :0 }}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <?php $total = 0;?>
                                    @if(isset($_COOKIE['productID']))
                                        @for($i=1;$i<=count($_COOKIE['productID']);$i++)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{asset('/storage/'.$_COOKIE['productImage'][$i])}}"
                                                         alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a
                                                                href="{{url('/product/'.$_COOKIE['productID'][$i])}}">{{$_COOKIE['productName'][$i]}}</a>
                                                    </h3>
                                                    <h4 class="product-price"><span class="qty">{{$_COOKIE['productNumber'][$i]}}
                                                            X</span>{{$_COOKIE['productPrice'][$i]}}</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                            <?php $total += $_COOKIE['productNumber'][$i] * $_COOKIE['productPrice'][$i]?>
                                        @endfor

                                    @endif
                                </div>
                                <div class="cart-summary">
                                    <small>{{isset($_COOKIE['productID']) ? count($_COOKIE['productID']) :0 }} Item(s)
                                        selected
                                    </small>
                                    <h5>SUBTOTAL: ${{$total}}</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="{{route('checkout')}}">Checkout <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{route('index')}}">Home</a></li>
                <li><a href="#">Hot Deals</a></li>
                @foreach($categories as $category)
                    <li><a href="{{url("store/{$category->category}")}}">{{$category->category}}</a></li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
