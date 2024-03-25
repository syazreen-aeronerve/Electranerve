<?php
$page = 'mypurchase';
?>
@include('Navigation-Customer.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<style>

:root {
  --bg: #e3e4e8;
  --fg: #17181c;
  --primary: #255ff4;
  --yellow: #f4a825;
  --yellow-t: rgba(244, 168, 37, 0);
  --bezier: cubic-bezier(0.42,0,0.58,1);
  --trans-dur: 0.3s;

}

.btn:hover{
	color:white !important;
}

.rating {
  margin: auto;
}
.rating__display {
  font-size: 1em;
  font-weight: 500;
  min-height: 1.25em;
  position: absolute;
  top: 100%;
  width: 100%;
  text-align: center;
}
.rating__stars {
  display: flex;
  padding-bottom: 0.375em;
  position: relative;
  font-size: calc(18px + (30 - 24) * (100vw - 320px) / (1280 - 320));
}
.rating__star {
  display: block;
  overflow: visible;
  pointer-events: none;
  width: 2em;
  height: 2em;
}
.rating__star-ring, .rating__star-fill, .rating__star-line, .rating__star-stroke {
  animation-duration: 1s;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
}
.rating__star-ring, .rating__star-fill, .rating__star-line {
  stroke: var(--yellow);
}
.rating__star-fill {
  fill: var(--yellow);
  transform: scale(0);
  transition: fill var(--trans-dur) var(--bezier), transform var(--trans-dur) var(--bezier);
}
.rating__star-line {
  stroke-dasharray: 12 13;
  stroke-dashoffset: -13;
}
.rating__star-stroke {
  stroke: #c7cad1;
  transition: stroke var(--trans-dur);
}
.rating__label {
  cursor: pointer;
  padding: 0.125em;
}
.rating__label--delay1 .rating__star-ring, .rating__label--delay1 .rating__star-fill, .rating__label--delay1 .rating__star-line, .rating__label--delay1 .rating__star-stroke {
  animation-delay: 0.05s;
}
.rating__label--delay2 .rating__star-ring, .rating__label--delay2 .rating__star-fill, .rating__label--delay2 .rating__star-line, .rating__label--delay2 .rating__star-stroke {
  animation-delay: 0.1s;
}
.rating__label--delay3 .rating__star-ring, .rating__label--delay3 .rating__star-fill, .rating__label--delay3 .rating__star-line, .rating__label--delay3 .rating__star-stroke {
  animation-delay: 0.15s;
}
.rating__label--delay4 .rating__star-ring, .rating__label--delay4 .rating__star-fill, .rating__label--delay4 .rating__star-line, .rating__label--delay4 .rating__star-stroke {
  animation-delay: 0.2s;
}
.rating__input {
  position: absolute;
  -webkit-appearance: none;
  appearance: none;
}
.rating__input:hover ~ [data-rating]:not([hidden]) {
  display: none;
}
.rating__input-1:hover ~ [data-rating="1"][hidden], .rating__input-2:hover ~ [data-rating="2"][hidden], .rating__input-3:hover ~ [data-rating="3"][hidden], .rating__input-4:hover ~ [data-rating="4"][hidden], .rating__input-5:hover ~ [data-rating="5"][hidden], .rating__input:checked:hover ~ [data-rating]:not([hidden]) {
  display: block;
}
.rating__input-1:hover ~ .rating__label:first-of-type .rating__star-stroke, .rating__input-2:hover ~ .rating__label:nth-of-type(-n + 2) .rating__star-stroke, .rating__input-3:hover ~ .rating__label:nth-of-type(-n + 3) .rating__star-stroke, .rating__input-4:hover ~ .rating__label:nth-of-type(-n + 4) .rating__star-stroke, .rating__input-5:hover ~ .rating__label:nth-of-type(-n + 5) .rating__star-stroke {
  stroke: var(--yellow);
  transform: scale(1);
}
.rating__input-1:checked ~ .rating__label:first-of-type .rating__star-ring, .rating__input-2:checked ~ .rating__label:nth-of-type(-n + 2) .rating__star-ring, .rating__input-3:checked ~ .rating__label:nth-of-type(-n + 3) .rating__star-ring, .rating__input-4:checked ~ .rating__label:nth-of-type(-n + 4) .rating__star-ring, .rating__input-5:checked ~ .rating__label:nth-of-type(-n + 5) .rating__star-ring {
  animation-name: starRing;
}
.rating__input-1:checked ~ .rating__label:first-of-type .rating__star-stroke, .rating__input-2:checked ~ .rating__label:nth-of-type(-n + 2) .rating__star-stroke, .rating__input-3:checked ~ .rating__label:nth-of-type(-n + 3) .rating__star-stroke, .rating__input-4:checked ~ .rating__label:nth-of-type(-n + 4) .rating__star-stroke, .rating__input-5:checked ~ .rating__label:nth-of-type(-n + 5) .rating__star-stroke {
  animation-name: starStroke;
}
.rating__input-1:checked ~ .rating__label:first-of-type .rating__star-line, .rating__input-2:checked ~ .rating__label:nth-of-type(-n + 2) .rating__star-line, .rating__input-3:checked ~ .rating__label:nth-of-type(-n + 3) .rating__star-line, .rating__input-4:checked ~ .rating__label:nth-of-type(-n + 4) .rating__star-line, .rating__input-5:checked ~ .rating__label:nth-of-type(-n + 5) .rating__star-line {
  animation-name: starLine;
}
.rating__input-1:checked ~ .rating__label:first-of-type .rating__star-fill, .rating__input-2:checked ~ .rating__label:nth-of-type(-n + 2) .rating__star-fill, .rating__input-3:checked ~ .rating__label:nth-of-type(-n + 3) .rating__star-fill, .rating__input-4:checked ~ .rating__label:nth-of-type(-n + 4) .rating__star-fill, .rating__input-5:checked ~ .rating__label:nth-of-type(-n + 5) .rating__star-fill {
  animation-name: starFill;
}
.rating__input-1:not(:checked):hover ~ .rating__label:first-of-type .rating__star-fill, .rating__input-2:not(:checked):hover ~ .rating__label:nth-of-type(2) .rating__star-fill, .rating__input-3:not(:checked):hover ~ .rating__label:nth-of-type(3) .rating__star-fill, .rating__input-4:not(:checked):hover ~ .rating__label:nth-of-type(4) .rating__star-fill, .rating__input-5:not(:checked):hover ~ .rating__label:nth-of-type(5) .rating__star-fill {
  fill: var(--yellow-t);
}
.rating__sr {
  clip: rect(1px, 1px, 1px, 1px);
  overflow: hidden;
  position: absolute;
  width: 1px;
  height: 1px;
}

@media (prefers-color-scheme: dark) {
  :root {
    --bg: #17181c;
    --fg: #e3e4e8;
  }

  .rating {
    margin: auto;
  }
  .rating__star-stroke {
    stroke: #454954;
  }
}
@keyframes starRing {
  from, 20% {
    animation-timing-function: ease-in;
    opacity: 1;
    r: 8px;
    stroke-width: 16px;
    transform: scale(0);
  }
  35% {
    animation-timing-function: ease-out;
    opacity: 0.5;
    r: 8px;
    stroke-width: 16px;
    transform: scale(1);
  }
  50%, to {
    opacity: 0;
    r: 16px;
    stroke-width: 0;
    transform: scale(1);
  }
}
@keyframes starFill {
  from, 40% {
    animation-timing-function: ease-out;
    transform: scale(0);
  }
  60% {
    animation-timing-function: ease-in-out;
    transform: scale(1.2);
  }
  80% {
    transform: scale(0.9);
  }
  to {
    transform: scale(1);
  }
}
@keyframes starStroke {
  from {
    transform: scale(1);
  }
  20%, to {
    transform: scale(0);
  }
}
@keyframes starLine {
  from, 40% {
    animation-timing-function: ease-out;
    stroke-dasharray: 1 23;
    stroke-dashoffset: 1;
  }
  60%, to {
    stroke-dasharray: 12 13;
    stroke-dashoffset: -13;
  }
}
</style>


<!-- Body Start-->
<div class="wrapper">
		<div class="breadcrumb-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-10">
						<div class="barren-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/home-customer">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Purchase</li>
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
					<div class="col-md-12">
				<h1 style="text-align: center;">My Purchase</h1>
        @if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

                            <table class="table table-striped" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Event</th>
      <th scope="col">Date & Time</th>
      <th scope="col">Venue</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $key => $order)
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>	<a href="viewEvent/{{ $order->event_id }}">{{  $order->events->event_name }}</a><br><b style="color:blue;">{{ $order->events->getgenre->genre }}</b></td>
      <td>{{ \Carbon\Carbon::parse($order->events->event_date . ' ' . $order->events->event_time)->format('d M Y, h.i A') }}</td>
      <td>{{ $order->events->venue->venue_name }}</td>
      <td>{{ $order->quantity }}</td>
      <td>RM {{  $order->total_price }}</td>

      @if($order->payment_status == 'Pending' && $order->refund != '2')
      <td><span class="badge badge-warning" style="color:black; background:orange;">Pending</span></td>
      @elseif($order->payment_status == 'Failed' && $order->refund != '2')
      <td><span class="badge badge-danger" style="color:white; background:red;">Failed</span></td>
      @elseif($order->payment_status == 'Success' && $order->refund != '2')
      <td><span class="badge badge-success" style="color:white; background:green;">Success</span></td>
	  @elseif($order->refund == '2')
      <td><span class="badge badge-danger" style="color:white; background:maroon;">Refunded</span></td>
      @endif

      <td>
      @if($order->payment_status == 'Success' && $order->refund == '0')
      <a href="printTicket/{{ $order->order_id }}" target="_blank" type="button" class="btn btn-sm btn-success">Print Ticket</a>
      <a href="#"  data-bs-toggle="modal" data-bs-target="#aboutModal" 
      data-id="{{ $order->order_id }}"
      data-event="{{  $order->events->event_name }}"
      data-amount="{{  $order->total_price }}"
      data-qty="{{ $order->quantity }}"
      type="button" class="btn btn-sm btn-danger refund">Request Refund</a>
      @endif

	  @if($order->payment_status == 'Success' && $order->refund == '0' && $order->feedback == 'N' && $order->events->event_date > NOW())
	  <a href="#"  data-bs-toggle="modal" data-bs-target="#ratingmodal" 
      data-id="{{ $order->order_id }}"
      type="button" class="btn btn-sm btn-warning feedback">Feedback</a>
	  @endif

      

    </td>
    </tr>
    @endforeach
  </tbody>
