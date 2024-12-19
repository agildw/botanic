<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title><?= $product['name'] ?></title>
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
		<!-- main -->
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" >
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Shop</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="<?= base_url() ?>">Home</a></li>
								<li class="mr-2">/</li>
								<li class="mr-2"><a href="<?= base_url('products') ?>">Products</a></li>
								<li class="mr-2">/</li>
								<li class="active"><?= $product['name'] ?></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-xl-23 pb-xl-20 pt-lg-20 pb-lg-20 py-md-16 py-10">
				<div class="row mb-6">
					<div class="col-12 col-lg-6 order-lg-1">
						<!-- productSliderImage -->
						<div class="productSliderImage mb-lg-0 mb-4">
							<div>
								<img src="<?=$product['thumbnail'] ?>" alt="image description" class="img-fluid w-100">
							</div>
							<div>
								<img src="<?=$product['thumbnail'] ?>" alt="image description" class="img-fluid w-100">
							</div>
							<div>
								<img src="<?=$product['thumbnail'] ?>" alt="image description" class="img-fluid w-100">
							</div>
							<div>
								<img src="<?=$product['thumbnail'] ?>" alt="image description" class="img-fluid w-100">
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 order-lg-3">
						<!-- productTextHolder -->
						<div class="productTextHolder overflow-hidden">
							<h2 class="fwEbold mb-2"><?= $product['name'] ?></h2>
							<strong class="price d-block mb-5 text-green">Rp. <?= number_format($product['price'], 0, ',', '.') ?></strong>
							<!-- <p class="mb-5">Aenean id ullamcorper libero. Vestibulum imperdiet nibh. Lorem ullamcorper volutpat. Vestibulum lacinia risus.</p> -->
							<ul class="list-unstyled productInfoDetail mb-5 overflow-hidden">
								<!-- <li class="mb-2">Product Code: <span>FA008</span></li> -->
								<li class="mb-2">Quantity: <span>
                                <?= $product['quantity'] ?>
                                        
                                Items</span></li>
							</ul>
							<div class="holder overflow-hidden d-flex flex-wrap mb-6">
								<input type="number" id="quantity" name="quantity" value="1">
								<a href="javascript:void(0);" class="btn btnTheme btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4">Add To Cart <i class="fas fa-arrow-right ml-2"></i></a>
							</div>
							<ul class="list-unstyled socialNetwork d-flex flex-wrap mb-sm-11 mb-4">
								<li class="text-uppercase mr-5">SHARE THIS PRODUCT:</li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-pinterest-p"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- tabSetList -->
						<ul class="list-unstyled tabSetList d-flex justify-content-center mb-9">
							<li class="">
								<a href="#tab1-0" class="active playfair fwEbold pb-2">Description</a>
							</li>
							<!-- <li>
								<a href="#tab2-0" class="playfair fwEbold pb-2">Reviews ( 2 )</a>
							</li> -->
						</ul>
						<!-- tab-content -->
						<div class="tab-content mb-xl-11 mb-lg-10 mb-md-8 mb-5">
							<div id="tab1-0" class="active">
								<p><?= $product['description'] ?></p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- featureSec -->
			<section class="featureSec container overflow-hidden pt-xl-12 pb-xl-29 pt-lg-10 pb-lg-14 pt-md-8 pb-md-10 py-5">
				<div class="row">
					<!-- mainHeader -->
					<header class="col-12 mainHeader mb-5 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Related products</h1>
					</header>
				</div>
				<div class="row">
				
					<?php foreach ($related_products as $related_product): ?>
					<div class="col-12 col-sm-6 col-lg-3 featureCol position-relative mb-7">
						<div class="border">
							<div class="imgHolder position-relative w-100 overflow-hidden">
								<img src="<?= $related_product['thumbnail'] ?>" alt="image description" class="img-fluid w-100" style="height: 340px; object-fit: cover;">
							</div>
							<div class="text-center py-5 px-4">
								<span class="title d-block mb-2"><a href="<?= site_url('products/' . $related_product['slug']) ?>"><?= $related_product['name'] ?></a></span>
								<span class="price d-block fwEbold">Rp. <?= number_format($related_product['price'], 0, ',', '.') ?></span>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
			
				</div>
			</section>
		
			
		</main>
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
			$('.btnShop').on('click', function() {
				const productId = <?= $product['id'] ?>;
				const quantity = $('#quantity').val();

				$.ajax({
					url: "<?= base_url('cart/add_to_cart') ?>",
					method: "POST",
					data: {
						product_id: productId,
						quantity: Number(quantity)
					},
					success: function(response) {
						const res = JSON.parse(response);
						alert(res.message);
					},
					error: function() {
						alert("An error occurred while adding the product to the cart.");
					}
				});
			});
		});
	</script>
</body>
</html>