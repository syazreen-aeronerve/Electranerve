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
		<link rel="icon" type="image/png" href="images/electranerve.png">
		
		<!-- Stylesheets -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/vertical-responsive-menu.min.css" rel="stylesheet">
		<link href="css/analytics.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">	
		<link href="vendor/chartist/dist/chartist.min.css" rel="stylesheet">
		<link href="vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.css" rel="stylesheet">
		
		<style>
			#myTable_filter{
				margin-bottom:20px;
				margin-top:20px;
			}

			#myTable_length{
				margin-bottom:20px;
				margin-top:20px;
			}
		</style>
	</head>

<body class="d-flex flex-column h-100">
	
	<!-- Header Start-->
	<header class="header">
		<div class="header-inner">		
			<nav class="navbar navbar-expand-lg bg-barren barren-head navbar fixed-top justify-content-sm-start pt-0 pb-0 ps-lg-0 pe-2">
				<div class="container-fluid ps-0">
					<button type="button" id="toggleMenu" class="toggle_menu">
						<i class="fa-solid fa-bars-staggered"></i>
					</button>
					<button id="collapse_menu" class="collapse_menu me-4">
						<i class="fa-solid fa-bars collapse_menu--icon "></i>
						<span class="collapse_menu--label"></span>
					</button>
					<button class="navbar-toggler order-3 ms-2 pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<span class="navbar-toggler-icon">
							<i class="fa-solid fa-bars"></i>
						</span>
					</button>
					<a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 me-auto" href="/home-organiser">
						<div class="res-main-logo">
							<img src="images/electranerve.png" alt=""  style="width:40px; height:40px;">
						</div>
						<div class="main-logo" id="logo">
							<img src="images/electranerve.png" alt="" style="width:40px; height:40px;"> <span style="color:black;">ElectraNerve</span>
							<img class="logo-inverse" src="images/electranerve.png"  style="width:40px; height:40px;" alt="">
						</div>
					</a>
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
						<div class="offcanvas-header">
							<div class="offcanvas-logo" id="offcanvasNavbarLabel">
								<img src="images/logo-icon.svg" alt="">
							</div>
							<button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
								<i class="fa-solid fa-xmark"></i>
							</button>
						</div>
						<div class="offcanvas-body">
							<div class="offcanvas-top-area">
							
							</div>
						</div>
					</div>
					<div class="right-header order-2">
						<ul class="align-self-stretch">
						
							<li class="dropdown account-dropdown order-3">
								<a href="#" class="account-link" role="button" id="accountClick" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
								@if(auth()->user()->profile_img == '')
									<img src="images/profile-imgs/img-13.jpg" alt="">
                                    @else
                                    <img src="images/profile-imgs/{{auth()->user()->profile_img}}" alt="">
                                    @endif
									<i class="fas fa-caret-down arrow-icon"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-account dropdown-menu-end" aria-labelledby="accountClick">
									<li>
										<div class="dropdown-account-header">
											<div class="account-holder-avatar">
											@if(auth()->user()->profile_img == '')
									<img src="images/profile-imgs/img-13.jpg" alt="">
                                    @else
                                    <img src="images/profile-imgs/{{auth()->user()->profile_img}}" alt="">
                                    @endif
											</div>
											<h5>{{ auth()->user()->name }}</h5>
											<p>{{ auth()->user()->email }}</p>
										</div>
									</li>
									<li class="profile-link">
										<a href="/admin-profile" class="link-item">My Profile</a>									
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
	<!-- Left Sidebar Start -->
	<nav class="vertical_nav">
		<div class="left_section menu_left" id="js-menu">
			<div class="left_section">
				<ul>
					<li class="menu--item">
						<a href="/home-organiser" class="menu--link <?php if($page == 'dashboard') { echo 'active'; } ?>" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-gauge menu--icon"></i>
							<span class="menu--label">Dashboard</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="/eventsmanagement" class="menu--link <?php if($page == 'events') { echo 'active'; } ?>" title="Events" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-calendar-days menu--icon"></i>
							<span class="menu--label">Events</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="/ordermanagement" class="menu--link <?php if($page == 'orders') { echo 'active'; } ?>" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-ticket menu--icon"></i>
							<span class="menu--label">Orders</span>
						</a>
					</li>
                    <li class="menu--item">
						<a href="/venuemanagement" class="menu--link <?php if($page == 'venue') { echo 'active'; } ?>" title="Venue Management" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-map-marker menu--icon"></i>
							<span class="menu--label">Venue Management</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="/announcementmanagement" class="menu--link <?php if($page == 'announcement') { echo 'active'; } ?>" title="Announcement Management" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-bullhorn menu--icon"></i>
							<span class="menu--label">Announcement Management</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="/review" class="menu--link <?php if($page == 'review') { echo 'active'; } ?>" title="Review" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-regular fa-star menu--icon"></i>
							<span class="menu--label">Review</span>
						</a>
					</li>
				
					<li class="menu--item">
						<a href="/salesreport" class="menu--link <?php if($page == 'salesreport') { echo 'active'; } ?>" title="Sales Report" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-chart-pie menu--icon"></i>
							<span class="menu--label">Sales Report</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="/mysupportadmin" target="_blank" class="menu--link" title="Support" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-comments menu--icon"></i>
							<span class="menu--label">Support</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="/refundlist" class="menu--link <?php if($page == 'refund') { echo 'active'; } ?>" title="Refund Request" data-bs-toggle="tooltip" data-bs-placement="right">
							<i class="fa-solid fa-undo menu--icon"></i>
							<span class="menu--label">Refund Request</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	<!-- Left Sidebar End -->