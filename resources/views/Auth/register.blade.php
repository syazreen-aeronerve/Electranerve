<!DOCTYPE html>
<html lang="en" class="h-100">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>ElectraNerve</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/electranerve.png">
		
		<!-- Stylesheets -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">		
		
	</head>

<body>				
	<div class="form-wrapper">
		<div class="app-form">
			<div class="app-form-sidebar">
				<div class="sidebar-sign-logo">
                <h2 style="color:white;">ElectraNerve</h2>
				</div>
				<div class="sign_sidebar_text">
					<h1>The Easiest Way to Create Events and Sell More Tickets Online</h1>
				</div>
			</div>
			<div class="app-form-content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10 col-md-10">
							<div class="app-top-items">
								<a href="index.html">
									<div class="sign-logo" id="logo">
										<img src="images/logo.svg" alt="">
										<img class="logo-inverse" src="images/dark-logo.svg" alt="">
									</div>
								</a>
								<div class="app-top-right-link">
									Already have an account?<a class="sidebar-register-link" href="/">Sign In</a>
									
								</div>
							</div>
						</div>
						<div class="col-xl-5 col-lg-6 col-md-7">
							<div class="registration">
							<form action="register-post" method="POST" enctype="multipart/form-data">
                                            @csrf
									<h2 class="registration-title">Sign up to ElectraNerve</h2>
									@if($message = Session::get('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Whoops !</strong> {{ session()->get('errors') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Yay !</strong> {{ session()->get('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
									<div class="row mt-3">
									<div class="col-lg-12 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Role*</label>
												<select class="form-control h_50" name="role" id="role" required>
													<option value="" selected disabled>-- Select Role --</option>
													<option value="Customer">Customer</option>
													<option value="Event Organiser">Event Organiser</option>
												</select>
																																	
											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Name*</label>
												<input class="form-control h_50" type="text" name="name" placeholder="" value="">																								
											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Email*</label>
												<input class="form-control h_50" type="email" name="email" placeholder="" value="">																								
											</div>
										</div>
                                        <div class="col-lg-12 col-md-12">
											<div class="form-group mt-4">
												<label class="form-label">Phone Number*</label>
												<input class="form-control h_50" type="number" name="phone" placeholder="" value="">																								
											</div>
										</div>
										<div class="col-lg-12 col-md-12">	
											<div class="form-group mt-4">
												<div class="field-password">
													<label class="form-label">Password*</label>
												</div>
												<div class="loc-group position-relative">
													<input class="form-control h_50" type="password" id="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&]).{8,32}" title="Your password must be between 8 - 32 characters long and include uppercase letter (A-Z), lowercase letter (a-z), number (0-9) and special characters such as @$!%*#?&" maxlength="32" placeholder="">
													<span class="pass-show-eye"><i class="fas fa-eye-slash" id="togglePassword"></i></span>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-12">		
											<button class="main-btn btn-hover w-100 mt-4" type="submit">Sign Up</button>
										</div>
									</div>
								</form>
						
								<div class="new-sign-link">
									Already have an account?<a class="signup-link" href="/">Sign In</a>
								</div>
							</div>							
						</div>
					</div>
				</div>
				<br><br>
				<div class="copyright-footer">
					2024, ElectraNerve. All rights reserved.
				</div>
			</div>			
		</div>
	</div>
	
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>	
	<script src="js/custom.js"></script>
	<script src="js/night-mode.js"></script>

	<script>
    $(document).ready(function () {
        $("#togglePassword").on('click', function () {
            var passwordField = $("#password");
            var passwordFieldType = passwordField.attr('type');
            var eyeIcon = $('#togglePassword');

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

</body>
</html>