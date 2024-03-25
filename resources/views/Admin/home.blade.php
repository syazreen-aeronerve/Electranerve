<?php
$page = 'dashboard';
?>
@include('Navigation-admin.app')
	<!-- Body Start -->
	<div class="wrapper wrapper-body">
		<div class="dashboard-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="d-main-title">
							<h3><i class="fa-solid fa-gauge me-3"></i>Dashboard</h3>
						</div>
					</div>
					<div class="col-md-12">
						<div class="main-card add-organisation-card p-4 mt-5">
							<div class="ocard-left">
								<div class="ocard-avatar">
								@if(auth()->user()->profile_img == '')
									<img src="images/profile-imgs/img-13.jpg" alt="">
                                    @else
                                    <img src="images/profile-imgs/{{auth()->user()->profile_img}}" alt="">
                                    @endif
								</div>
								<div class="ocard-name">
									<h4>{{ auth()->user()->name }}</h4>
									<span>My Organisation</span>
								</div>
							</div>
						</div>
						<div class="main-card mt-4">
							<div class="dashboard-wrap-content">
								<div class="d-flex flex-wrap justify-content-between align-items-center p-4">
									<div class="dashboard-date-wrap d-flex flex-wrap justify-content-between align-items-center">
									</div>
								</div>
								<div class="dashboard-report-content">
									<div class="row">
										<div class="col-xl-3 col-lg-6 col-md-6">
											<div class="dashboard-report-card purple">
												<div class="card-content">
													<div class="card-content">
														<span class="card-title fs-6">Revenue (MYR)</span>
														<span class="card-sub-title fs-3">RM {{ number_format($totalrevenue, 2) }}</span>
													</div>
													<div class="card-media">
														<i class="fa-solid fa-money-bill"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-md-6">
											<div class="dashboard-report-card red">
												<div class="card-content">
													<div class="card-content">
														<span class="card-title fs-6">Total Events</span>
														<span class="card-sub-title fs-3">{{ $totalevent }}</span>
														
													</div>
													<div class="card-media">
														<i class="fa-solid fa-calendar"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-md-6">
											<div class="dashboard-report-card info">
												<div class="card-content">
													<div class="card-content">
														<span class="card-title fs-6">Total Customer</span>
														<span class="card-sub-title fs-3">{{ $totalcustomer }}</span>
														
													</div>
													<div class="card-media">
														<i class="fa-solid fa-user"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-md-6">
											<div class="dashboard-report-card success">
												<div class="card-content">
													<div class="card-content">
														<span class="card-title fs-6">Ticket Sold</span>
														<span class="card-sub-title fs-3">{{ $totalsold }}</span>
													</div>
													<div class="card-media">
														<i class="fa-solid fa-ticket"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="main-card mt-4">
							<br>
						<center><h3 style="text-align: center;">Monthly Sales for the Year {{ now()->format('Y') }}</h2></center>
							<div class="item-analytics-content p-4 ps-1 pb-2">
								<div id="views-graphic"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Body End -->
	
	@include('Navigation-admin.footer')