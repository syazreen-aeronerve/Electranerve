<!DOCTYPE html>
<html lang="en" class="h-100">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>ElectraNerve</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="{{ asset('images/electranerve.png') }}">
		
		<!-- Stylesheets -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link href='{{ asset("vendor/unicons-2.0.1/css/unicons.css") }}' rel='stylesheet'>
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
		<link href="{{ asset('css/night-mode.css') }}" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">		

		<style>
.modal-newsletter {	
	color: #9f9f9f;
	width: 525px;
	font-size: 15px;
}		
.modal-newsletter .modal-content {
	padding: 40px 50px;
	border-radius: 1px;		
	border: none;
}
.modal-newsletter .modal-header {
	border-bottom: none;   
	position: relative;
	text-align: center;
	border-radius: 5px 5px 0 0;
}
.modal-newsletter h4 {
	color: #000;
	text-align: center;
	font-family: 'Raleway', sans-serif;
	font-weight: 800;
	font-size: 30px;
	margin: 0;		
	text-transform: uppercase;
}	
.modal-newsletter .close {
	position: absolute;
	top: -25px;
	right: -35px;
	color: #c0c3c8;
	text-shadow: none;
	opacity: 0.5;
	font-size: 26px;
	font-weight: normal;
}
.modal-newsletter .close:hover {
	opacity: 0.8;
}
.modal-newsletter .form-control, .modal-newsletter .btn {
	min-height: 46px;
	text-align: center;
	border-radius: 1px; 
}
.modal-newsletter .form-control {
	box-shadow: none;
	background: #f5f5f5;
	border-color: #d5d5d5;
}
.modal-newsletter .form-control:focus {
	border-color: #ccc;
	box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}
.modal-newsletter .btn {
	color: #fff;
	background: #353535;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	padding: 6px 20px;
	border: none;
	margin-top: 20px;
	font-family: 'Raleway', sans-serif;
	text-transform: uppercase;
}
.modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
	background: #171717;
	outline: none;
	box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
}
.modal-newsletter .form-group {
	padding: 0 20px;
	margin-top: 30px;
}
.modal-newsletter .footer-link{
	margin-top: 20px;
	min-height: 25px;
}
.modal-newsletter .footer-link a {
	color: #353535;
	display: inline-block;
	border-bottom: 2px solid;
	font-weight: bold;
	text-align: center;		
	text-transform: uppercase;
	font-size: 14px;
}
.modal-newsletter .footer-link a:hover, .modal-newsletter .footer-link a:focus {
	text-decoration: none;
	border: none;
}
.hint-text {
	margin: 100px auto;
	text-align: center;
}
</style>

		
	</head>

<body class="d-flex flex-column h-100">
	<!-- Header Start-->
	<header class="header">
		<div class="header-inner">
			<nav class="navbar navbar-expand-lg bg-barren barren-head navbar fixed-top justify-content-sm-start pt-0 pb-0">
				<div class="container">	
					<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<span class="navbar-toggler-icon">
							<i class="fa-solid fa-bars"></i>
						</span>
					</button>
					<a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 me-auto" href="/customer-home">
						<div class="res-main-logo">
							<img src="images/logo-icon.svg" alt="">
						</div>
						<div class="main-logo" id="logo">
							<img  src="{{ asset('images/electranerve.png') }}"  style="width:40px; height:40px;" alt=""> <span style="color:black;"> ElectraNerve</span>
							<img class="logo-inverse"  src="{{ asset('images/electranerve.png') }}"  style="width:40px; height:40px;" alt=""> 
						</div>
					</a>
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
						<div class="offcanvas-header">
							<div class="offcanvas-logo" id="offcanvasNavbarLabel">
								<img  src="{{ asset('images/electranerve.png') }}"  style="width:40px; height:40px;" alt=""> 
							</div>
							<button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
								<i class="fa-solid fa-xmark"></i>
							</button>
						</div>
						<div class="offcanvas-body">
												
							<ul class="navbar-nav justify-content-end flex-grow-1 pe_5">
								<li class="nav-item">
									<a class="nav-link <?php if($page == 'home') { echo 'active'; } ?>" aria-current="page" href="/customer-home">Home</a>
								</li>
                                <li class="nav-item">
									<a class="nav-link <?php if($page == 'events') { echo 'active'; } ?> " aria-current="page" href="/events">Explore Events</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if($page == 'mypurchase') { echo 'active'; } ?>" href="/mypurchase">My Purchase</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if($page == 'refund') { echo 'active'; } ?>" href="/myrefund">Refund Request</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if($page == 'announcement') { echo 'active'; } ?>" href="/announcementlist">Announcement</a>
								</li>

								
                           
                             
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Help
									</a>
									<ul class="dropdown-menu dropdown-submenu">
										<li><a class="dropdown-item <?php if($page == 'faq') { echo 'active'; } ?>" href="/faq">FAQ</a></li>
										<li><a class="dropdown-item" href="/mysupport" target="_blank">Support</a></li>
									</ul>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="right-header order-2">
						<ul class="align-self-stretch">
						
							<li class="dropdown account-dropdown">
								<a href="#" class="account-link" role="button" id="accountClick" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
								@if(auth()->user()->profile_img == '')
									<img src="{{ asset('images/profile-imgs/img-13.jpg') }}" alt="">
                                    @else
                                    <img src="{{ asset('images/profile-imgs/'.auth()->user()->profile_img) }}" alt="">
                                    @endif
									<i class="fas fa-caret-down arrow-icon"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-account dropdown-menu-end" aria-labelledby="accountClick">
									<li>
										<div class="dropdown-account-header">
											<div class="account-holder-avatar">
											@if(auth()->user()->profile_img == '')
									<img src="{{ asset('images/profile-imgs/img-13.jpg') }}" alt="">
                                    @else
                                    <img src="{{ asset('images/profile-imgs/'.auth()->user()->profile_img) }}" alt="">
                                    @endif
											</div>
                                            <h5>{{ auth()->user()->name }}</h5>
											<p>{{ auth()->user()->email }}</p>
										</div>
									</li>
									<li class="profile-link">
										<a href="/customer-profile" class="link-item">My Profile</a>									
										<a href="/signout-user" class="link-item">Sign Out</a>									
									</li>
								</ul>
							</li>
							
						</ul>
					</div>
				</div>
			</nav>
			<div class="overlay"></div>
		</div>
	</header>
	<!-- Header End-->