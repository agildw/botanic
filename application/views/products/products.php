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
    <base href="<?= base_url(); ?>">

	<style>
		#pagination button {
			cursor: pointer;
			margin: 0 5px;
			padding: 5px 10px;
			color: #76B1A8;
			border: 1px solid #76B1A8;	
		}
		#pagination button:hover {
			color: #fff;
			background-color: #76B1A8;
			/* border: none; */
			/* border: 1px solid #76B1A8;	 */
			
		}
		#pagination .btn-primary {
			color: #fff;
			background-color: #76B1A8;
			border: none;
			padding: 5px 10px;
		}
	</style>
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		
        <!-- header -->
         <?php $this->load->view('partials/navbar') ?>
		<!-- main -->
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Shop</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="<?= base_url() ?>">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Products</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
				<div class="row">
					<div class="col-12 col-lg-9 order-lg-3">
						<!-- content -->
						<article id="content">
							<!-- show-head -->
							<header class="show-head d-flex flex-wrap justify-content-between mb-7">
								<ul class="list-unstyled viewFilterLinks d-flex flex-nowrap align-items-center">
								
									<!-- <li id="results-info" class="mr-2">Showing 1–9 of <?= count($products); ?> results</li> -->
									<li class="mr-2 results-count">Showing all results</li>

								</ul>
								<!-- sortGroup -->
								<div class="sortGroup">
								<div class="d-flex flex-nowrap align-items-center">
									<strong class="groupTitle mr-2">Sort by:</strong>
									<div class="dropdown">
										<button class="dropdown-toggle buttonReset" type="button" id="sortGroup" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Name (A-Z)
										</button>
										<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="sortGroup">
											<li><a href="javascript:void(0);" class="sort-option" data-sort="name-asc">Name (A-Z)</a></li>
											<li><a href="javascript:void(0);" class="sort-option" data-sort="name-desc">Name (Z-A)</a></li>
											<li><a href="javascript:void(0);" class="sort-option" data-sort="price-asc">Price (Low to High)</a></li>
											<li><a href="javascript:void(0);" class="sort-option" data-sort="price-desc">Price (High to Low)</a></li>
										</ul>
									</div>
								</div>

								</div>
							</header>
							<div class="row" id="product-list">
								
								<!-- featureCol -->
								<?php foreach ($products as $product): ?>
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7" data-price="<?= $product->price; ?>">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="<?= $product->thumbnail; ?>"  alt="<?= htmlspecialchars($product->name); ?>" class="img-fluid w-100" style="height: 300px;">
											
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="<?= base_url('products/' . $product->slug); ?>"><?= $product->name; ?></a></span>
											<span class="price d-block fwEbold">Rp. <?= number_format($product->price, 0, ',', '.') ?></span>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
								
				
							</div>
							<div id="pagination" class="d-flex justify-content-center"></div>

						</article>
					</div>
					<div class="col-12 col-lg-3 order-lg-1">
						<!-- sidebar -->
						<aside id="sidebar">
							<!-- widget -->
							<section class="widget overflow-hidden mb-9">
								<form id="search-form" class="searchForm position-relative border">
									<fieldset>
										<input type="search" id="search-input" class="form-control" placeholder="Search product...">
										<button type="button" class="position-absolute"><i class="icon-search"></i></button>
									</fieldset>
								</form>
							</section>
					
							<!-- widget -->
							<section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-6">Filter by price</h3>
								<form action="javascript:void(0);" class="filter-ranger-form">
									<div id="slider-range"></div>
									<input type="hidden" id="amount1" name="amount1">
									<input type="hidden" id="amount2" name="amount2">
									<div class="get-results-wrap d-flex align-items-center justify-content-between">
										<button type="button" class="btn btnTheme btnbtn btnTheme btn-shop-round px-3 pt-1 pb-2 text-uppercase">Filter</button>
										<p id="amount" class="mb-0"></p>
									</div>
								</form>
							</section>
							
						</aside>
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

	<!-- pagination -->
	<!-- <script>
		document.addEventListener("DOMContentLoaded", function () {
			const products = Array.from(document.querySelectorAll("#product-list > div"));
			const paginationContainer = document.getElementById("pagination");
			// const resultsInfo = document.getElementById("results-info");
			const perPage = 9; // Items per page
			let currentPage = 1;

			function renderPage(page) {
				// Hide all products
				products.forEach(product => product.style.display = "none");

				// Calculate start and end indices
				const start = (page - 1) * perPage;
				const end = Math.min(start + perPage, products.length); // Ensure end doesn't exceed the total products

				// Show products for the current page
				products.slice(start, end).forEach(product => product.style.display = "block");

				// Update the results text
				// resultsInfo.textContent = `Showing ${start + 1}–${end} of ${products.length} results`;

				// Update pagination controls
				renderPaginationControls();
			}

			function renderPaginationControls() {
				const totalPages = Math.ceil(products.length / perPage);
				paginationContainer.innerHTML = "";

				for (let i = 1; i <= totalPages; i++) {
					const btn = document.createElement("button");
					btn.textContent = i;
					btn.className = "btn btn-sm mx-1 " + (i === currentPage ? "btn-primary" : "btn-outline-primary");
					btn.addEventListener("click", () => {
						currentPage = i;
						renderPage(currentPage);
					});
					paginationContainer.appendChild(btn);
				}
			}

			// Initial render
			renderPage(currentPage);
		});

	</script> -->

	<!-- search -->
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const searchInput = document.getElementById('search-input');
			const productList = document.getElementById('product-list');
			const products = Array.from(productList.children);

			searchInput.addEventListener('input', () => {
				const query = searchInput.value.toLowerCase();

				products.forEach(product => {
					const productName = product.querySelector('.title a').textContent.toLowerCase();
					if (productName.includes(query)) {
						product.style.display = ''; // Show matching products
					} else {
						product.style.display = 'none'; // Hide non-matching products
					}
				});

				updateResultCount();
			});

			function updateResultCount() {
				const visibleProducts = products.filter(product => product.style.display !== 'none');
				const totalProducts = products.length;
				const resultCount = `Showing ${visibleProducts.length} of ${totalProducts} results`;

				const resultTextElement = document.querySelector('.results-count');
				if (resultTextElement) {
					resultTextElement.textContent = resultCount;
				}
			}

			// Initial count display
			updateResultCount();
		});
	</script>

