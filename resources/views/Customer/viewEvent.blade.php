<?php
$page = 'events';
?>
@include('Navigation-Customer.app')

<?php
$lat = $event->venue->venue_latitude;
$lng = $event->venue->venue_longitude;

$point = "https://www.google.com/maps/search/?api=1&query=$lat,$lng&travelmode=driving";

?>
<!-- Body Start-->
<div class="wrapper">
		<div class="breadcrumb-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-10">
						<div class="barren-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/customer-home">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Venue Event Detail View</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="event-dt-block p-80">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="event-top-dts">
							<div class="event-top-date">
							<span class="event-month">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</span>
<span class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>


							</div>
							<div class="event-top-dt">
								<h3 class="event-main-title">{{ $event->event_name }}

                                @php
    $diff = $event->created_at->diff(now());
    $formattedDiff = $diff->h > 23 ? $diff->d . 'd' : $diff->h . 'h';
@endphp
</h3>
								<div class="event-top-info-status">
									<span class="event-type-name"><i class="fa-solid fa-location-dot"></i>{{ $event->venue->venue_name }}</span>
									<span class="event-type-name details-hr">Starts on <span class="ev-event-date">{{ \Carbon\Carbon::parse($event->event_date . ' ' . $event->event_time)->format('D, M j, Y g:i A') }}</span></span>
									<span class="event-type-name details-hr">{{$event->event_duration_hours}} Hours</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-7 col-md-12">
						<div class="main-event-dt">
							<div class="event-img">
                            <img src="{{ asset("EventImage/$event->event_image") }}" alt="">	
							</div>
				
							<div class="main-event-content">
								<h4>About This Event</h4>
								<p>{{ $event->event_description }}</p>
								
							</div>							
						</div>
					</div>
					<div class="col-xl-4 col-lg-5 col-md-12">
						<div class="main-card event-right-dt">
							<div class="bp-title">
								<h4>Event Details</h4>
							</div>
							<div class="time-left">
								<div class="countdown">
									<div class="countdown-item">
										<span id="day"></span>days
									</div>  
									<div class="countdown-item">							
										<span id="hour"></span>Hours
									</div>
									<div class="countdown-item">
										<span id="minute"></span>Minutes
									</div> 
									<div class="countdown-item">
										<span id="second"></span>Seconds
									</div>														
								</div>
							</div>
							<div class="event-dt-right-group mt-5">
								<div class="event-dt-right-icon">
									<i class="fa-solid fa-circle-user"></i>
								</div>
								<div class="event-dt-right-content">
									<h4>Organised by</h4>
									<h5>{{ $event->organiser->name }}</h5>
							
								</div>
							</div>
							<div class="event-dt-right-group">
								<div class="event-dt-right-icon">
									<i class="fa-solid fa-calendar-day"></i>
								</div>
								<div class="event-dt-right-content">
									<h4>Date and Time</h4>
									<h5>{{ \Carbon\Carbon::parse($event->event_date . ' ' . $event->event_time)->format('D, M j, Y g:i A') }}
</h5>
								
								</div>
							</div>
							<div class="event-dt-right-group">
								<div class="event-dt-right-icon">
									<i class="fa-solid fa-location-dot"></i>
								</div>
								<div class="event-dt-right-content">
									<h4>Location</h4>
									<h5 class="mb-0">{{ $event->venue->venue_address }}</h5>
									<a href="" onclick="window.open('<?php echo $point; ?>', '_blank')" target="_blank"><i class="fa-solid fa-location-dot me-2"></i>View Map</a>
								</div>
							</div>
							<div class="select-tickets-block">
                                <form action="../checkout" method="POST">
                                    @csrf
								<h6>Select Tickets</h6>
								<div class="select-ticket-action">

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

								<div class="ticket-price">
    @if($now < "{$event->event_earlybird_discount_end_date} {$event->event_earlybird_discount_end_time}")
    <del style="color:red;">RM {{ number_format($event->event_ticket_price, 2) }}</del>
    RM {{ $formattedDiscountedPrice }}
    @else
    RM {{ number_format($event->event_ticket_price, 2) }}
    @endif
