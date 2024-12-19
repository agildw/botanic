<!-- TODO: -->
<!-- - FIX remove item button disappear after quantity update -->
<!-- - FIX subtotal after quantity update only show subtotal of the product updated -->
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
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<?php $this->load->view('partials/navbar') ?>
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">My Cart</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
                                <li class="mr-2"><a href="<?= base_url() ?>">Home</a></li>
								<li class="mr-sm-2 mr-1">/</li>
								<li class="active">My Cart</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- cartHolder -->
			<div class="cartHolder container pt-xl-21 pb-xl-24 py-lg-20 py-md-16 py-10">
				<div class="row">
					<!-- table-responsive -->
					<div class="col-12 table-responsive mb-xl-22 mb-lg-20 mb-md-16 mb-10">
						<!-- cartTable -->
						<table class="table cartTable">
							<thead>
								<tr>
									<th scope="col" class="text-uppercase fwEbold border-top-0">product</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0">price</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0">quantity</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0">total</th>
								</tr>
							</thead>
							<tbody>
                                <!-- loop $cart -->
                                <?php foreach($cart as $item): ?>
                                    <tr class="align-items-center" data-id="<?= $item['id'] ?>">
                                        <td class="d-flex align-items-center border-top-0 border-bottom px-0 py-6">
                                            <div class="imgHolder">
                                                <img src="<?= $item['thumbnail'] ?>" alt="image description" class="img-fluid">
                                            </div>
                                            <span class="title pl-2"><a href="<?= site_url('products/' . $item['slug']) ?>"><?= $item['name'] ?></a></span>
                                        </td>
                                        <td class="fwEbold border-top-0 border-bottom px-0 py-6">Rp. <?= number_format($item['price'], 0, ',', '.') ?></td>
                                        <td id="quantity" class="border-top-0 border-bottom px-0 py-6">
                                            <input name="quantity" type="number" placeholder="1" value="<?= $item['quantity'] ?>">
                                        </td>
                                        <td class="fwEbold border-top-0 border-bottom px-0 py-6" 
                                        id="total-price">Rp. <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                            <a href="javascript:void(0);" class="fas fa-times float-right remove-item"></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- end loop -->
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
		
                    <div class="col-12 col-md-4 offset-md-8">
                        <div class="d-flex justify-content-between">
                            <strong class="txt fwEbold text-uppercase mb-1">subtotal</strong>
                            <strong class="price fwEbold text-uppercase mb-1" id="subtotal">Rp. <?= number_format($subtotal, 0, ',', '.') ?></strong>
                        </div>
                        
						<a href="<?= site_url('checkout') ?>" class="btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">Proceed to checkout</a>
                    </div>
				</div>
			</div>
		
			
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
        $(document).ready(function () {
            // Update quantity
            $(document).on('change', 'input[type="number"]', function () {
                const $row = $(this).closest('tr');
                const id = $row.data('id');
                const quantity = $(this).val();

                $.post('<?= site_url('cart/update_quantity') ?>', { id: id, quantity: quantity }, function (response) {
                    if (response.success) {
                        $row.find('#total-price').text(`Rp. ${new Intl.NumberFormat().format(response.subtotal)}`);
                        $('#subtotal').text(`Rp. ${new Intl.NumberFormat().format(response.subtotal)}`);
                    }
                }, 'json');
            });

            // Remove item
            $(document).on('click', '.remove-item', function () {
                const $row = $(this).closest('tr');
                const id = $row.data('id');

                $.post('<?= site_url('cart/remove_item') ?>', { id: id }, function (response) {
                    if (response.success) {
                        $row.remove();
                        $('#subtotal').text(`Rp. ${new Intl.NumberFormat().format(response.subtotal)}`);
                    }
                }, 'json');
            });
        });
    </script>

</body>
</html>