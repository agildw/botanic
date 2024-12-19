<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title><?= $order['order_code'] ?></title>
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
							<h1 class="headingIV fwEbold playfair mb-4">Order Details</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="<?= site_url() ?>">Home</a></li>
								<li class="mr-2">/</li>
								<li class="mr-2"><a href="<?= site_url('orders') ?>">Orders</a></li>
                                <li class="mr-2">/</li>
                                <li class="active"><?php echo $order['order_code'] ?></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
            <div class="container py-5">
				<div class="row">
					<!-- Order Information -->
					<div class="col-md-6 mb-4">
						<h3 class="fwEbold mb-4">Order Information</h3>
						<ul class="list-unstyled">
							<li><strong>Order ID:</strong> <?= $order['order_code'] ?></li>
							<li><strong>Name:</strong> <?= $order['name'] ?></li>
							<li><strong>Phone:</strong> <?= $order['phone'] ?></li>
							<li><strong>Address:</strong> <?= $order['address'] ?>, <?= $order['city'] ?>, <?= $order['state'] ?> - <?= $order['zip'] ?></li>
							<li><strong>Order Date:</strong> <?= date('d M Y, H:i', strtotime($order['created_at'])) ?></li>
							<!-- if paid_at not null show -->
							<?php if($order['paid_at']): ?>
							<li><strong>Paid Date:</strong> <?= date('d M Y, H:i', strtotime($order['paid_at'])) ?></li>
							<?php endif; ?>
							<!-- if payment_method not null show -->
							<?php if($order['payment_method']): ?>
							<li><strong>Payment Method:</strong> <?= $order['payment_method'] ?></li>
							<?php endif; ?>
							<li><strong>Status:</strong> <span class="badge badge-warning" id="status"
							style="font-size: 1em;"><?= $order['status'] ?></span></li>
							
							<!-- if status UNPAID create pay button with href to payment_url -->
							<?php if($order['status'] == 'UNPAID'): ?>
							<li><a href="<?= $order['payment_url'] ?>" class="btn btn-success mt-3" style="background-color: #5BA514; border-color: #5BA514;">Pay Now</a></li>
							<?php endif; ?>
						</ul>
					</div>
					<!-- Product Information -->
					<div class="col-md-6 mb-4">
						<h3 class="fwEbold mb-4">Product Details</h3>
						
                    <?php foreach ($order['products'] as $product): ?>
                    <div class="card shadow-sm mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= $product['product_image'] ?>" class="img-fluid" alt="<?= $product['product_name'] ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product['product_name'] ?></h5>
                                    <p class="card-text mb-1"><strong>Quantity:</strong> <?= $product['quantity'] ?></p>
                                    <p class="card-text mb-1"><strong>Price:</strong> Rp. <?= number_format($product['price'], 0, ',', '.') ?></p>
                                    <p class="card-text"><strong>Total:</strong> Rp. <?= number_format($product['price'] * $product['quantity'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
					</div>
				</div>

				<!-- Summary -->
				<div class="row mt-4">
					<div class="col-md-6 offset-md-6">
						<div class="card p-4 bg-light">
							<h4 class="fwEbold mb-3">Order Summary</h4>
							<ul class="list-unstyled mb-3">
								<li class="d-flex justify-content-between">
									<span>Subtotal:</span>
									<span>Rp. <?= number_format($order['total_price'], 0, ',', '.') ?></span>
								</li>
								<li class="d-flex justify-content-between">
									<span>Shipping:</span>
									<span>Free</span>
								</li>
							</ul>
							<hr>
							<div class="d-flex justify-content-between fwEbold">
								<span>Total:</span>
								<span>Rp. <?= number_format($order['total_price'], 0, ',', '.') ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
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
		// Mendapatkan elemen status dan expired_at dari server
		const statusElement = document.getElementById('status');
		const expiredAt = "<?= $order['expired_at'] ?>"; // Format: YYYY-MM-DD HH:mm:ss

		// chane badge color
		const status = statusElement.innerText;
		console.log(status);
		if (status === "UNPAID") {
			statusElement.classList.add('badge-warning');
		} else if (status === "PAID") {
			statusElement.classList.remove('badge-warning');
			statusElement.classList.add('badge-success');
		} else if (status === "EXPIRED") {
			statusElement.classList.remove('badge-warning');
			statusElement.classList.add('badge-danger');
		}

		// Fungsi untuk mengupdate counter
		function updateCounter() {
			const now = new Date();
			const expiredTime = new Date(expiredAt);
			const diff = expiredTime - now;

			// Jika waktu sudah habis
			if (diff <= 0) {
				statusElement.innerText = 'EXPIRED';
				statusElement.classList.remove('badge-warning');
				statusElement.classList.add('badge-danger');
				clearInterval(counterInterval); // Hentikan interval
				return;
			}

			// Hitung waktu tersisa dalam jam, menit, dan detik
			const hours = Math.floor(diff / (1000 * 60 * 60));
			const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
			const seconds = Math.floor((diff % (1000 * 60)) / 1000);

			// Tampilkan counter dalam format "HH:mm:ss"
			statusElement.innerText = `UNPAID (Expires in ${hours}:${minutes}:${seconds})`;
		}

		// Jalankan counter jika status adalah UNPAID
		if (statusElement.innerText.includes('UNPAID')) {
			const counterInterval = setInterval(updateCounter, 1000); // Update setiap detik
			updateCounter(); // Jalankan sekali untuk menampilkan awal
		}
	</script>



</body>
</html>