</div>


									<div class="quantity">
										<div class="counter">
											<span class="down" onClick='decreaseCount(event, this)'>-</span>
                                            <input type="text" id="quantity" name="quantity" value="0" min="1" max="{{ $event->event_total_ticket }}" inputmode="numeric" readonly required>
											<span class="up" onClick='increaseCount(event, this)'>+</span>
										</div>
									</div>
								</div>

                                <input type="text" name="amt" id="amt" value="{{ $formattedDiscountedPrice }}" hidden>
                                <input type="text" name="totalprice" id="totalprice" value="0.00" hidden>
                                <input type="text" name="id" id="id" value="{{ $event->event_id }}" hidden>
                                <input type="number" step=".01" name="event_total_ticket" id="event_total_ticket" value="{{ $event->event_total_ticket }}" hidden>

                            
								
								<div class="xtotel-tickets-count">
									<div class="x-title">Grand Total</div>
									<h4>RM <span class="totalamount">0.00</span></h4>
								</div>
							</div>
							<div class="booking-btn">
								<button type="submit" class="main-btn btn-hover w-100">Book Now</button>
							</div>
                            </form>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="more-events">
							<div class="main-title position-relative">
								<h3>More Events</h3>
								<a href="/events" class="view-all-link">Browse All<i class="fa-solid fa-right-long ms-2"></i></a>
							</div>
							<div class="owl-carousel moreEvents-slider owl-theme">

@foreach($relatedevents as $related)
@php
$now = now(); // Current date and time

if ($now < "{$related->event_earlybird_discount_end_date} {$related->event_earlybird_discount_end_time}") {
// Early bird discount is applicable
$discountedPrice = $related->event_ticket_price - ($related->event_ticket_price * $related->event_earlybird_discount / 100);
$formattedDiscountedPrice = number_format($discountedPrice, 2);
} else {
// Early bird discount has expired, use regular price
$formattedDiscountedPrice = number_format($related->event_ticket_price, 2);
}
@endphp
								<div class="item">
									<div class="main-card mt-4">
										<div class="event-thumbnail">
											<a href="../viewEvent/{{ $related->event_id }}" class="thumbnail-img">
												<img src="../EventImage/{{ $related->event_image }}" alt="">
											</a>
										
										</div>
										<div class="event-content">
											<a href="../viewEvent/{{ $related->event_id }}" class="event-title">A New Way Of Life</a>
											<div class="duration-price-remaining">
												<span class="duration-price">			   
	@if($now < "{$event->event_earlybird_discount_end_date} {$event->event_earlybird_discount_end_time}")
    <del style="color:red;">RM {{ number_format($related->event_ticket_price, 2) }}</del>
    RM {{ $formattedDiscountedPrice }}
    @else
    RM {{ number_format($related->event_ticket_price, 2) }}
    @endif</span>
	<span class="remaining"><i class="fa-solid fa-ticket fa-rotate-90"></i>{{ $related->event_total_ticket }} Remaining</span>
											</div>
										</div>
										<div class="event-footer">
												<div class="event-timing">
													<div class="publish-date">
														<span><i class="fa-solid fa-calendar-day me-2"></i>{{ \Carbon\Carbon::parse($related->event_date)->format('d M Y') }}</span>
														<span class="dot"><i class="fa-solid fa-circle"></i></span>
														@php
    $diff = $related->created_at->diff(now());
    $formattedDiff = $diff->h > 23 ? $diff->d . 'd' : $diff->h . 'h';
@endphp
<span>{{ \Carbon\Carbon::parse($related->event_date . ' ' . $related->event_time)->format('D, h.i A') }}
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
	<!-- Body End-->
	@include('Navigation-Customer.footer')

  
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var containerEl = document.querySelector('[data-ref="event-filter-content"]');
        var mixer = mixitup(containerEl, {
            selectors: {
                target: '[data-ref="mixitup-target"]'
            }
        });
    });

// === Timer === //
(function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  // Replace this with your actual database values
  let eventDate = "{{ $event->event_date }}"; // format: YYYY-MM-DD
  let eventTime = "{{ $event->event_time }}"; // format: HH:mm:ss

  let eventDateTime = new Date(`${eventDate} ${eventTime}`);
  
  const countDown = eventDateTime.getTime(),
      x = setInterval(function() {    

        const now = new Date().getTime(),
              distance = countDown - now;

        document.getElementById("day").innerText = Math.floor(distance / (day)),
          document.getElementById("hour").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minute").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("second").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "Booking Ends!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
}());


</script>
  