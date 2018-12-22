@extends('layouts.layout')
@section('content')
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
        </style>
    <div class="section">
        <div class="container" style="background-color: #1a2226">
            <div class="row">
                <div class="col col-md-6 col-md-offset-3">
                    <img src="{{asset('/img/logo.png')}}">
                    <p style="color: white">Our company will serve you with honor and dignity! </p>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-5 col-md-offset-3">
                <div id="map"></div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col col-md-9 col-md-offset-1">
                    <ul class="header-links pull-left">
                        <label style="color: white">You can call us: </label>
                        <li><a href="#"><i class="fa fa-phone"
                                ></i> {{$about->phone}}</a>
                        </li>
                        <label style="color: white">You can email us: </label>
                        <li><a href="{{route('contact-us')}}"><i class="fa fa-envelope-o"
                                ></i> {{$about->email}}
                            </a></li>
                        <label style="color: white">You can visit us: </label>
                        <li><a href="#"><i class="fa fa-map-marker"
                                ></i> {{$about->address}}
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        initMap();
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: {{explode(',',$about->location)[0]}}, lng: {{explode(',',$about->location)[1]}}};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 13, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2KCdFLndIRA5MK0YZR-QJ_S_MGrryyr8&callback=initMap">
    </script>
@endsection