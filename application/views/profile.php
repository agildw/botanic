<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>My Profile</title>
	<!-- include the site Google Fonts stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- include the site fontawesome stylesheet -->
	<link rel="stylesheet" href="css/fontawesome.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="style.css">
	<!-- include theme plugins setting stylesheet -->
	<link rel="stylesheet" href="css/plugins.css">
	<!-- include theme color setting stylesheet -->
	<link rel="stylesheet" href="css/color.css">
	<!-- include theme responsive setting stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- header -->
		<?php $this->load->view('partials/navbar') ?>
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Profile</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="<?= site_url('/'); ?>">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Profile</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- profileHolder -->
			<section class="profileHolder py-6">
				<div class="container">
					<div class="row">
						<!-- Update Profile Section -->
						<div class="col-md-7">
							<div class="card">
								<div class="card-header">
									<h4>Edit Profile</h4>
								</div>
								<div class="card-body">
                                    <!-- add message -->
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= $this->session->flashdata('error') ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success">
                                            <?= $this->session->flashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
									<form action="<?= site_url('profile/update_profile') ?>" method="post">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" id="name" class="form-control" style="background-color: white;" name="name" value="<?= $user['name'] ?>" required>
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" id="email" class="form-control" style="background-color: white;" name="email" value="<?= $user['email'] ?>" readonly>
										</div>
										<div class="form-group">
											<label for="phone">Phone</label>
											<input type="text" id="phone" class="form-control" style="background-color: white;" name="phone" value="<?= $user['phone'] ?>">
										</div>
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" id="state" class="form-control" style="background-color: white;" name="state" value="<?= $user['state'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" id="city" class="form-control" style="background-color: white;" name="city" value="<?= $user['city'] ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="zip">Zip Code</label>
                                            <input type="text" id="zip" class="form-control" style="background-color: white;" name="zip" value="<?= $user['zip'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea id="address" class="form-control py-4" style="background-color: white;" name="address"><?= $user['address'] ?></textarea>
                                        </div>
										<div class="form-group d-flex justify-content-end">
											<button type="submit" class="btn btnTheme text-white">Save Changes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Change Password Section -->
						<div class="col-md-5">
							<div class="card">
								<div class="card-header">
									<h4>Change Password</h4>
								</div>
								<div class="card-body">
									<!-- message -->
									<?php if ($this->session->flashdata('error_password')): ?>
										<div class="alert alert-danger">
											<?= $this->session->flashdata('error_password') ?>
										</div>
									<?php endif; ?>
									<?php if ($this->session->flashdata('success_password')): ?>
										<div class="alert alert-success">
											<?= $this->session->flashdata('success_password') ?>
										</div>
									<?php endif; ?>
									<form action="<?= site_url('profile/change_password') ?>" method="post">
										<div class="form-group">
											<label for="current_password">Current Password</label>
											<input type="password" id="current_password" class="form-control" style="background-color: white;" name="current_password" required>
										</div>
										<div class="form-group">
											<label for="new_password">New Password</label>
											<input type="password" id="new_password" class="form-control" style="background-color: white;" name="new_password" required>
										</div>
										<div class="form-group">
											<label for="confirm_password">Confirm New Password</label>
											<input type="password" id="confirm_password" class="form-control" style="background-color: white;" name="confirm_password" required>
										</div>
										<div class="form-group d-flex justify-content-end">
											<button type="submit" class="btn btnTheme text-white">Change Password</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!-- footer -->
		<?php $this->load->view('partials/footer') ?>
	</div>
	<!-- include jQuery library -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<!-- include bootstrap popper JavaScript -->
	<script src="js/popper.min.js"></script>
	<!-- include bootstrap JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- include custom JavaScript -->
	<script src="js/jqueryCustome.js"></script>
</body>
</html>
