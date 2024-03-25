<?php
$page = 'refund';
?>
@include('Navigation-admin.app')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<style>
	.btn:hover {
  color: white !important;
}

#myTable_wrapper{
	padding: 20px !important;
}
</style>
<!-- Body Start -->
<div class="wrapper wrapper-body">
		<div class="dashboard-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="d-main-title">
							<h3><i class="fa-solid fa-undo me-3"></i>Refund Management</h3>
						</div>
					</div>
					<div class="col-md-12">
						<div class="conversion-setup">
						
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
							<div class="tab-content">
								<div class="tab-pane fade active show" id="overview-tab" role="tabpanel">
									<div class="table-card mt-4">
										<div class="main-table">
											<div class="table-responsive">
												<table class="table" id="myTable">
													<thead class="thead-dark">
														<tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Event</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Total Tickets</th>
                                                        <th scope="col">Total Amount</th>
                                                        <th scope="col">Request Date</th>
														<th scope="col">Status</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach($refunds as $key => $refund)
														<tr>										
															<td>{{ ++$key }}</td>	
                                                            <td>	{{  $refund->orders->events->event_name }}<br><b style="color:blue;">{{ $refund->orders->events->getgenre->genre }}</b><br>{{ \Carbon\Carbon::parse($refund->orders->events->event_date . ' ' . $refund->orders->events->event_time)->format('d M Y, h.i A') }}</td>
															<td>{{ $refund->customer->name }}</td>
      <td>{{ $refund->orders->quantity }}</td>
      <td>RM {{ $refund->refund_amount }}</td>
	  <td>{{ $refund->created_at }}</td>
      @if($refund->status == 'Pending')
      <td><span class="badge badge-warning" style="color:black; background:orange;">Pending</span></td>
      @elseif($refund->status == 'Rejected')
      <td><span class="badge badge-danger" style="color:white; background:red;">Rejected</span></td>
      @elseif($refund->status == 'Approved')
      <td><span class="badge badge-success" style="color:white; background:green;">Approved</span></td>
      @endif


															<td>
															@if($refund->status == 'Pending')
                                                               <a href="apvRefund/{{ $refund->id }}" style="color:white;" class="btn btn-success" onclick="return confirm('Are you sure you want to Approve this request?');" type="button">&#10003;</a>
															   <a href="rejRefund/{{ $refund->id }}" style="color:white;" class="btn btn-danger" onclick="return confirm('Are you sure you want to Reject this request?');" type="button">&#120;</a>
															   @else
															   -
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Body End -->	
	
    <script src="js/vertical-responsive-menu.min.js"></script>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>	
	<script src="js/custom.js"></script>
	<script src="js/night-mode.js"></script>

</body>
</html>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

