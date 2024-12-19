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
    <style>
        #address-form .form-group {
            margin-bottom: 15px;
        }

        #address-form label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

    </style>
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
							<h1 class="headingIV fwEbold playfair mb-4">Checkout</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
                                <li class="mr-2"><a href="<?= base_url() ?>">Home</a></li>
								<li class="mr-sm-2 mr-1">/</li>
								<li class="active">Checkout</li>
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
                                        <td id="quantity" class="fwEbold border-top-0 border-bottom px-0 py-6">
                                            <!-- <input name="quantity" type="number" placeholder="1" value="<?= $item['quantity'] ?>"> -->
                                            <?= $item['quantity'] ?>
                                        </td>
                                        <td class="fwEbold border-top-0 border-bottom px-0 py-6" 
                                        id="total-price">Rp. <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- end loop -->
							</tbody>
						</table>
					</div>
				</div>
		

                <div class="row">
                    <div class="col-12">
                        <h2 class="headingIV fwEbold playfair mb-4">Shipping Address</h2>
                        <form id="address-form" method="POST" action="<?= site_url('checkout/process') ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="full-name" class="fwEbold">Full Name</label>
                                    <input type="text" id="full-name" name="full_name" class="form-control" placeholder="Enter your full name" required style="background-color: white;" value="<?= $user['name'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone" class="fwEbold">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required style="background-color: white;" value="<?= $user['phone'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="fwEbold">State</label>
                                <input type="text" id="state" name="state" class="form-control" placeholder="Enter your state" required style="background-color: white;" value="<?= $user['state'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="city" class="fwEbold">City</label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city" required style="background-color: white;" value="<?= $user['city'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="postal-code" class="fwEbold">Postal Code</label>
                                <input type="text" id="postal-code" name="postal_code" class="form-control" placeholder="Enter your postal code" required style="background-color: white;" value="<?= $user['zip'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="address" class="fwEbold">Address</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" required style="background-color: white;" value="<?= $user['address'] ?>">
                            </div>

                            <div class="col-12 col-md-5 offset-md-7 mt-6">
                                <div class="d-flex justify-content-between">
                                    <strong class="txt fwEbold text-uppercase mb-1">Subtotal</strong>
                                    <strong class="price fwEbold text-uppercase mb-1" id="subtotal">Rp. <?= number_format($subtotal, 0, ',', '.') ?></strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong class="txt fwEbold text-uppercase mb-1">Shipping</strong>
                                    <strong class="price fwEbold text-uppercase mb-1">Free</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong class="txt fwEbold text-uppercase mb-1">Total</strong>
                                    <strong class="price fwEbold text-uppercase mb-1" id="total">Rp. <?= number_format($subtotal, 0, ',', '.') ?></strong>
                                </div>
                                <!-- Tombol Checkout -->
                                <button type="submit" class="btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">
                                    Checkout
                                </button>
                            </div>
                        </form>
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