<?php
$page = 'orders';
?>
@include('Navigation-admin.app')
<!-- Body Start -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<style>
	.btn:hover {
  color: white !important;
}

#myTable_wrapper{
	padding: 20px !important;
}
</style>
<div class="wrapper wrapper-body">
		<div class="dashboard-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="d-main-title">
							<h3><i class="fa-solid fa-ticket me-3"></i>Orders Management</h3>
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
                                               
                                                        <th scope="col">Event</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Total Tickets</th>
                                                        <th scope="col">Total Amount</th>
                                                        <th scope="col">Order Date</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach($orders as $key => $order)
														<tr>										
										
                                                            <td>{{  $order->events->event_name }}<br>
                                                            <b style="color:blue;">{{ $order->events->getgenre->genre }}</b><br>
                                                            {{ \Carbon\Carbon::parse($order->events->event_date . ' ' . $order->events->event_time)->format('d M Y, h.i A') }}<br>
                                                            {{  $order->events->venue->venue_name }}
                                                        </td>
															<td>{{ $order->customer->name }}</td>	
                                                            <td>{{ $order->quantity }}</td>
      <td>RM {{  $order->total_price }}</td>
      <td>{{ $order->created_at }}</td>
															<td>
                                                                <a class="view"
                                                                data-event="{{ $order->events->event_name }}" 
                                                                data-id="{{ $order->order_id }}" data-bs-toggle="modal" data-bs-target="#inviteTeamModal"><span class="action-btn"><i class="fa-solid fa-eye"></i></span></a>
                                                        </td>	
														</tr>
                                                        @endforeach
														
													</tbody>									
												</table>
											</div>
										</div>
									</div>
								</div>
							<!-- Venue Model Start-->
	<div class="modal fade" id="inviteTeamModal" tabindex="-1" aria-labelledby="inviteTeamModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="inviteTeamModalLabel">Create New Venue</h5>
					<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
				</div>
                <form action="#" method="POST" enctype="multipart/form-data">
    @csrf
				<div class="modal-body">
                                          
					<div class="model-content main-form">
                    <div class="row">
                    <div class="col-lg-8 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Event*</label>
												<input class="form-control h_50" type="text" name="event_name" id="event_name" disabled>																								
											</div>
										</div>
                    </div>
                    <div class="row">
             
										<div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">First Name*</label>
												<input class="form-control h_50" type="text" name="first_name" id="first_name" disabled>																								
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Last Name*</label>
												<input class="form-control h_50" type="text" name="last_name" id="last_name" disabled>																								
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Email*</label>
												<input class="form-control h_50" type="email" name="email" id="email" disabled>																								
											</div>
										</div>
                                        <div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Phone Number*</label>
												<input class="form-control h_50" type="number" name="phone" id="phone" disabled>																								
											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Address*</label>
                                                <textarea class="form-control h_50" name="address" id="address" maxlength="255" style="height:100px;" disabled></textarea>																							
											</div>
										</div>
                                        <div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Total Ticket*</label>
												<input class="form-control h_50" type="text" name="quantity" id="quantity" disabled>																								
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Total Amount*</label>
												<input class="form-control h_50" type="text" name="total_price" id="total_price" disabled>																								
											</div>
										</div>
                                        <div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Transaction ID*</label>
												<input class="form-control h_50" type="text" name="transaction_id" id="transaction_id" disabled>																								
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Billcode*</label>
												<input class="form-control h_50" type="text" name="billcode" id="billcode" disabled>																								
											</div>
										</div>
										
									</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="co-main-btn min-width btn-hover h_40" data-bs-dismiss="modal">Cancel</button>
				</div>
                </form>
			</div>
		</div>
	</div>
	<!-- Venue Model End-->
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


<script>

  $(".view").click(function(){
    var id = $(this).data('id');
    var event = $(this).data('event');

    $.ajax({
        url: '/fetchOrder',
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            // Populate input fields with the retrieved data
            $('#event_name').val(event);
            $('#first_name').val(data.first_name).prop('disabled',true);
            $('#last_name').val(data.last_name).prop('disabled',true);
            $('#email').val(data.email).prop('disabled',true);
            $('#phone').val(data.phone).prop('disabled',true);
            $('#address').val(data.address).prop('disabled',true);
            $('#quantity').val(data.quantity).prop('disabled',true);
            $('#total_price').val(data.total_price).prop('disabled',true);
            $('#transaction_id').val(data.transaction_id).prop('disabled',true);
            $('#billcode').val(data.billcode).prop('disabled',true);
           
            $('.modal-title').html('View Order Details');

        },
        error: function() {
            alert('Error fetching Order details.');
        }
    });
	
  });
    </script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>