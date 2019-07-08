<!DOCTYPE html>
<html lang="en">

<head>
	<title>Deep of Field Viet Nam</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('templates/user')}}/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/css/animate.css">

	<link rel="stylesheet" href="{{asset('templates/user')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/css/magnific-popup.css">

	<link rel="stylesheet" href="{{asset('templates/user')}}/css/aos.css">

	<link rel="stylesheet" href="{{asset('templates/user')}}/css/ionicons.min.css">

	<link rel="stylesheet" href="{{asset('templates/user')}}/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/css/jquery.timepicker.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/css/bootstrap.min.css">

	<link rel="stylesheet" href="{{asset('templates/user')}}/css/flaticon.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/css/icomoon.css">
	<link rel="stylesheet" href="{{asset('templates/user')}}/scss/style.css">
</head>

<body>

	<div id="site-page">
		<a href="#" class="js-site-nav-toggle site-nav-toggle"><i></i></a>
		<aside id="site-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="site-logo"><a href="index.html"><span class="flaticon-camera"></span>DOFvn</a></h1>
			<nav id="site-main-menu" role="navigation">
				<ul>
					<li class="<?= Route::current()->getName() == 'home.index'?'site-active':''?>"><a href="/">Home</a></li>
					<li class="<?= Route::current()->getName() == 'gallery.index'?'site-active':''?>"><a href="/"><a href="/gallery">Gallery</a></li>
					<li class="<?= Route::current()->getName() == 'posts.index'?'site-active':''?>"><a href="/blog">Blog</a></li>
					<li><a href="/contact">Contact</a></li>
					<li><a href="/login">Log In</a></li>
				</ul>
			</nav>

			<div class="site-footer">
				<h3>Follow Us Here!</h3>
				<div class="d-flex justify-content-center">
					<ul class="d-flex align-items-center">
						<li class="d-flex align-items-center jusitfy-content-center"><a href="#"><i
									class="icon-facebook"></i></a></li>
						<li class="d-flex align-items-center jusitfy-content-center"><a href="#"><i
									class="icon-twitter"></i></a></li>
						<li class="d-flex align-items-center jusitfy-content-center"><a href="#"><i
									class="icon-instagram"></i></a></li>
						<li class="d-flex align-items-center jusitfy-content-center"><a href="#"><i
									class="icon-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</aside>
