<?php
$page = 'review';
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
<style>
.star {
    display: inline-block;
    width: 20px; /* Adjust the size of the stars as needed */
    height: 20px;
    background-color: grey; /* Default color for empty stars */
    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
    margin-right: 2px; /* Adjust the spacing between stars */
}

.star.filled {
    background-color: orange; /* Color for filled stars */
}
</style>
<!-- Body Start -->
<div class="wrapper wrapper-body">
		<div class="dashboard-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="d-main-title">
							<h3><i class="fa-regular fa-star me-3"></i>Review Management</h3>
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
												<table class="table" id="myTable" style="width:100%;">
													<thead class="thead-dark">
														<tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Event</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col" style="width:20%;">Rating</th>
                                                        <th scope="col">Feedback</th>
                                                        <th scope="col">Date</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach($reviews as $key => $review)
														<tr>										
															<td>{{ ++$key }}</td>	
                                                            <td>{{  $review->orders->events->event_name }}</td>
                                                            <td>{{  $review->customer->name }}</td>
                                                            <td>
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $review->star)
            <span class="star filled"></span>
        @else
            <span class="star"></span>
        @endif
    @endfor
</td>
<td><p>{{  $review->feedback }}</p></td>
<td>{{  $review->created_at }}</td>
                                                          
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

