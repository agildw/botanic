<!DOCTYPE html>
<html lang="en">

<head>
	
</head>

<body>


	<div class="container">
		<h1>Login</h1>
		<p>Masuk ke Dashboard</p>

		<?php if($this->session->flashdata('message_register_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_register_error') ?>
			</div>
		<?php endif ?>

		<form action="" method="post" style="max-width: 600px;">
			<div>
				<label for="name">Email*</label>
				<input type="text" name="email" class="<?= form_error('email') ? 'invalid' : '' ?>"
					placeholder="Your email" value="<?= set_value('email') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('email') ?>
				</div>
			</div>
			<div>
				<label for="password">Password*</label>
				<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
			</div>

            <div>
				<label for="name">Name</label>
				<input type="text" name="name" class="<?= form_error('name') ? 'invalid' : '' ?>"
					placeholder="Name" value="<?= set_value('name') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('name') ?>
				</div>
			</div>

            <div>
				<label for="phone">Phone</label>
				<input type="text" name="phone" class="<?= form_error('phone') ? 'invalid' : '' ?>"
					placeholder="No Telpon" value="<?= set_value('phone') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('phone') ?>
				</div>
			</div>

            <div>
				<label for="address">address</label>
				<input type="text" name="address" class="<?= form_error('address') ? 'invalid' : '' ?>"
					placeholder="Alamat" value="<?= set_value('address') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('address') ?>
				</div>
			</div>

			<div>
				<input type="submit" class="button button-primary" value="Login">
			</div>
		</form>
	</div>
	
</body>

</html>