@php
  $about_us=\App\aboutus::get()[0];
  $categories=\App\p_category::get();
@endphp

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}"></script>
<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<footer id="footer">
  <!-- top footer -->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <div class="col-md-3 col-xs-6">
          <div class="footer">
            <h3 class="footer-title">About Us</h3>
            <p>{{$about_us->details}}</p>
            <ul class="footer-links">
              <li><a href="{{route('about-us')}}"><i class="fa fa-map-marker"></i>{{$about_us->address}}</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>{{$about_us->phone}}</a></li>
              <li><a href="{{route('contact-us')}}"><i class="fa fa-envelope-o"></i>{{$about_us->email}}</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-xs-6">
          <div class="footer">
            <h3 class="footer-title">Categories</h3>
            <ul class="footer-links">
              <li><a href="{{url('store/Hot%20Deals')}}">Hot deals</a></li>
              @foreach($categories as $category )
                <li><a href="{{url('store/'.$category->category)}}">{{$category->category}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="clearfix visible-xs"></div>

        <div class="col-md-3 col-xs-6">
          <div class="footer">
            <h3 class="footer-title">Information</h3>
            <ul class="footer-links">
              <li><a href="{{route('about-us')}}">About Us</a></li>
              <li><a href="{{route('contact-us')}}">Contact Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Orders and Returns</a></li>
              <li><a href="#">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-xs-6">
          <div class="footer">
            <h3 class="footer-title">Service</h3>
            <ul class="footer-links">
              <li><a href="#">My Account</a></li>
              <li><a href="#">View Cart</a></li>
              <li><a href="#">Wishlist</a></li>
              <li><a href="#">Track My Order</a></li>
              <li><a href="#">Help</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /top footer -->
</footer>
