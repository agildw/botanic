<!DOCTYPE html>
<html lang="en">

<head>
<!-- set the encoding of your site -->
<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>Register - Botanical</title>
	<!-- include the site Google Fonts stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&display=swap" rel="stylesheet">
	

	<link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/fontawesome.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/plugins.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/color.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/responsive.css">
	<!-- set the shortcut icon -->
	<!-- <base href="<?= base_url(); ?>/assets"> -->
	<base href="<?= base_url(); ?>">	
</head>

<body>

	
	<!-- Login 9 - Bootstrap Brain Component -->
	<div class="vh-100 d-flex align-items-center justify-content-center " style="background-color: #85A98F">
		<section class=" py-3 py-md-5 py-xl-8" style="background-color: #85A98F">
		<div class="container">
			<div class="row gy-4 align-items-center">
			<div class="col-12 col-md-6 col-xl-7">
				<div class="d-flex justify-content-center text-bg-primary">
				<div class="col-12 col-xl-9">
					<!-- <img class="img-fluid rounded mb-4" loading="lazy" src="images/logo.png" width="245" height="80" alt="Botanic Logo">
					<hr class="border-primary-subtle mb-4"> -->
					<h2 class="h1 mb-4 text-light">Welcome to Botanical</h2>
					<p class="lead mb-5 text-light">Discover our wide range of botanical products that bring nature closer to you.</p>
					<div class="text-endx">
					<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal text-light" viewBox="0 0 16 16">
						<path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
					</svg>
					</div>
				</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl-5">
				<div class="card border-0 rounded-4">
				<div class="card-body p-3 p-md-4 p-xl-5">
				<?php if($this->session->flashdata('message_register_error')): ?>
					<div class="text-lg bg-danger text-white p-3 mb-4">
							<?= $this->session->flashdata('message_register_error') ?>
					</div>
				<?php endif ?>
					<div class="row">
					<div class="col-12">
						<div class="mb-4">
						<h3>Sign Up</h3>
						<p>Already an account? <a href="<?= base_url('auth/login') ?>				
						">Sign In</a></p>
						</div>
					</div>
					</div>
					<form action="" method="post">
					<div class="row gy-3 overflow-hidden">
						<div class="col-12">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-floating">
										<input type="email" class="form-control bg-white input-sm" name="email" id="email" placeholder="doe@gmail.com" required value="<?= set_value('email') ?>">
										<label for="email" class="form-label">Email</label>
									
										<?= form_error('email') ?>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-floating">
										<input type="password" class="form-control bg-white input-sm" name="password" id="password" value="" placeholder="Password" required value="<?= set_value('password') ?>">
										<label for="password" class="form-label">Password</label>
										<?= form_error('password') ?>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="col-12">
							<div class="form-floating">
								<input type="text" class="form-control bg-white input-sm" name="name" id="name" placeholder="Doe" required value="<?= set_value('name') ?>">
								<label for="name" class="form-label">Nama</label>
								<?= form_error('name') ?>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating">
								<input type="text" class="form-control bg-white input-sm" name="phone" id="phone" placeholder="0823xxx" required value="<?= set_value('phone') ?>">
								<label for="phone" class="form-label">Nomor Telepon</label>
								<?= form_error('phone') ?>
							</div>
						</div>

						<div class="col-12">
							<div class="form-floating">
								<input type="text" class="form-control bg-white input-sm" name="state" id="state" placeholder="DKI Jakarta" required value="<?= set_value('state') ?>">
								<label for="state" class="form-label">Provinsi</label>
								<?= form_error('state') ?>
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								
								<div class="col-12 col-md-6">
									<div class="form-floating">
										<input type="text" class="form-control bg-white input-sm" name="city" id="city" placeholder="Jakarta" required value="<?= set_value('city') ?>">
										<label for="city" class="form-label">Kota</label>
										<?= form_error('city') ?>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-floating">
										<input type="text" class="form-control bg-white input-sm" name="zip" id="zip" placeholder="10230" required value="<?= set_value('zip') ?>">
										<label for="zip" class="form-label">Kode Pos</label>
										<?= form_error('zip') ?>
									</div>
								</div>
							</div>
						</div>

						
						<div class="col-12">
							<div class="form-floating">
								<input type="text" class="form-control bg-white input-sm" name="address" id="address" placeholder="Jl. Mawar"
								 required value="<?= set_value('address') ?>">
								<label for="address" class="form-label">Alamat</label>
								<?= form_error('address') ?>
							</div>
						</div>
						
						<div class="col-12">
						<div class="d-grid">
							<button class="btn btn-success btn-lg" type="submit">Register</button>
						</div>
						</div>
					</div>
					</form>
					<!-- <div class="row">
					<div class="col-12">
						<div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
						<a href="#!">Forgot password</a>
						</div>
					</div>
					</div> -->
					
				</div>
				</div>
			</div>
			</div>
		</div>
		</section>
	</div>
</body>

</html>