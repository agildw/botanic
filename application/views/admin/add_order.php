<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => 'Add Order']) ?>

<body>
    <script src="assets/admin/static/js/initTheme.js"></script>
    <div id="app">
        <?php $this->load->view('admin/partials/sidebar') ?>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Add Order</h3>
                        <p class="text-subtitle text-muted">Create a new order with user and product details</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/orders') ?>">Orders</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="<?= base_url('admin/add_order_action') ?>" method="post">
                                    <div class="form-body">
                                        <div class="row">
                                            <p class="fw-bold h5">User Information</p>
                                            <div class="col-md-4">
                                                <label for="user_id">User</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select id="user_id" name="user_id" class="form-control">
                                                    <option value="<?= $user->id ?>">
                                                        <?= $user->name ?> (<?= $user->email ?>)
                                                    </option>
                                                </select>
                                            </div>

                                            <p class="fw-bold h5 mt-4">Order Details</p>
                                            <div class="col-md-4">
                                                <label for="total_price">Total Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="total_price" class="form-control" name="total_price" placeholder="Total Price" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="status">Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select id="status" name="status" class="form-control">
                                                    <option value="UNPAID">UNPAID</option>
                                                    <option value="PAID">PAID</option>
                                                    <option value="SHIPPED">SHIPPED</option>
                                                    <option value="DELIVERED">DELIVERED</option>
                                                    <option value="CANCELLED">CANCELLED</option>
                                                    <option value="EXPIRED">EXPIRED</option>
                                                </select>
                                            </div>

                                            <p class="fw-bold h5 mt-4">Shipping Address</p>
                                            <div class="col-md-4">
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name" class="form-control" name="name" placeholder="Recipient Name" value="<?= $user->name ?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone">Phone</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone" value="<?= $user->phone ?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="address">Address</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="address" class="form-control" name="address" placeholder="Address" value="<?= $user->address ?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="city">City</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="city" class="form-control" name="city" placeholder="City" value="<?= $user->city ?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="state">State</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="state" class="form-control" name="state" placeholder="State" value="<?= $user->state ?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="zip">Zip</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="zip" class="form-control" name="zip" placeholder="Zip Code" value="<?= $user->zip ?>" />
                                            </div>

                                            <p class="fw-bold h5 mt-4">Product Details</p>
                                            <div class="col-md-4">
                                                <label for="product_id">Product</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select id="product_id" name="product_id" class="form-control">
                                                    <option value="<?= $product->id ?>">
                                                        <?= $product->name ?> (Rp. <?= number_format($product->price, 0, ',', '.') ?>)
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="quantity">Quantity</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" id="quantity" class="form-control" name="quantity" placeholder="Quantity" min="1" />
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Add Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/partials/footer'); ?>
        </div>
    </div>
    <script src="assets/admin/static/js/components/dark.js"></script>
    <script src="assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/admin/compiled/js/app.js"></script>
</body>

</html>
