<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => $order['order_code'] . ' - Orders']) ?>
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
               <h3>#<?= $order['order_code'] ?></h3>
               <p class="text-subtitle text-muted">
                  This page shows the details of the order
               </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
               <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="<?= base_url('admin/orders') ?>">Orders</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?= $order['order_code'] ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
      
      <div class="row match-height">
         <div class=" col-12">
            <div class="card">
               <div class="card-content">
                  <div class="card-body">
                     <form class="form form-horizontal" action="<?= base_url('admin/update_order_action'). '/' . $order['order_code'] ?>" method="post">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <label for="order_code">Order ID</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="order_code" class="form-control" order_code="order_code"
                                    placeholder="order_code" value="<?= $order['order_code'] ?>" disabled/>
                              </div>
                              <div class="col-md-4">
                                 <label for="total_price">Total</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="total_price" class="form-control" name="total_price"
                                    placeholder="Total" value="<?= $order['total_price'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="status">Status</label>
                              </div>
                              <div class="col-md-8 form-group">
                                  <select id="status" name="status" class="form-control">
                                    <option value="UNPAID" <?= $order['status'] == 'UNPAID' ? 'selected' : '' ?>>UNPAID</option>
                                    <option value="PAID" <?= $order['status'] == 'PAID' ? 'selected' : '' ?>>PAID</option>
                                    <option value="SHIPPED" <?= $order['status'] == 'SHIPPED' ? 'selected' : '' ?>>SHIPPED</option>
                                    <option value="DELIVERED" <?= $order['status'] == 'DELIVERED' ? 'selected' : '' ?>>DELIVERED</option>
                                    <option value="CANCELLED" <?= $order['status'] == 'CANCELLED' ? 'selected' : '' ?>>CANCELLED</option>
                                    <option value="EXPIRED" <?= $order['status'] == 'EXPIRED' ? 'selected' : '' ?>>EXPIRED</option>
                                  </select>
                                </div>
                              <div class="col-md-4">
                                 <label for="payment_url">Payment URL</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="payment_url" class="form-control" name="payment_url"
                                    placeholder="Payment URL" value="<?= $order['payment_url'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="payment_method">Payment Method</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="payment_method" class="form-control" name="payment_method"
                                    placeholder="Payment Method" value="<?= $order['payment_method'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="paid_at">Paid At</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="paid_at" class="form-control" name="paid_at"
                                    placeholder="Paid At" value="<?= $order['paid_at'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="created_at">Order Date</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="created_at" class="form-control" name="created_at"
                                    placeholder="Order Date" value="<?= $order['created_at'] ?>"/>
                              </div>
                              <!-- shipping address -->
                              <p class="fw-bold h5 mt-4">Shipping Address</p>
                              <div class="col-md-4">
                                 <label for="name">Name</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Name" value="<?= $order['name'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="phone">Phone</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="phone" class="form-control" name="phone"
                                    placeholder="Phone" value="<?= $order['phone'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="address">Address</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="address" class="form-control" name="address"
                                    placeholder="Address" value="<?= $order['address'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="city">City</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="city" class="form-control" name="city"
                                    placeholder="City" value="<?= $order['city'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="state">State</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="state" class="form-control" name="state"
                                    placeholder="State" value="<?= $order['state'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="zip">Zip</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="zip" class="form-control" name="zip"
                                    placeholder="Zip" value="<?= $order['zip'] ?>"/>
                              </div>
                              <div class="col-sm-12 d-flex justify-content-end">
                                  <a href="<?= base_url('admin/delete_order/' . $order['order_code']) ?>" class="btn btn-danger me-1 mb-1">Delete</a>
                                 <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    
                                 
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <h3 class="fwEbold mb-4">Product Details</h3>
         <?php foreach ($order['products'] as $product): ?>
         <div class="card shadow-sm mb-3">
            <div class="row no-gutters">
                    <div class="col-md-2 d-flex align-items-center">
                      <img src="<?= $product['product_image'] ?>" class="img-fluid rounded" alt="<?= $product['product_name'] ?>">
                    </div>
               <div class="col-md-10">
                  <div class="card-body">
                     <h5 class="card-title
                     "><?= $product['product_name'] ?></h5>
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
   <?php $this->load->view('admin/partials/footer'); ?>
</div>
</div>
<script src="assets/admin/static/js/components/dark.js"></script>
<script src="assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/admin/compiled/js/app.js"></script>
    
</body>
</html>