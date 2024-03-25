<?php
$page = 'salesreport';
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
							<h3><i class="fa-solid fa-map-marker me-3"></i>Sales Report</h3>
						</div>
					</div>
					<div class="col-md-12">
						<div class="conversion-setup">
							<div class="main-card mt-5">
								<div class="dashboard-wrap-content p-4">
									<div>
										
                                    <h2>Sales Report to the date - {{ now()->format('d/m/Y') }} <a href="/printSP" target="_blank" class="btn btn-success" style="float:right; margin:0 auto;">Export PDF</a></h2>

									</div>
								</div>
							</div>
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
                                                        <th scope="col">Total Ticket Sold</th>
                                                        <th scope="col">Total Amount</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach($orders as $key => $order)

        
														<tr>										
															<td>{{ ++$key }}</td>	
                                                            <td>{{  $order->name }}</td>
															
                                                         

      <td>{{ $order->totalsold }}</td>
      <td>RM {{ number_format($order->totalamount, 2) }}</td>
    	
														</tr>
                                                        @endforeach
                                                        <tfoot>
            <tr>
                <th colspan="3" style="text-align: right;">Total Sales:</th>
                <th style="font-size: 30px;">RM {{ number_format($grandtotal, 2) }}</th>
            </tr>
        </tfoot>
														
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
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ]
    });
} );
</script>