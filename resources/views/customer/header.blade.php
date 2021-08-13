<?php
  use App\Http\Controllers\CustomerIndexController;
  $total=0;
  if(Session::has('user')){
    $total=CustomerIndexController::cartItem();
  }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>One Click Service</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="A2Z Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- //for-mobile-apps -->
	{{-- <link href={{asset("dist/css/cust_css/bootstrap.css")}} rel="stylesheet" type="text/css" media="all" /> --}}
	{{-- <!--banner slider  -->
	<link href={{asset("dist/css/cust_css/JiSlider.css")}} rel="stylesheet">
    <link href="dist/css/cust_css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //banner-slider -->
	<link href={{asset("dist/css/cust_css/font-awesome.css")}} rel="stylesheet" type="text/css" media="all" />--}}
	{{-- <link href={{asset("dist/css/cust_css/style.css")}} rel="stylesheet" type="text/css" media="all" /> --}}
	{{--<link href="//fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
    <style>
        .navbar{
            background: blue;
        }
        .nav-link{
            color: #ffffff !important;
            margin-left: 3rem;
        }
        body{
            background: #fff;
        }
        .nav-link:hover{
            background: orange;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 3rem;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('customer.index')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('customer.index')}}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('orders')}}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('cart.list')}}">Cart({{$total}})</a>
                </li>
                <li class="nav-item">
                  @if (Session::has('user'))
                    <a class="nav-link" href="/logout">Logout({{Session::get('user')['name']}})</a>  
                  @else
                    <a class="nav-link" href="/loginIndex">Login</a>
                  @endif
                </li>
              </ul>
            </div>
          </nav>
          @yield('content')
    </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  @yield('js_content')
</body>
</html>