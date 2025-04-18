<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Smarthr Admin Template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/admin/assets/img/favicon.png">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/admin/assets/img/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/icons/feather/feather.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/tabler-icons/tabler-icons.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="/admin/assets/plugins/fontawesome/css/all.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="/admin/assets/css/style.css">

</head>

<body class="bg-white">

	<div id="global-loader" style="display: none;">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<div class="container-fuild">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
				<div class="row">
					<div class="col-lg-5">
						<div class="login-background position-relative d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100">
							<div class="bg-overlay-img">
								<img src="/admin/assets/img/bg/bg-01.png" class="bg-1" alt="Img">
								<img src="/admin/assets/img/bg/bg-02.png" class="bg-2" alt="Img">
								<img src="/admin/assets/img/bg/bg-03.png" class="bg-3" alt="Img">
							</div>
							<div class="authentication-card w-100">
								<div class="authen-overlay-item border w-100">
									<h1 class="text-white display-1">Empowering people <br> through seamless HR <br> management.</h1>
									<div class="my-4 mx-auto authen-overlay-img">
										<img src="/admin/assets/img/bg/authentication-bg-01.png" alt="Img">
									</div>
									<div>
										<p class="text-white fs-20 fw-semibold text-center">Efficiently manage your workforce, streamline <br> operations effortlessly.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-12 col-sm-12">
						<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap">
							<div class="col-md-7 mx-auto vh-100">
                                <form method="POST" class="vh-100" action="{{ route('login') }}">
                                    @csrf
									<div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
										<div class=" mx-auto mb-5 text-center">
											<img src="/admin/assets/img/logo.svg"
												class="img-fluid" alt="Logo">
										</div>
										<div class="">
											<div class="text-center mb-3">
												<h2 class="mb-2">Sign In</h2>
												<p class="mb-0">Please enter your details to sign in</p>
											</div>
											<div class="mb-3">
												<label class="form-label">Email Address</label>
												<div class="input-group">
													<input type="text" name="email" class="form-control border-end-0">
													<span class="input-group-text border-start-0">
														<i class="ti ti-mail"></i>
													</span>
												</div>
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<div class="pass-group">
													<input type="password" name="password" class="pass-input form-control">
													<span class="ti toggle-password ti-eye-off"></span>
												</div>
											</div>
											<div class="mb-3">
												<button type="submit" class="btn btn-primary w-100">Sign In</button>
											</div>
										</div>
                                        <div class="mt-5 pb-4 text-center">
											<p class="mb-0 text-gray-9">Copyright &copy; 2025 - Meiji Indonesia</p>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="/admin/assets/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="/admin/assets/js/feather.min.js"></script>

	<!-- Custom JS -->
	<script src="/admin/assets/js/script.js"></script>

</body>

</html>
