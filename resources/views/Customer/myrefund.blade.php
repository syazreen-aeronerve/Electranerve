<?php
$page = 'refund';
?>
@include('Navigation-Customer.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
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
									<li class="breadcrumb-item active" aria-current="page">My Refund</li>
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
				<h1 style="text-align: center;">My Refund Request</h1>
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
      <th scope="col">Total Ticket</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Refund Status</th>
      <th scope="col">Last Update</th>
    </tr>
  </thead>
  <tbody>
    @foreach($refunds as $key => $refund)
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td>	{{  $refund->orders->events->event_name }}<br><b style="color:blue;">{{ $refund->orders->events->getgenre->genre }}</b><br>{{ \Carbon\Carbon::parse($refund->orders->events->event_date . ' ' . $refund->orders->events->event_time)->format('d M Y, h.i A') }}</td>
      <td>{{ $refund->orders->quantity }}</td>
      <td>RM {{ $refund->refund_amount }}</td>
      @if($refund->status == 'Pending')
      <td><span class="badge badge-warning" style="color:black; background:orange;">Pending</span></td>
      @elseif($refund->status == 'Rejected')
      <td><span class="badge badge-danger" style="color:white; background:red;">Rejected</span></td>
      @elseif($refund->status == 'Approved')
      <td><span class="badge badge-success" style="color:white; background:green;">Approved</span></td>
      @endif
      <td>{{ $refund->updated_at }}</td>
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


@include('Navigation-Customer.footer')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
