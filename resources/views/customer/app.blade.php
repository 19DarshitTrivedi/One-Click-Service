<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
	<meta name="keywords" content="a2z Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script> 
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="dist/css/cust_css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--banner slider  -->
	<link href="dist/css/cust_css/JiSlider.css" rel="stylesheet">
	<!-- //banner-slider -->
	<link href="dist/css/cust_css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<link href="dist/css/cust_css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">

</head>

<body>
	<!-- header -->
	<div class="w3layouts-header">
		<div class="container">

			<div class="logo-nav-agileits">
				<div class="logo-nav-left">
					<h1>
						<a href="{{route('customer.index')}}">
							<span class="fa fa-home"></span>One
							<span class="logo-title">Click Service</span>
						</a>
					</h1>
				</div>

				<div class="header-grid-left-wthree">
					<div class="h3-title">
						<h3>contact us</h3>
					</div>
					<ul>
						<li>
							<span class="fa fa-envelope" aria-hidden="true"></span>
							<a href="mailto:darshittrivedi603@gmail.com">darshittrivedi603.com</a>
						</li>
						<li>
							<span class="fa fa-phone" aria-hidden="true"></span>+91 9408544064
						</li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			<div class="logo-nav-left1">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="{{route('customer.index')}}">Home</a>
							</li>
							<li>
								<a href="{{route('customer.index')}}">services</a>
							</li>
							<li>
								<a href="{{route('orders')}}">Orders</a>
							</li>
							<li>
								<a href="plan.html">About Us</a>
							</li>
							<li>
								<a href="contact.html">contact us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('cart.list')}}">Cart({{$total}})</a>
							</li>
							<li class="nav-item">
								@if (Session::has('user'))
								  <a class="nav-link" href="/logout">Logout({{Session::get('user')['name']}})</a>  
								@else
								  <a class="nav-link" href="/login">Login</a>
								@endif
							</li>
						</ul>
					</div>

				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //header -->
	<!-- banner -->
	<div class="banner-silder">
		<div id="JiSlider" class="jislider">
			<ul>

				<li>
					<div class="banner-top banner-top1">
						<div class="container">
							<div class="banner-info info2">
                <img src="dist/img/bg2.jpg" alt="" />
								<h3>one stop home services</h3>
								<p>let us do it for you.</p>

							</div>
						</div>
					</div>
				</li>


				<li>
					<div class="banner-top banner-top2">
						<div class="container">
							<div class="banner-info bg3 info2">
                <img src="dist/img/g8.jpg" alt="" />
								<h3>one click repair service</h3>
								<p>repair.&nbsp;improve.&nbsp;maintain</p>
							</div>

						</div>
					</div>
				</li>
				<li>
					<div class="banner-top banner-top3">
						<div class="container">
							<div class="banner-info bg3">
                <img src="dist/img/bg3.jpg" alt="" />
								<h3>Property Maintenance Services</h3>
								<p>one call does it all.</p>
							</div>

						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- //banner -->
		<!-- banner bottom -->
		<div class="banner-btm">
			<div class="container">
				<div class="banner-bottom-main">
					<div class="col-md-4 banner-btmg1">

						<div class="form-text">
							<h3>Looking for a Handyman?</h3>
							<p>We solve your Home repair needs!</p>
							<img src="dist/img/f1.png" alt="" />
						</div>
						<form action="{{route('save.provider')}}" method="post" class="banner_form">
							@csrf
							<div class="sec-left">
								<label class="contact-form-text" for="name">Name</label>
								<input placeholder="your name " name="name" type="text" required="">
							</div>
							<div class="sec-right">
								<label class="contact-form-text" for="email">Email</label>
								<input placeholder="xxx@xx.com " name="email" type="email" required="">
							</div>
							<div class="sec-right">
								<label class="contact-form-text" for="password">Password</label>
								<input placeholder="xxx@xx.com " name="password" type="text" required="">
							</div>
							<div class="sec-left">
								<label class="contact-form-text" for="phone">Mobile no.</label>
								<input placeholder=" XXXXXX" name="phone" type="text" required="">
							</div>
							<div class="form-select sec-right">
								<label class="contact-form-text">Select Service</label>
								<select name="specialization">
									<option value="0">---- SELECT ----</option>
									@foreach ($data as $service)
										<option value="{{$service['service_name']}}">{{$service['service_name']}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-tx">
								<label class="contact-form-text" for="address">Address</label>
								<textarea name="address" placeholder="your address" required=""></textarea>
							</div>
							<div class="form-tx">
								<label class="contact-form-text" for="city">City</label>
								<input type="text" name="city" placeholder="your city" required=""></textarea>
							</div>
							<div class="form-tx">
								<label class="contact-form-text" for="state">State</label>
								<input type="text" name="state" placeholder="your state" required=""></textarea>
							</div>
							<div class="form-tx">
								<label class="contact-form-text" for="pin_code">Pin Code</label>
								<input type="text" name="pin_code" placeholder="your pin code" required=""></textarea>
							</div>
							<input type="submit" value="Submit">
						</form>
					</div>
					<div class="col-md-8">
						@foreach ($data as $data)
						<div class="col-md-4 banner-grid2" style="margin-top: 3rem;">
							<div class="banner-subg1">
								<h3>{{$data['service_name']}}</h3>
								<p>Click On View More To Find More.</p>
								<div class="read-btn mt-5">
									<a href="{{ route('customer.sub_service',$data['id']) }}">view more</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //banner bottom -->
		<!-- about -->
		<div class="agile-about-main">
			<div class="col-md-4 about-left">
				<div class="about-main-bg text-center">
					<h4 class="about-title">Why</h4>
					<h4 class="sub">
						<span>c</span>hoose
						<span>u</span>s?</h4>
				</div>
			</div>
			<div class="col-md-8 about-bottom-g1">
				<h4>One Stop Solution for your Complete Home Maintenance</h4>
				<!-- <h4>get easy home repairs and upgrades with professional home service providers</h4> your complete home solution.-->
				<div class="about-grid">
					<div class="about-bottom-right">
						<div class="abouthome-grid">
							<span class="hi-icon hi-icon-archive fa fa-check"> </span>
						</div>
						<div class="about-bottom">
							<h5>vision</h5>
							<p>Consectetur adipiscing elit estibulum nibh urna</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="about-bottom-right">
						<div class="abouthome-grid">
							<span class="hi-icon hi-icon-archive  fa fa-book"> </span>
						</div>
						<div class="about-bottom">
							<h5>affordable</h5>
							<p>Elit consectetur adipiscing estibulum nibh urna</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class=" about-bottom-right">
						<div class="abouthome-grid">
							<span class="hi-icon hi-icon-archive fa fa-photo"> </span>
						</div>
						<div class="about-bottom">
							<h5>quality</h5>
							<p>Consectetur adipiscing elit estibulum nibh urna</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class=" about-bottom-right">
						<div class="abouthome-grid">
							<span class="hi-icon hi-icon-archive fa fa-briefcase"> </span>
						</div>
						<div class="about-bottom">
							<h5>24*7 support</h5>
							<p>Adipiscing consectetur elit estibulum nibh urna</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="abt-img">
					<img src="dist/img/a1.png" alt="" class="img-responsive" />
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //about -->
	<!--  about bottom -->
	<!--  //about bottom -->
	<!-- footer -->
	<div class="cpy-footer">
		<div class="cpy-text">
			<p>© 2021 All rights reserved by One Click Service

			</p>
		</div>
	</div>
	<!--//footer  -->
	<!-- js -->
	<script src="dist/js/cust_js/jquery-2.2.3.min.js"></script>
	<!-- //js-->
	<!--banner-slider-->
	<script src="dist/js/cust_js/JiSlider.js"></script>
	<script> 
		$(window).load(function () {
			$('#JiSlider').JiSlider({
				color: '#fff',
				start: 1,
				reverse: false
			}).addClass('ff')
		})
	</script>
	<!-- //banner-slider -->
	<!--search-bar-->
	<script src="dist/js/cust_js/main.js"></script>
	<!--//search-bar-->
	<!-- start-smooth-scrolling -->
	<script  src="dist/js/cust_js/move-top.js"></script>
	<script  src="dist/js/cust_js/easing.js"></script>
	<script> 
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script> 
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<script  src="dist/js/cust_js/SmoothScroll.min.js"></script>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="dist/js/cust_js/bootstrap.js"></script>
</body>

</html>