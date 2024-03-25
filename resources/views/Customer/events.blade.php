<?php
$page = 'events';
?>
@include('Navigation-Customer.app')
<!-- Body Start-->
<div class="wrapper">
		<div class="hero-banner">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-10 col-lg-8 col-md-10">
						<div class="hero-banner-content">
							<h2>Discover Events For All The Things You Love</h2>
							<div class="search-form main-form">
								<form action="/events" method="POST">
									@csrf
							
								<div class="row g-3">
									<div class="col-lg-3 col-md-12">
										<div class="form-group search-category">
											<select class="selectpicker" name="pricerange" data-width="100%" data-size="5" required>
												<option value="" selected disabled>-- Select Price Range --</option>
												<option value="0-100" <?php if($pricerange == '0-100') { echo 'selected'; } ?>>RM 0.00 - RM 100.00</option>
												<option value="100-300"  <?php if($pricerange == '100-300') { echo 'selected'; } ?>>RM 100.00 - RM 300.00</option>
												<option value="300-500"  <?php if($pricerange == '300-500') { echo 'selected'; } ?>>RM 300.00 - RM 500.00</option>
												<option value="500-800"  <?php if($pricerange == '500-800') { echo 'selected'; } ?>>RM 500.00 - RM 800.00</option>
												<option value="800-1000"  <?php if($pricerange == '800-1000') { echo 'selected'; } ?>>RM 800.00 - RM 1000.00</option>
												<option value="1000-1500"  <?php if($pricerange == '1000-1500') { echo 'selected'; } ?>>RM 1000.00 - RM 1500.00</option>
												<option value="1500-2000"  <?php if($pricerange == '1500-2000') { echo 'selected'; } ?>>RM 1500.00 - RM 2000.00</option>
												<option value="2000-9999"  <?php if($pricerange == '2000-9999') { echo 'selected'; } ?>>RM 2000.00 - RM 9999.00</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-md-12">
										<div class="form-group">
											<select class="selectpicker" name="location" data-width="100%" data-size="5" data-live-search="true" required>
											<option value="" selected disabled>-- Select Venue --</option>
												@foreach($venues as $venue)
												<option value="{{ $venue->id }}" <?php if($location == $venue->id) { echo 'selected'; } ?>>{{ $venue->venue_name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-4 col-md-12">
										<div class="form-group">
											<select class="selectpicker" name="organiser" data-width="100%" data-size="5" data-live-search="true" required>
											<option value="" selected disabled>-- Select Organiser --</option>
												@foreach($organisers as $org)
												<option value="{{ $org->id }}" <?php if($organiser == $org->id) { echo 'selected'; } ?>>{{ $org->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-1 col-md-12">
										<button type="submit" class="main-btn btn-hover">	<i class="fa-solid fa-magnifying-glass"></i></button>
									</div>
									<div class="col-lg-1 col-md-12">
										<a href="/events" class="main-btn btn-hover" style="background:red; color:white; font-weight:600;"><i class="fa-solid fa-x"></i></a>
									</div>
								</div>
								</form>
								
							</div>

							<div class="col-lg-12 col-md-12" style="margin-top: 50px;">
										<div class="form-group">
										<input type="text" class="form-control" name="search" id="search" placeholder="Search Events here.." style="text-align: center; height:50px;"/>
										</div>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="explore-events p-80">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="event-filter-items">
							<div class="featured-controls">
						
								<div class="controls">
									<button type="button" class="control" data-filter="all">All</button>
									@foreach($genres as $genre)
									<button type="button" class="control" data-filter=".{{ str_replace('&', '_', $genre->genre) }}">{{ $genre->genre }}</button>
									@endforeach
								</div>
								<div class="row event-filter-content" data-ref="event-filter-content">
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
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Body End-->
	@include('Navigation-Customer.footer')

	<script>
    $(document).ready(function(){
    $("#search").keyup(function(){
 
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 
        // Loop through the comment list
        $(".event-filter-content").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });

    });
});
  </script>