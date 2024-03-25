<?php
$page = 'home';
?>
@include('Navigation-Customer.app')
	<!-- Body Start-->
	<div class="wrapper">
		<div class="hero-banner">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-7 col-lg-9 col-md-10">
						<div class="hero-banner-content">
						<h2>Book Your Favorite Music Festivals at Your Fingertips!</h2>
<p>Explore more events near your location and effortlessly book them with just a few simple steps and secure online payment.</p>
							<a href="/events" class="main-btn btn-hover">Explore More Event <i class="fa-solid fa-arrow-right ms-3"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="explore-events p-80">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="main-title">
							<h3>Explore Events</h3>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="event-filter-items">
							<div class="featured-controls">
						
								<div class="controls">
									<button type="button" class="control" data-filter="all">All</button>
									@foreach($genres as $genre)
									<button type="button" class="control" data-filter=".{{ str_replace('&', '_', $genre->genre) }}">{{ $genre->genre }}</button>
									@endforeach
								</div>
								<div class="row" data-ref="event-filter-content">

								@foreach($events as $event)

@php
$now = now(); // Current date and time

if ($now < "{$event->event_earlybird_discount_end_date} {$event->event_earlybird_discount_end_time}") {
// Early bird discount is applicable
$discountedPrice = $event->event_ticket_price - ($event->event_ticket_price * $event->event_earlybird_discount / 100);
$formattedDiscountedPrice = number_format($discountedPrice, 2);
} else {
// Early bird discount has expired, use regular price
$formattedDiscountedPrice = number_format($event->event_ticket_price, 2);
}
@endphp

<div class="col-xl-4 col-lg-5 col-md-7 col-sm-12 mix  {{ str_replace('&', '_', $event->getgenre->genre) }}" data-ref="mixitup-target">
										<div class="main-card mt-4">
											<div class="event-thumbnail">
												<a href="viewEvent/{{ $event->event_id }}" class="thumbnail-img">
												<img src="EventImage/{{ $event->event_image }}" alt="">
												</a>
											
											</div>
											<div class="event-content">
												<a href="viewEvent/{{ $event->event_id }}" class="event-title">{{ $event->event_name }} <br><b style="color:blue;">{{ $event->getgenre->genre }}</b></a>
												<div class="duration-price-remaining">
											    @if($now < "{$event->event_earlybird_discount_end_date} {$event->event_earlybird_discount_end_time}")
    <del style="color:red;">RM {{ number_format($event->event_ticket_price, 2) }}</del>
    RM {{ $formattedDiscountedPrice }}
    @else
    RM {{ number_format($event->event_ticket_price, 2) }}
    @endif
													<span class="remaining"><i class="fa-solid fa-ticket fa-rotate-90"></i>{{ $event->event_total_ticket }} Remaining</span>
												</div>
											</div>
											<div class="event-footer">
												<div class="event-timing">
													<div class="publish-date">
														<span><i class="fa-solid fa-calendar-day me-2"></i>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</span>
														<span class="dot"><i class="fa-solid fa-circle"></i></span>
														@php
    $diff = $event->created_at->diff(now());
    $formattedDiff = $diff->h > 23 ? $diff->d . 'd' : $diff->h . 'h';
@endphp
<span>{{ \Carbon\Carbon::parse($event->event_date . ' ' . $event->event_time)->format('D, h.i A') }}
</span>
													</div>
												
												</div>
											</div>
										</div>
									</div>



							
									@endforeach


									
								</div>
								<div class="browse-btn">
									<a href="/events" class="main-btn btn-hover ">Browse All</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="feature-block p-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="main-title">
                    <h3>Discover Your Perfect Music Festival Experience</h3>
                    <p>Explore a curated selection of music festivals with our user-friendly event registration and ticketing system. ElectraNerve offers an affordable and easy-to-use platform, designed to enhance your festival journey.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature-group-list">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="feature-item mt-46">
                                <div class="feature-icon">
                                    <img src="images/icons/feature-icon-1.png" alt="">
                                </div>
                                <h4>Diverse Music Lineup</h4>
                                <p>Explore festivals featuring a diverse range of music genres and artists.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="feature-item mt-46">
                                <div class="feature-icon">
                                    <img src="images/icons/feature-icon-2.png" alt="">
                                </div>
                                <h4>Venue Variety</h4>
                                <p>Discover festivals in unique venues, from urban settings to picturesque landscapes.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="feature-item mt-46">
                                <div class="feature-icon">
                                    <img src="images/icons/feature-icon-3.png" alt="">
                                </div>
                                <h4>Interactive Festival Pages</h4>
                                <p>Create engaging festival pages with immersive content and lineup details.</p>
                            </div>
                        </div>
                        <!-- Add more customized feature items as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		
		<div class="testimonial-block p-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-10">
						<div class="main-title">
						<h3>Hear What Our Customer Are Saying</h3>
<p>You may provide us your feedback once purchased the tickets :)</p>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="testimonial-slider-area">
							<div class="owl-carousel testimonial-slider owl-theme">
								@foreach($feedbacks as $feedback)
								<div class="item">
									<div class="main-card">
										<div class="testimonial-content">
										<div class="testimonial-text" style="max-height: 200px; overflow-y: auto;  text-align: justify;
  text-justify: inter-word;">
    <p>{{ $feedback->feedback }}</p>
</div>

											<div class="testimonial-user-dt">
												<h5>{{ $feedback->customer->name }}</h5>
												<span>{{ $feedback->orders->events->event_name }}</span>
												<ul>
												@for ($i = 1; $i <= $feedback->star; $i++)

													<li><i class="fa-solid fa-star"></i></li>
													@endfor
												</ul>
											</div>
											<span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
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

	<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-newsletter">
	<div class="modal-content">
		<form action="/subsnewsletter" method="post">
			@csrf
			<div class="modal-header">
			<img src="{{ asset('images/electranerve.png') }}" style="width:40px; height:40px;"> 
				<h4>Join Our Newsletter</h4>	
				<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
			</div>
			<div class="modal-body text-center">				
				<p>Subscribe our newsletter to receive the latest music festivals. No spam.</p>
				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-block" value="Subscribe">
				</div>
				<div class="footer-link"><a href="#" data-bs-dismiss="modal">Remind Me Later</a></div>
			</div>
		</form>			
	</div>
	</div>
	</div>

@include('Navigation-Customer.footer')

@if(auth()->user()->newsletter == 'N')
	<script>
$(document).ready(function(){
	$("#myModal").modal('show');
});
</script>
@endif