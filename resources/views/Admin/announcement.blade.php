<?php
$page = 'announcement';
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
<!-- Body Start -->
<div class="wrapper wrapper-body">
		<div class="dashboard-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="d-main-title">
							<h3><i class="fa-solid fa-bullhorn me-3"></i>Announcement Management</h3>
						</div>
					</div>
					<div class="col-md-12">
						<div class="conversion-setup">
							<div class="main-card mt-5">
								<div class="dashboard-wrap-content p-4">
									<div class="d-md-flex flex-wrap align-items-center">
										
										<div class="rs ms-auto mt_r4">
											<button class="main-btn btn-hover h_40 w-100 create" data-bs-toggle="modal" data-bs-target="#inviteTeamModal">Add New Announcement</button>
										</div>
									</div>
								</div>
							</div>
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
															<th scope="col">Title</th>
															<th scope="col">Announcement</th>
															<th scope="col">Created At</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach($announcements as $key => $announcement)
														<tr>										
															<td>{{ ++$key }}</td>	
															<td>{{ $announcement->title }}</td>	
															<td>{{ $announcement->announcement }}</td>	
															<td>{{ $announcement->updated_at }}</td>	
															<td>
                                                                 <a href="removeAnnouncement/{{ $announcement->id }}"><span class="action-btn"><i class="fa-solid fa-trash-can"></i></span></a>
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
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="inviteTeamModalLabel">Create New Announcement</h5>
					<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
				</div>
                <form action="postAnnouncement" method="POST" enctype="multipart/form-data">
    @csrf
				<div class="modal-body">
                                
                                
					<div class="model-content main-form">
						<div class="form-group mt-30">
							<label class="form-label">Title</label>
							<input class="form-control h_40" type="text" name="title"  id="title" placeholder="Enter Announcement Title" required>
						</div>
                    
						
                        <div class="form-group mt-30">
							<label class="form-label">Announcement</label>
                            <textarea class="form-control h_40" name="announcement" id="announcement" maxlength="1000" style="height: 100px;" required></textarea>
						</div>

					</div>
                    </div>
			
				<div class="modal-footer">
					<button type="button" class="co-main-btn min-width btn-hover h_40" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" id="submibtn" class="main-btn min-width btn-hover h_40">Submit</button>
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


        $(".create").click(function(){

        $('#title').val('').prop('disabled',false);
        $('#announcement').val('').prop('disabled',false).trigger('change');
      
        $('#type').val('C');

        $('.modal-title').html('Create New Announcement');

        });

    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>