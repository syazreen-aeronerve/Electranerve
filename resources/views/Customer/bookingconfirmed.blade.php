<?php
$page = 'events';
?>
@include('Navigation-Customer.app')
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
									<li class="breadcrumb-item active" aria-current="page">Booking Confirmed</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="event-dt-block p-80">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-5 col-lg-7 col-md-10">
						<div class="booking-confirmed-content">
							<div class="main-card">
								<div class="booking-confirmed-top text-center p_30">
									<div class="booking-confirmed-img mt-4">
										<img src="../images/confirmed.png" alt="">
									</div>
									<h4>Booking Confirmed</h4>
									<p class="ps-lg-4 pe-lg-4">We are pleased to inform you that your reservation request has been received and confirmed.</p>
								</div>
								<div class="booking-confirmed-bottom">
									<div class="booking-confirmed-bottom-bg p_30">
										<div class="event-order-dt">
											<div class="event-thumbnail-img">
												<img src="../EventImage/{{$order->events->event_image}}" alt="">
											</div>
											<div class="event-order-dt-content">
												<h5>{{$order->events->event_name}}</h5>
												<span>{{ \Carbon\Carbon::parse($order->events->event_date . ' ' . $order->events->event_time)->format('d M Y, h.i A') }}. Duration {{ $order->events->event_duration_hours }}h</span>
												<div class="buyer-name">{{ $order->first_name }} {{ $order->last_name }}</div>
												<div class="booking-total-tickets">
													<i class="fa-solid fa-ticket rotate-icon"></i>
													<span class="booking-count-tickets mx-2">{{ $order->quantity }}</span>x Ticket
												</div>
												<div class="booking-total-grand">
													Total : <span>RM {{ $order->total_price }}</span>
												</div>
											</div>
										</div>
										<a href="/mypurchase" class="main-btn btn-hover h_50 w-100 mt-5"><i class="fa-solid fa-ticket rotate-icon me-3"></i>View Purchase</a>
									</div>
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

