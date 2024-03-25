<?php
$page = 'venue';
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
							<h3><i class="fa-solid fa-map-marker me-3"></i>Venue Management</h3>
						</div>
					</div>
					<div class="col-md-12">
						<div class="conversion-setup">
							<div class="main-card mt-5">
								<div class="dashboard-wrap-content p-4">
									<div class="d-md-flex flex-wrap align-items-center">
										
										<div class="rs ms-auto mt_r4">
											<button class="main-btn btn-hover h_40 w-100 create" data-bs-toggle="modal" data-bs-target="#inviteTeamModal">Add New Venue</button>
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
															<th scope="col">Venue</th>
															<th scope="col">Address</th>
															<th scope="col">Capacity</th>
															<th scope="col">Last Updated</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
                                                        @foreach($venues as $key => $venue)
														<tr>										
															<td>{{ ++$key }}</td>	
															<td>{{ $venue->venue_name }}</td>	
															<td>{{ $venue->venue_address }}</td>	
															<td>{{ $venue->venue_capacity }}</td>	
															<td>{{ $venue->updated_at }}</td>	
															<td>
                                                                <a class="view" data-id="{{ $venue->id }}" data-bs-toggle="modal" data-bs-target="#inviteTeamModal"><span class="action-btn"><i class="fa-solid fa-eye"></i></span></a>
                                                                <a class="edit" data-id="{{ $venue->id }}" data-bs-toggle="modal" data-bs-target="#inviteTeamModal"><span class="action-btn"><i class="fa-solid fa-pencil"></i></span></a>
                                                                <a ><span class="action-btn"><i class="fa-solid fa-trash-can"></i></span></a>
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
					<h5 class="modal-title" id="inviteTeamModalLabel">Create New Venue</h5>
					<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
				</div>
                <form action="postVenue" method="POST" enctype="multipart/form-data">
    @csrf
				<div class="modal-body">
                <input type="text" id="latitude" name="latitude" hidden>
                                <input type="text" id="longitude" name="longitude" hidden>
                                <input type="text" id="id" name="id" hidden>
                                <input type="text" id="type" name="type" hidden>
                                
                                
					<div class="model-content main-form">
						<div class="form-group mt-30">
							<label class="form-label">Venue Name</label>
							<input class="form-control h_40" type="text" name="venue_name"  id="venue_name" placeholder="Enter Venue Name" required>
						</div>
                        <div class="form-group mt-30">
							<label class="form-label">Venue Capacity</label>
							<input class="form-control h_40" type="number" name="venue_capacity" id="venue_capacity" min="1" placeholder="Enter Venue Capacity" required>
						</div>
                        <div class="form-group mt-30">
							<label class="form-label">Venue Address</label>
                            <textarea class="form-control h_40 getgeo" name="venue_address" id="venue_address" maxlength="1000" style="height: 100px;" required></textarea>
						</div>
                        <div class="form-group mt-30">
							<label class="form-label">Venue Image</label>
							<input class="form-control h_40" type="file" name="venue_image" id="venue_image" accept="image/png, image/gif, image/jpeg" required>

                            <br>
            
				<img id="uploadedimgview" width="300" height="200" style=" border: 5px solid #555;  object-fit: contain;">
						</div>
                        <div class="form-group mt-30">
							<label class="form-label">Venue Description</label>
                            <textarea class="form-control h_40" name="venue_description" id="venue_description" maxlength="1000" style="height: 100px;" required></textarea>
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
        $(document).ready(function () {
            $('.getgeo').on('keyup', function () {
                var address = $('#venue_address').val();
                if (address.trim() !== '') {
                    getLatLong(address);
                } else {
                    $('#result').html('Please enter an address.');
                }
            });
        });

        function getLatLong(address) {
            // OpenCage Geocoding API endpoint
            var apiEndpoint = 'https://api.opencagedata.com/geocode/v1/json';

            // OpenCage API Key (replace 'YOUR_API_KEY' with your actual API key)
            var apiKey = 'fd1ea17997a448d984515d5a73c9263d';

            // Prepare the request URL
            var url = apiEndpoint + '?q=' + encodeURIComponent(address) + '&key=' + apiKey;

            // Make the API request
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.status.code === 200) {
                        var latitude = data.results[0].geometry.lat;
                        var longitude = data.results[0].geometry.lng;
                        $('#latitude').val(latitude);
$('#longitude').val(longitude);
                    } else {
                        alert(data.status.message);
                    }
                },
                error: function () {
                    $('#result').html('Error occurred during the request.');
                }
            });
        }


        $(".create").click(function(){

        $('#venue_name').val('').prop('disabled',false);
        $('#venue_address').val('').prop('disabled',false).trigger('change');
        
        $('#latitude').val('').prop('disabled',false);
        $('#longitude').val('').prop('disabled',false);
        $('#venue_description').val('').prop('disabled',false);
        $('#venue_capacity').val('').prop('disabled',false);
        $('#submibtn').html('Submit');
        $('#submibtn').show();
        $("#uploadedimgview").hide();

        $('#venue_image').show().val('').prop('required',true);

        $('#type').val('C');

        $('.modal-title').html('Create New Venue');

        });




        $(".edit").click(function(){
    var id = $(this).data('id');

    $('#id').val(id);

    $.ajax({
        url: '/fetchVenue',
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            // Populate input fields with the retrieved data
            $('#venue_name').val(data.venue_name).prop('disabled',false);
            $('#venue_address').val(data.venue_address).prop('disabled',false).trigger('change');
         
            $('#latitude').val(data.venue_latitude).prop('disabled',false);
            $('#longitude').val(data.venue_longitude).prop('disabled',false);
            $('#venue_description').val(data.venue_description).prop('disabled',false);
            $('#venue_capacity').val(data.venue_capacity).prop('disabled',false);


            $('#venue_image').show().val('').prop('required',false);

            $("#uploadedimgview").show();
$("#uploadedimgview").attr('src', 'VenueImage/' + data.venue_image);

            $('#submibtn').html('Update');
            $('#submibtn').show();
            $('#type').val('E');
            $('.modal-title').html('Update Venue Details');

        },
        error: function() {
            alert('Error fetching Venue details.');
        }
    });
	
  });


  $(".view").click(function(){
    var id = $(this).data('id');

    $('#id').val(id);

    $.ajax({
        url: '/fetchVenue',
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            // Populate input fields with the retrieved data
            $('#venue_name').val(data.venue_name).prop('disabled',true);
            $('#venue_address').val(data.venue_address).prop('disabled',true).trigger('change');
         
            $('#latitude').val(data.venue_latitude).prop('disabled',true);
            $('#longitude').val(data.venue_longitude).prop('disabled',true);
            $('#venue_description').val(data.venue_description).prop('disabled',true);
            $('#venue_capacity').val(data.venue_capacity).prop('disabled',true);


            $('#venue_image').hide().val('').prop('required',false);

            $("#uploadedimgview").show();
$("#uploadedimgview").attr('src', 'VenueImage/' + data.venue_image);

            $('#submibtn').html('Update');
            $('#submibtn').hide();
            $('#type').val('V');
            $('.modal-title').html('View Venue Details');

        },
        error: function() {
            alert('Error fetching Venue details.');
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