<!-- sort -->
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const productsContainer = document.getElementById("product-list");
			const products = Array.from(productsContainer.querySelectorAll(".featureCol"));
			
			// Function to sort products based on selected criteria
			function sortProducts(criteria) {
				let sortedProducts;
				
				if (criteria === 'name-asc') {
					sortedProducts = products.sort((a, b) => {
						const nameA = a.querySelector(".title").textContent.toLowerCase();
						const nameB = b.querySelector(".title").textContent.toLowerCase();
						return nameA.localeCompare(nameB);
					});
				} else if (criteria === 'name-desc') {
					sortedProducts = products.sort((a, b) => {
						const nameA = a.querySelector(".title").textContent.toLowerCase();
						const nameB = b.querySelector(".title").textContent.toLowerCase();
						return nameB.localeCompare(nameA);
					});
				} else if (criteria === 'price-asc') {
					sortedProducts = products.sort((a, b) => {
						const priceA = parseFloat(a.querySelector(".price").textContent.replace('Rp.', '').replace(/\./g, '').trim());
						const priceB = parseFloat(b.querySelector(".price").textContent.replace('Rp.', '').replace(/\./g, '').trim());
						return priceA - priceB;
					});
				} else if (criteria === 'price-desc') {
					sortedProducts = products.sort((a, b) => {
						const priceA = parseFloat(a.querySelector(".price").textContent.replace('Rp.', '').replace(/\./g, '').trim());
						const priceB = parseFloat(b.querySelector(".price").textContent.replace('Rp.', '').replace(/\./g, '').trim());
						return priceB - priceA;
					});
				}
				
				// Re-render the sorted products
				productsContainer.innerHTML = '';
				sortedProducts.forEach(product => productsContainer.appendChild(product));
			}

			// Add event listeners to sorting options
			const sortOptions = document.querySelectorAll(".sort-option");
			sortOptions.forEach(option => {
				option.addEventListener("click", function () {
					const selectedSort = option.getAttribute("data-sort");
					// Change the button text to reflect the selected sort option
					document.getElementById("sortGroup").textContent = option.textContent;
					sortProducts(selectedSort);
				});
			});

			// Sort by name (A-Z) on first render
			sortProducts('name-asc');
		});
	</script>


</body>
</html>
