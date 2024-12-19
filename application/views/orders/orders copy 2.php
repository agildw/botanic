<?php print_r($orders); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>Orders</title>
	<!-- include the site Google Fonts stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
    <!-- include the site fontawesome stylesheet -->
    <link rel="stylesheet" href="<?= base_url('css/fontawesome.css') ?>">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <!-- include theme plugins setting stylesheet -->
    <link rel="stylesheet" href="<?= base_url('css/plugins.css') ?>">
    <!-- include theme color setting stylesheet -->
    <link rel="stylesheet" href="<?= base_url('css/color.css') ?>">
    <!-- include theme responsive setting stylesheet -->
    <link rel="stylesheet" href="<?= base_url('css/responsive.css') ?>">
    <base href="<?= base_url(); ?>">
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
							<h1 class="headingIV fwEbold playfair mb-4">Orders</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="<?= site_url() ?>">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Orders</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
            
			<!-- Orders List -->
			<section class="order-list py-5">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Order ID</th>
										<th>Status</th>
										<th>Total Price</th>
										<th>Order Date</th>
										<th>Products</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($orders)): ?>
										<?php $index = 1; ?>
										<?php foreach ($orders as $order): ?>
											<tr data-href="<?= site_url('orders/' . $order['order_code']); ?>" style="cursor: pointer;">
												<td><?= $order['order_code']; ?></td>
												<td>
													<span class="badge <?= $order['status'] == 'PAID' ? 'badge-success' : 'badge-warning'; ?>">
														<?= $order['status']; ?>
													</span>
												</td>
												<td>Rp<?= number_format($order['total_price'], 0, ',', '.'); ?></td>
												<td><?= date('d M Y, H:i', strtotime($order['created_at'])); ?></td>
												<td>
													<ul class="list-unstyled">
														<?php foreach ($order['products'] as $product): ?>
															<li class="d-flex align-items-start">
																<img src="<?= $product['product_image']; ?>" alt="<?= $product['product_name']; ?>" style="width: 50px; height: 50px; object-fit: cover;" class="mr-3">
																<div>
																	<p class="mb-1"><strong><?= $product['product_name']; ?></strong></p>
																	<p class="mb-1">Quantity: <?= $product['quantity']; ?></p>
																	<p class="mb-0">Price: Rp<?= number_format($product['price'], 0, ',', '.'); ?></p>
																</div>
															</li>
														<?php endforeach; ?>
													</ul>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="6" class="text-center">No orders found.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
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
    <script>
        $(document).ready(function() {
            $('tr[data-href]').on('click', function() {
                window.location = $(this).data('href');
            });
        });
    </script>
</body>
</html>
