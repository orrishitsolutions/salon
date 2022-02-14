<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Unisex Salon | Admin Login</title>
	<!-- core:css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/demo_5/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="<?= base_url() ?>admin/assets-orrish/images/ngo.png"/>
	<!-- <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.png" /> -->
</head>
<body>
<div class="main-wrapper">
	<div class="page-wrapper full-page">
		<div class="page-content d-flex align-items-center justify-content-center">

			<div class="row w-100 mx-0 auth-page">
				<div class="col-md-8 col-xl-6 mx-auto">
					<div class="card">
						<div class="row">
							<div class="col-md-4 pr-md-0">
								<div class="auth-left-wrapper"></div>
							</div>
							<div class="col-md-8 pl-md-0">
								<div class="auth-form-wrapper px-4 py-5">
									<a href="#" class="noble-ui-logo d-block mb-2">Unisex<span>Salon</span></a>

									<h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your
										account.</h5>
									<?= form_open('admin', ['class' => 'forms-sample']); ?>
									<?php $errors = $this->session->flashdata(); ?>
									<div class="form-group">
										<?= $login['error']; ?>
										<label for="exampleInputEmail1">Email address</label>
										<?php
										$invalid = !empty($login['error']) ? ' is-invalid' : '';
										$emailInput = [
												'type' => 'text',
												'class' => 'form-control' . $invalid,
												'name' => 'email',
												'placeholder' => 'Email',
												'value' => !empty($login['email']) ? $login['email'] : ""
										];
										echo form_input($emailInput);
										?>
									</div>
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
										   value="<?= $this->security->get_csrf_hash(); ?>">
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<?php
										$passwordInput = [
												'type' => 'password',
												'class' => 'form-control' . $invalid,
												'name' => 'password',
												'placeholder' => 'Password',
												'value' => !empty($login['password']) ? $login['password'] : ""
										];
										echo form_input($passwordInput);
										?>
									</div>
									<div class="mt-3">
										<?php
										$submitInput = [
												'class' => 'btn btn-primary mr-2 mb-2 mb-md-0 text-white',
												'type' => 'submit',
												'name' => 'submit',
												'value' => 'Sign-in'
										];
										echo form_input($submitInput);
										?>
									</div>
									<?= form_close(); ?>
									<style>
										.error {
											color: red;
										}
									</style>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- core:js -->
<script src="<?= base_url() ?>assets/admin/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url() ?>assets/admin/vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/template.js"></script>

<!-- endinject -->
<!-- custom js for this page -->
<!-- end custom js for this page -->
</body>
</html>