</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- Body End-->



    <!-- About Details Model Start-->
	<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="aboutModalLabel">Request Refund</h5>
					<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
				</div>
                <form action="requestRefund" method="POST"  enctype="multipart/form-data">
                   @csrf
                   <input type="text" name="id" id="id" hidden>
				<div class="modal-body">
					<div class="model-content main-form">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Event*</label>
									<input class="form-control h_40" type="text" placeholder="" name="event"  id="event"  disabled>																								
								</div>
							</div>
              <div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Total Ticket*</label>
									<input class="form-control h_40" type="text" name="qty" id="qty" placeholder=""  readonly>																								
								</div>
							</div>
              <div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Total Amount*</label>
									<input class="form-control h_40" type="text" name="refund_amount" id="refund_amount" placeholder="" readonly>																								
								</div>
							</div>
               <div class="col-lg-12 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Evidence*</label>
									<input class="form-control h_40" type="file" placeholder="" name="evidence" id="evidence" accept="image/png, image/gif, image/jpeg" required>																								
								</div>
							</div>

                            <div class="col-lg-12 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Reason*</label>
									<textarea class="form-textarea" name="reason" id="reason" maxlength="1000" required></textarea>																							
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="co-main-btn min-width btn-hover h_40" data-bs-target="#aboutModal" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="main-btn min-width btn-hover h_40"  onclick="return confirm('Are you sure you want to submit this refund request?');">Submit</button>
				</div>
