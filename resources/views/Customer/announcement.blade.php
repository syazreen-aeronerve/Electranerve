<?php
$page = 'announcement';
?>
@include('Navigation-Customer.app')
    <!-- Body Start-->
	<div class="wrapper">
		<div class="hero-banner">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-xl-6 col-lg-6 col-md-12">
						<div class="hero-banner-content text-lg-start">
							<h2>Announcement</h2>
							<p class="ps-0">Here are the list of announcement from the organiser. We strongly recommend to regularly access this platform to get update latest announcement such as venue change, event date/time adjust and many more.</p>
							
						</div>
					</div>
					<div class="col-xl-5 col-lg-6 col-md-10">
						<div class="hero-side-banner d-none d-lg-block">
							<img src="images/icons/pricing-banner.gif" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="feature-block p-80">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="main-title text-center mb-4">
							<h3>Announcement List</h3>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="faq-accordion mt-4">
							<div class="accordion" id="accordionPanelsStayOpenExample">
							
                            @foreach($announcements as $announcement)
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-heading2">
										<button class="accordion-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
										<b style="color:blue;">{{ $announcement->organiser->name }}</b>&nbsp;&nbsp;|&nbsp;&nbsp;{{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y h:i A') }}&nbsp;&nbsp;|&nbsp;&nbsp;
{{ $announcement->title }}
										</button>
									</h2>
									<div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading2">
										<div class="accordion-body pt-0">
											<p>	{{ $announcement->announcement }}</p>
										</div>
									</div>
								</div>
                            @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Body End-->
    @include('Navigation-Customer.footer')