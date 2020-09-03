<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{config('app.name', 'INVESTAPLANNING')}} | {{$page->title ?? ''}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{!! asset('public/asset-front/css/open-iconic-bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/animate.css') !!}">
    
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/owl.carousel.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/owl.theme.default.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/magnific-popup.css') !!}">

    <link rel="stylesheet" href="{!! asset('public/asset-front/css/aos.css') !!}">

    <link rel="stylesheet" href="{!! asset('public/asset-front/css/ionicons.min.css') !!}">
    
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/flaticon.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/icomoon.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/asset-front/css/style.css') !!}">
  </head>
  <body>	
  	@include('include.header-frontend')
    
    @yield('content')


	@include('include.footer-frontend')		    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{!! asset('public/asset-front/js/jquery.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/jquery-migrate-3.0.1.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/popper.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/jquery.easing.1.3.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/jquery.waypoints.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/jquery.stellar.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/owl.carousel.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/jquery.magnific-popup.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/aos.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/jquery.animateNumber.min.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/scrollax.min.js') !!}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{!! asset('public/asset-front/js/google-map.js') !!}"></script>
  <script src="{!! asset('public/asset-front/js/main.js') !!}"></script>
   @yield('script')
  </body>
</html>