</form>
			</div>
		</div>
	</div>
	<!-- About Details Model End-->


	  <!-- About Details Model Start-->
	  <div class="modal fade" id="ratingmodal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="aboutModalLabel">Feedback Form</h5>
					<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
				</div>
                <form action="Postfeedback" method="POST"  enctype="multipart/form-data">
                   @csrf
                   <input type="text" name="order_id" id="order_id" hidden>
				<div class="modal-body">
					<div class="model-content main-form">
						<div class="row">
							<div class="col-lg-12 col-md-12">
							<div class="form-group mt-4">
							<label class="form-label">Give Starts*</label>
							<form class="rating">
	<div class="rating__stars">
		<input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
		<input id="rating-2" class="rating__input rating__input-2" type="radio" name="rating" value="2">
		<input id="rating-3" class="rating__input rating__input-3" type="radio" name="rating" value="3" checked>
		<input id="rating-4" class="rating__input rating__input-4" type="radio" name="rating" value="4">
		<input id="rating-5" class="rating__input rating__input-5" type="radio" name="rating" value="5">
		<label class="rating__label" for="rating-1">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">1 star—Terrible</span>
		</label>
		<label class="rating__label" for="rating-2">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">2 stars—Bad</span>
		</label>
		<label class="rating__label" for="rating-3">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">3 stars—OK</span>
		</label>
		<label class="rating__label" for="rating-4">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">4 stars—Good</span>
		</label>
		<label class="rating__label" for="rating-5">
			<svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
				<g transform="translate(16,16)">
					<circle class="rating__star-ring" fill="none" stroke="#000" stroke-width="16" r="8" transform="scale(0)" />
				</g>
				<g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<g transform="translate(16,16) rotate(180)">
						<polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
						<polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
					</g>
					<g transform="translate(16,16)" stroke-dasharray="12 12" stroke-dashoffset="12">
						<polyline class="rating__star-line" transform="rotate(0)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(72)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(144)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(216)" points="0 4,0 16" />
						<polyline class="rating__star-line" transform="rotate(288)" points="0 4,0 16" />
					</g>
				</g>
			</svg>
			<span class="rating__sr">5 stars—Excellent</span>
		</label>
		<p class="rating__display" data-rating="1" hidden>Terrible</p>
		<p class="rating__display" data-rating="2" hidden>Bad</p>
		<p class="rating__display" data-rating="3" hidden>OK</p>
		<p class="rating__display" data-rating="4" hidden>Good</p>
		<p class="rating__display" data-rating="5" hidden>Excellent</p>
	</div>
