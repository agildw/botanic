<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>Botanical - HTML5 Ecommerce Template</title>
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
	<!-- <base href="<?= base_url(); ?>/assets"> -->
	<base href="<?= base_url(); ?>">

</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- pageHeader -->
		<header id="header" class="pt-lg-5 pt-md-3 pt-2 position-absolute w-100">
			<div class="container-fluid px-xl-17 px-lg-5 px-md-3 px-0 d-flex flex-wrap">
				<div class="col-6 col-sm-3 col-lg-2 order-sm-2 order-md-0 dis-none">
					<!-- langList -->
					<ul class="nav nav-tabs langList pt-xl-6 pt-lg-4 pt-3 border-bottom-0">
						<li>
							<a class="icon-menu" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false"></a>
							<div class="dropdown-menu pl-4 pr-4">
								<?php if (!$this->session->userdata('id')): ?>
									<a class="dropdown-item" href="<?= site_url('/auth/login'); ?>">Login</a>
									<a class="dropdown-item" href="<?= site_url('/auth/register'); ?>">Registration</a>
								<?php endif; ?>
								<?php if ($this->session->userdata('role') == 'ADMIN'): ?>
									<a class="dropdown-item" href="<?= site_url('/admin'); ?>">Admin Dashboard</a>
								<?php endif; ?>
								<?php if ($this->session->userdata('id')): ?>
									<a class="dropdown-item" href="<?= site_url('/profile'); ?>">Profile</a>
									<a class="dropdown-item" href="<?= site_url('/orders'); ?>">Orders</a>
									<a class="dropdown-item" href="<?= site_url('/auth/logout'); ?>">Logout</a>
								<?php endif; ?>
								
								
							</div>
						</li>
						<!-- <li class="dropdown">
							<a class="dropdown-toggle text-uppercase" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">ENG</a>
							<div class="dropdown-menu pl-4 pr-4">
								<a class="dropdown-item" href="javascript:void(0);">English</a>
								<a class="dropdown-item" href="javascript:void(0);">Vietnamese</a>
								<a class="dropdown-item" href="javascript:void(0);">French</a>
							</div>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle text-uppercase" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">USD</a>
							<div class="dropdown-menu text-uppercase pl-4 pr-4 border-0">
								<a class="dropdown-item" href="javascript:void(0);">USD</a>
								<a class="dropdown-item" href="javascript:void(0);">VND</a>
								<a class="dropdown-item" href="javascript:void(0);">euro</a>
							</div>
						</li> -->
					</ul>
				</div>
				<div class="col-12 col-sm-6 col-lg-8 static-block">
					<!-- mainHolder -->
					<div class="mainHolder justify-content-center">
						<!-- pageNav1 -->
						<nav class="navbar navbar-expand-lg navbar-light p-0 pageNav1 position-static">
							<button type="button" class="navbar-toggle collapsed position-relative mt-md-2" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav mx-auto text-uppercase d-inline-block">
									<li class="nav-item active dropdown">
										<a class="d-block" href="<?= site_url('/'); ?>"
										>home</a>
									</li>
									<li class="nav-item dropdown">
										<a class="d-block"	href="<?= site_url('/products'); ?>"
										>Store</a>
									</li>
									<li class="nav-item">
										<a class="nLogo" href="home.html"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
									</li>
									<li class="nav-item">
										<a class="d-block" href="<?= site_url('/about'); ?>">About</a>
									</li>
									<li class="nav-item">
										<a class="d-block" href="<?= site_url('/contact'); ?>">Contact</a>
									</li>
								</ul>
							</div>
						</nav>
						<div class="logo">
							<a href="home.html"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-3 col-lg-2 order-sm-3 order-md-0 dis-none">
					<!-- wishList -->
					<ul class="nav nav-tabs wishList pt-xl-5 pt-lg-4 pt-3 mr-xl-3 mr-0 justify-content-end border-bottom-0">
						
						<li class="nav-item">
							<a class="nav-link position-relative icon-cart" href="<?= site_url('/cart'); ?>">
								<span class="num rounded d-block text-center" style="width: 1.8em; height:1.5em;">
									<p class="text-center">
										<?php echo(get_cart_item_count()); ?>
									</p>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<!-- main -->
		<main>
			<!-- introBlock -->
			<section class="introBlock position-relative">
				<div class="slick-fade">
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image: url(images/b-bg.jpg);">
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<h1 class="fwEbold position-relative pb-lg-8 pb-4 mb-xl-7 mb-lg-6">Houseplant <span class="text-break d-block">The Perfect Choice.</span></h1>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry <br>has been the industry's standard.</p>
											<a href="<?= site_url('/products'); ?>" class="btn btnTheme btnShop fwEbold text-white md-round py-md-3 px-md-4 py-2 px-3">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder">
										<img src="https://htmlbeans.com/html/botanical/images/img77.png" alt="image description" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image: url(images/b-bg2.jpg);">
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<span class="title d-block text-uppercase fwEbold position-relative pl-2 mb-lg-5 mb-sm-3 mb-1">wellcome to botanical</span>
											<h2 class="fwEbold position-relative mb-xl-7 mb-lg-5">Plants Gonna Make  <span class="text-break d-block">People Happy.</span></h2>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
											<a href="<?= site_url('/products'); ?>" class="btn btnTheme btnShop fwEbold text-white md-round py-2 px-3 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder">
										<img src="https://htmlbeans.com/html/botanical/images/img78.png" alt="image description" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image: url(images/b-bg3.jpg);">
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<span class="title d-block text-uppercase fwEbold position-relative pl-2 mb-lg-5 mb-sm-3 mb-1">wellcome to botanical</span>
											<h2 class="fwEbold position-relative mb-xl-7 mb-lg-5">Plants for healthy</h2>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
											<a href="<?= site_url('/products'); ?>" class="btn btnTheme btnShop fwEbold text-white md-round py-2 px-3 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder">
										<img src="https://htmlbeans.com/html/botanical/images/img79.png" alt="image description" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slickNavigatorsWrap">
					<a href="#" class="slick-prev"><i class="icon-leftarrow"></i></a>
					<a href="#" class="slick-next"><i class="icon-rightarrow"></i></a>
				</div>
			</section>
			<!-- chooseUs-sec -->
			<section class="chooseUs-sec container pt-xl-22 pt-lg-20 pt-md-16 pt-10 pb-xl-12 pb-md-7 pb-2">
				<div class="row">
					<div class="col-12 col-lg-6 mb-lg-0 mb-4">
						<img src="https://htmlbeans.com/html/botanical/images/img01.jpg" alt="image description" class="img-fluid">
					</div>
					<div class="col-12 col-lg-6 pr-4">
						<h2 class="headingII fwEbold playfair position-relative mb-6 pb-5">Why choose us ?</h2>
						<p class="mb-xl-14 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry, lorem ipsum has been the industry's standard dummy text ever since the 1500s  when an unknown printer took a galley ... <a href="javascript:void(0);" class="btnMore"><i>Learn More</i></a></p>
						<!-- chooseList -->
						<ul class="list-unstyled chooseList">
							<li class="d-flex justify-content-start mb-xl-7 mb-lg-5 mb-3">
								<span class="icon icon-plant"></span>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Hand Planted</h3>
									<p>There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form.</p>
								</div>
							</li>
							<li class="d-flex justify-content-start mb-xl-6 mb-lg-5 mb-4">
								<span class="icon icon-ic-plant"></span>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Natural Sunlight</h3>
									<p>It is a long established fact that a reader will be distracted by the reable content of a page.</p>
								</div>
							</li>
							<li class="d-flex justify-content-start">
								<span class="icon icon-desert"></span>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Clean Air</h3>
									<p>There are many variations of passages of lorem ipsum available, but the majority have suffered.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<!-- featureSec -->
			<section class="featureSec container-fluid overflow-hidden pt-xl-12 pt-lg-10 pt-md-80 pt-5 pb-xl-10 pb-lg-4 pb-md-2 px-xl-14 px-lg-7">
				<!-- mainHeader -->
				<header class="col-12 mainHeader mb-7 text-center">
					<h1 class="headingIV playfair fwEblod mb-4">Featured Product</h1>
					<span class="headerBorder d-block mb-md-5 mb-3"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
					<p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
				</header>
				<div class="col-12 p-0 overflow-hidden d-flex flex-wrap">


					<?php foreach ($products as $product): ?>
					<div class="featureCol px-3 mb-6 position-relative" role="button">
						<div class="border">
							<div class="imgHolder position-relative w-100 overflow-hidden">
								<img src="<?= $product['thumbnail']; ?>" alt="image description" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
							</div>
							<div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
								<span class="title d-block mb-2"><a href="<?= site_url('/products/' . $product['slug']); ?>"><?= $product['name']; ?></a></span>
								<!-- <span class="price d-block fwEbold">Rp. <?= number_format
								($product['price'], 0, ',', '.'); ?></span> -->
								<span class="d-block fwEbold">Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span>

							</div>
						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</section>
			<!-- contactListBlock -->
			<div class="contactListBlock container overflow-hidden pt-xl-8 pt-lg-10 pt-md-8 pt-4 pb-xl-12 pb-lg-10 pb-md-4 pb-1">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-van"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Free shipping order</strong>
								<p class="m-0">On orders over  $100</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-gift"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Special gift card</strong>
								<p class="m-0">The perfect gift idea</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-4 px-md-2 px-3 d-flex">
							<span class="icon icon-recycle"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Return &amp; exchange</strong>
								<p class="m-0">Free return within 3 days</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-call"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Support 24 / 7</strong>
								<p class="m-0">Customer support</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid px-xl-20 px-lg-14">
				<!-- subscribeSecBlock -->
				<section class="subscribeSecBlock bgCover col-12 pt-xl-24 pb-xl-12 pt-lg-20 pt-md-16 pt-10 pb-md-8 pb-5" style="background-color: #f5f5f5;">
					<header class="col-12 mainHeader mb-sm-9 mb-6 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
						<span class="headerBorder d-block mb-md-5 mb-3"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
						<p class="mb-sm-6 mb-3">Enter Your email address to join our mailing list and keep yourself update</p>
					</header>
					<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
						<input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
						<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
					</form>
				</section>
			</div>
			<!-- footerHolder -->
		
		</main>
		<!-- footer -->
		<?php $this->load->view('partials/footer'); ?>
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