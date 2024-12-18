<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free frontend Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 frontend Template by gettemplates.co" />
	<meta name="keywords"
		content="free frontend templates, free html5, free template, free bootstrap, free frontend template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- Add the following links in your HTML head section -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>


	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	frontend: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
    <link rel="stylesheet" href={{ asset('frontend/css/animate.css') }} />
	<!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href={{ asset('frontend/css/icomoon.css') }} />
	<!-- Bootstrap  -->
    <link rel="stylesheet" href={{ asset('frontend/css/bootstrap.css') }} />
	<!-- Flexslider  -->
    <link rel="stylesheet" href={{ asset('frontend/css/flexslider.css') }} />

	<!-- Owl Carousel  -->
    <link rel="stylesheet" href={{ asset('frontend/css/owl.carousel.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/owl.theme.default.min.css') }} />

	<!-- Theme style  -->
    <link rel="stylesheet" href={{ asset('frontend/css/style.css') }} />

	<!-- Modernizr JS -->
    <script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
{{-- 
	<div class="fh5co-loader"></div> --}}

	<div id="page">
		@include('frontend.includes.navbar')

		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<li style="background-image: url(/frontend/images/All-Product.png);">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<span class="price">$800</span>
										<h2>New Keto
											Green Coffee
										</h2>
										<p>আমাদের নিউ কেটো গ্রীন কফি সঙ্গে যোগ করে দিন আপনার স্বাস্থ্যের জন্যে। এটি একটি
											ব্রান্ড যা ঝড়ের গতিতে বাড়তি মেদভুড়ি কমাতে সহায়তা করে। আমাদের পণ্যটি
											বিশ্বস্ত এবং মূল্যবান। তাই স্বাস্থ্য উপভোগ করতে আজই নিউ কেটো গ্রীন কফি চয়ন
											করুন।</p>
										<p><a href="./index.html" class="btn btn-primary btn-outline btn-lg">Purchase
												Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(/frontend/images/Keto-Green-Coffee-2.png);">
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<span class="price">$530</span>
									</h2>
									<p>আমাদের নিউ কেটো গ্রীন কফি সঙ্গে যোগ করে দিন আপনার স্বাস্থ্যের জন্যে। এটি একটি
										ব্রান্ড যা ঝড়ের গতিতে বাড়তি মেদভুড়ি কমাতে সহায়তা করে। আমাদের পণ্যটি
										বিশ্বস্ত এবং মূল্যবান। তাই স্বাস্থ্য উপভোগ করতে আজই নিউ কেটো গ্রীন কফি চয়ন
										করুন।</p>
									<p><a href="./index.html" class="btn btn-primary btn-outline btn-lg">Purchase
											Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(/frontend/images/All-Product.png);">
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<span class="price">$750</span>
									</h2>
									<p>আমাদের নিউ কেটো গ্রীন কফি সঙ্গে যোগ করে দিন আপনার স্বাস্থ্যের জন্যে। এটি একটি
										ব্রান্ড যা ঝড়ের গতিতে বাড়তি মেদভুড়ি কমাতে সহায়তা করে। আমাদের পণ্যটি
										বিশ্বস্ত এবং মূল্যবান। তাই স্বাস্থ্য উপভোগ করতে আজই নিউ কেটো গ্রীন কফি চয়ন
										করুন।</p>
									<p><a href="./index.html" class="btn btn-primary btn-outline btn-lg">Purchase
											Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(/frontend/images/green-coffee-bean-weight-loss_thumb.webp);">
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
								<div class="slider-text-inner">
									<div class="desc">
										<span class="price">$540</span>
									</h2>
									<p>আমাদের নিউ কেটো গ্রীন কফি সঙ্গে যোগ করে দিন আপনার স্বাস্থ্যের জন্যে। এটি একটি
										ব্রান্ড যা ঝড়ের গতিতে বাড়তি মেদভুড়ি কমাতে সহায়তা করে। আমাদের পণ্যটি
										বিশ্বস্ত এবং মূল্যবান। তাই স্বাস্থ্য উপভোগ করতে আজই নিউ কেটো গ্রীন কফি চয়ন
										করুন।</p>
									<p><a href="./index.html" class="btn btn-primary btn-outline btn-lg">Purchase
											Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-credit-card"></i>
							</span>
							<h3>Credit Card</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
								there live the blind texts. Separated they live in Bookmarksgrove</p>
							<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<h3>Save Money</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
								there live the blind texts. Separated they live in Bookmarksgrove</p>
							<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-paper-plane"></i>
							</span>
							<h3>Free Delivery</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
								there live the blind texts. Separated they live in Bookmarksgrove</p>
							<p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Cool Stuff</span>
						<h2>Products.</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
							provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(/frontend/images/Keto-Green-Coffee.png);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="single.html" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">Hauteville Concrete Rocking Chair</a></h3>
								<span class="price">$350</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(/frontend/images/Keto-Green-Coffee.png);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="single.html" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">Pavilion Speaker</a></h3>
								<span class="price">$600</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(/frontend/images/Keto-Green-Coffee-2.png);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="single.html" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">Ligomancer</a></h3>
								<span class="price">$780</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(/frontend/images/All-Product.png);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="single.html" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">Alato Cabinet</a></h3>
								<span class="price">$800</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(/frontend/images/Keto-Green-Coffee.png);">
								
								<div class="inner">
									<p>
										<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="single.html" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">Earing Wireless</a></h3>
								<span class="price">$100</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(/frontend/images/Keto-Green-Coffee-2.png);">
                                
								<div class="inner">
									<p>
										<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="single.html" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">Sculptural Coffee Table</a></h3>
								<span class="price">$960</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>Just stay tune for our latest Product. Now you can subscribe</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(/frontend/images/img_bg_5.jpg);">
		<div class="container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000"
									data-refresh-interval="50">1</span>
								<span class="counter-label">Creativity Fuel</span>

							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000"
									data-refresh-interval="50">1</span>
								<span class="counter-label">Happy Clients</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
								<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000"
									data-refresh-interval="50">1</span>
								<span class="counter-label">All Products</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000"
									data-refresh-interval="50">1</span>
								<span class="counter-label">Hours Spent</span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>Just stay tune for our latest Product. Now you can subscribe</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	@include('frontend.includes.footer')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
    <script src="{{ asset('frontend/js/jquery.countTo.js') }}"></script>
	<!-- Flexslider -->
    <script src="{{ asset('frontend/js/jquery.flexslider-min.js') }}"></script>
	<!-- Main -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>