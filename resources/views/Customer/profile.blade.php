<?php
$page = 'profile';
?>
@include('Navigation-Customer.app')
<!-- Body Start-->
<div class="wrapper">
		<div class="profile-banner">
			<div class="hero-cover-block hero-banner">
				<div class="hero-cover">
				
				</div>
			</div>
			<div class="user-dt-block">
				<div class="container">
  
					<div class="row">
						<div class="col-xl-4 col-lg-5 col-md-12">
							<div class="main-card user-left-dt">
								<div class="user-avatar-img">
                                    @if(auth()->user()->profile_img == '')
									<img src="images/profile-imgs/img-13.jpg" alt="">
                                    @else
                                    <img src="images/profile-imgs/{{auth()->user()->profile_img}}" alt="">
                                    @endif
								
								</div>
								<div class="user-dts">
									<h4 class="user-name">{{ auth()->user()->name }}<span class="verify-badge"><i class="fa-solid fa-circle-check"></i></span></h4>
									<span class="user-email">{{ auth()->user()->email }}</span>
								</div>
								<div class="ff-block">

								</div>
								
								<div class="user-btns">
								
								</div>
								<div class="profile-social-link">
							
									<div class="social-links">
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-7 col-md-12">
                        @if($message = Session::get('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px;">
<strong>Whoops !</strong> {{ session()->get('errors') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
<strong>Yay !</strong> {{ session()->get('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
							<div class="right-profile">
								<div class="profile-tabs">
									<ul class="nav nav-pills nav-fill p-2 garren-line-tab" id="myTab" role="tablist">
									
										<li class="nav-item">
											<a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa-solid fa-circle-info"></i>About</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="setting-tab" data-bs-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false"><i class="fa-solid fa-gear"></i>Setting</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fa-solid fa-box"></i>My Orders</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
									
										
											
											
										<div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
											<div class="main-card mt-4">
												<div class="bp-title position-relative">
													<h4>About</h4>
													<button class="main-btn btn-hover ms-auto edit-btn me-3 pe-4 ps-4 h_40" data-bs-toggle="modal" data-bs-target="#aboutModal">
														<i class="fa-regular fa-pen-to-square me-2"></i>Edit
													</button>
												</div>
												<div class="about-details">
													<div class="about-step">
														<h5>Name</h5>
														<span>{{ auth()->user()->name }}</span>
													</div>
                                                    <div class="about-step">
														<h5>Email</h5>
														<span>{{ auth()->user()->email }}</span>
													</div>
                                                    <div class="about-step">
														<h5>Phone</h5>
														<span>{{ auth()->user()->phone }}</span>
													</div>
													<div class="about-step">
														<h5>About yourself</h5>
														<p class="mb-0">{{ auth()->user()->about }}</p>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
											<div class="row">
												<div class="col-lg-12">
													<div class="main-card mt-4 p-0">
														<div class="nav custom-tabs" role="tablist">
															<button class="tab-link active" data-bs-toggle="tab" data-bs-target="#tab-01" type="button" role="tab" aria-controls="tab-01" aria-selected="true"><i class="fa-solid fa-envelope me-3"></i>Email Preferences</button>
															<button class="tab-link" data-bs-toggle="tab" data-bs-target="#tab-02" type="button" role="tab" aria-controls="tab-02" aria-selected="false"><i class="fa-solid fa-key me-3"></i>Password Settings</button>
		
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="main-card mt-4">
														<div class="tab-content">
															<div class="tab-pane fade show active" id="tab-01" role="tabpanel">
																<div class="bp-title">
																	<h4>Email Preferences</h4>
																</div>
																<div class="profile-setting p-4">
                                                                <form action="updnewsletter" method="post">
                                                                        @csrf
																	<div class="setting-step">
																		<div class="d-flex align-items-center justify-content-between">
																			<h3 class="setting-title">Receive Newsletter Email?</h3>
																			<label class="btn-switch m-0 ml-2">
																				<input type="checkbox" name="newsletter" @if(auth()->user()->newsletter == 'Y') checked @endif>
																				<span class="checkbox-slider"></span>
																			</label>
																		</div>
																		<p class="mt-1 mb-4">Receive latest music festivals by amazing organisers!</p>
																	</div>
                                                                    <button class="main-btn btn-hover w-100 mt-5" type="submit">Update</button>
</form>
																</div>
															</div>
															<div class="tab-pane fade" id="tab-02" role="tabpanel">
																<div class="bp-title">
																	<h4>Password Settings</h4>
																</div>
																<div class="password-setting p-4">
																	<div class="password-des">
																		<h4>Change password</h4>
																		<p>You can update your password from here.</p>
																	</div>
                                                                    <form action="changepasscust" method="post">
                                                                        @csrf
																	<div class="change-password-form">
																		<div class="form-group mt-4">
																			<label class="form-label">Current password*</label>
																			<div class="loc-group position-relative">
																				<input class="form-control h_50" type="password" name="current_password" placeholder="Enter your password" required>
																				<span class="pass-show-eye"><i class="fas fa-eye-slash" id="togglePassword1" ></i></span>
																			</div>
																		</div>
																		<div class="form-group mt-4">
																			<label class="form-label">New password*</label>
																			<div class="loc-group position-relative">
																				<input class="form-control h_50" type="password" name="new_password" maxlength="32" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&]).{8,32}" title="Your password must be between 8 - 32 characters long and include uppercase letter (A-Z), lowercase letter (a-z), number (0-9) and special characters such as @$!%*#?&" required>
																				<span class="pass-show-eye"><i  class="fas fa-eye-slash" id="togglePassword2"></i></span>
																			</div>
																		</div>
																		<div class="form-group mt-4">
																			<label class="form-label">Confirm new password*</label>
																			<div class="loc-group position-relative">
																				<input class="form-control h_50" type="password" name="new_confirm_password" maxlength="32" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&]).{8,32}" title="Your password must be between 8 - 32 characters long and include uppercase letter (A-Z), lowercase letter (a-z), number (0-9) and special characters such as @$!%*#?&" required>
																				<span class="pass-show-eye"><i  class="fas fa-eye-slash"  id="togglePassword3"></i></span>
																			</div>
																		</div>
																		<button class="main-btn btn-hover w-100 mt-5" type="submit">Update Password</button>
																	</div>
                                                                    </form>
																</div>
															</div>
														
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">

                                        @foreach($orders as $key => $order)
											<div class="main-card mt-4">
												<div class="card-top p-4">
													<div class="card-event-img">
														<img src="EventImage/{{$order->events->event_image}}" alt="">
													</div>
													<div class="card-event-dt">
														<h5>{{  $order->events->event_name }}</h5>
														<div class="invoice-id">Transaction ID : <span>{{ $order->transaction_id }}</span></div>
													</div>
												</div>
												<div class="card-bottom">
													<div class="card-bottom-item">
														<div class="card-icon">
															<i class="fa-solid fa-calendar-days"></i>
														</div>
														<div class="card-dt-text">
															<h6>Event Starts on</h6>
															<span>{{ \Carbon\Carbon::parse($order->events->event_date . ' ' . $order->events->event_time)->format('D, M j, Y g:i A') }}</span>
														</div>
													</div>
													<div class="card-bottom-item">
														<div class="card-icon">
															<i class="fa-solid fa-ticket"></i>
														</div>
														<div class="card-dt-text">
															<h6>Total Tickets</h6>
															<span>{{ $order->quantity }}</span>
														</div>
													</div>
													<div class="card-bottom-item">
														<div class="card-icon">
															<i class="fa-solid fa-money-bill"></i>
														</div>
														<div class="card-dt-text">
															<h6>Paid Amount</h6>
															<span>RM {{ $order->total_price }}</span>
														</div>
													</div>
													<div class="card-bottom-item">
														<div class="card-icon">
															<i class="fa-solid fa-money-bill"></i>
														</div>
														<div class="card-dt-text">
															<h6>Ticket</h6>
															<a  href="printTicket/{{ $order->order_id }}" target="_blank">Print</a>
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
			</div>
		</div>

	</div>
	<!-- Body End-->


    <!-- About Details Model Start-->
	<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="aboutModalLabel">Edit Profile</h5>
					<button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
				</div>
                <form action="updProfilecust" method="POST"  enctype="multipart/form-data">
                   @csrf
				<div class="modal-body">
					<div class="model-content main-form">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Name*</label>
									<input class="form-control h_40" type="text" placeholder="" name="name" value="{{ auth()->user()->name }}" required>																								
								</div>
							</div>
                            <div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Profile Picture*</label>
									<input class="form-control h_40" type="file" placeholder="" name="profile_img" accept="image/png, image/gif, image/jpeg">																								
								</div>
							</div>
						
							<div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Email <sup>[Read Only]</sup></label>
									<input class="form-control h_40" type="email" placeholder="" value="{{ auth()->user()->email }}" disabled>																								
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">Phone*</label>
									<input class="form-control h_40" type="text" name="phone" placeholder="" value="{{ auth()->user()->phone }}" required>																								
								</div>
							</div>
                            <div class="col-lg-12 col-md-12">
								<div class="form-group mt-4">
									<label class="form-label">About Yourself*</label>
									<textarea class="form-textarea" name="about" maxlength="1000">{{ auth()->user()->about }}</textarea>																							
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="co-main-btn min-width btn-hover h_40" data-bs-target="#aboutModal" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="main-btn min-width btn-hover h_40">Update</button>
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
    $(document).ready(function () {
        $("#togglePassword1").on('click', function () {
            var passwordField = $("input[name='current_password']");
            var passwordFieldType = passwordField.attr('type');
            var eyeIcon = $('#togglePassword1');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordField.attr('type', 'password');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#togglePassword2").on('click', function () {
            var passwordField = $("input[name='new_password']");
            var passwordFieldType = passwordField.attr('type');
            var eyeIcon = $('#togglePassword2');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordField.attr('type', 'password');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#togglePassword3").on('click', function () {
            var passwordField = $("input[name='new_confirm_password']");
            var passwordFieldType = passwordField.attr('type');
            var eyeIcon = $('#togglePassword3');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordField.attr('type', 'password');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    });
</script>