</form>
							</div>
            

                            <div class="col-lg-12 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Your Feedback*</label>
									<textarea class="form-textarea" name="feedback" id="feedback" maxlength="1000" required></textarea>																							
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="co-main-btn min-width btn-hover h_40" data-bs-target="#feedbackmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="main-btn min-width btn-hover h_40"  onclick="return confirm('Are you sure you want to submit this feedback?');">Submit</button>
				</div>
</form>
			</div>
		</div>
	</div>
	<!-- About Details Model End-->
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>	
	<script src="js/custom.js"></script>
	<script src="js/night-mode.js"></script>

<script>
  $(document).ready(function(){

    $('.refund').on('click',function(){
      var id = $(this).data('id');
      var event = $(this).data('event');
      var amount = $(this).data('amount');
      var qty = $(this).data('qty');

      $('#id').val(id);
      $('#event').val(event);
      $('#qty').val(qty);
      $('#refund_amount').val(amount);

    });

	$('.feedback').on('click',function(){
      var id = $(this).data('id');

      $('#order_id').val(id);

    });

	

  });
</script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
	$(document).ready( function () {
    $('#myTable').DataTable();

	window.addEventListener("DOMContentLoaded",() => {
	const starRating = new StarRating("form");
});

class StarRating {
	constructor(qs) {
		this.ratings = [
			{id: 1, name: "Terrible"},
			{id: 2, name: "Bad"},
			{id: 3, name: "OK"},
			{id: 4, name: "Good"},
			{id: 5, name: "Excellent"}
		];
		this.rating = null;
		this.el = document.querySelector(qs);

		this.init();
	}
	init() {
		this.el?.addEventListener("change",this.updateRating.bind(this));

		// stop Firefox from preserving form data between refreshes
		try {
			this.el?.reset();
		} catch (err) {
			console.error("Element isn’t a form.");
		}
	}
	updateRating(e) {
		// clear animation delays
		Array.from(this.el.querySelectorAll(`[for*="rating"]`)).forEach(el => {
			el.className = "rating__label";
		});

		const ratingObject = this.ratings.find(r => r.id === +e.target.value);
		const prevRatingID = this.rating?.id || 0;

		let delay = 0;
		this.rating = ratingObject;
		this.ratings.forEach(rating => {
			const { id } = rating;

			// add the delays
			const ratingLabel = this.el.querySelector(`[for="rating-${id}"]`);

			if (id > prevRatingID + 1 && id <= this.rating.id) {
				++delay;
				ratingLabel.classList.add(`rating__label--delay${delay}`);
			}

			// hide ratings to not read, show the one to read
			const ratingTextEl = this.el.querySelector(`[data-rating="${id}"]`);

			if (this.rating.id !== id)
				ratingTextEl.setAttribute("hidden",true);
			else
				ratingTextEl.removeAttribute("hidden");
		});
	}
}
} );
</script>