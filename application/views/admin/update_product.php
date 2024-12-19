<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => $product['name'] . ' - Products']) ?>

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
               <h3><?= $product['name'] ?></h3>
               <p class="text-subtitle text-muted">
                  This page shows the details of the product
               </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
               <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="<?= base_url('admin/products') ?>">Products</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?= $product['name'] ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
      <div class="row match-height">
         <div class=" col-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Horizontal Form</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     <form class="form form-horizontal" action="<?= base_url('admin/update_product_action'). '/' . $product['id'] ?>" method="post">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <label for="name">Name</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Name" value="<?= $product['name'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="slug">Slug</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="slug" class="form-control" name="slug"
                                    placeholder="Slug" value="<?= $product['slug'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="price">Price</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="number" id="price" class="form-control" name="price"
                                    placeholder="Price" value="<?= $product['price'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="quantity">Stock</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="number" id="quantity" class="form-control" name="quantity"
                                    placeholder="Stock" value="<?= $product['quantity'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="thumbnail">Image</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="thumbnail" class="form-control" name="thumbnail"
                                    placeholder="Thumbnail" value="<?= $product['thumbnail'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="description">Description</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <textarea type="description" id="description" class="form-control" name="description" placeholder="Description" style="padding: 10px; margin: 0; height: 150px;"><?= $product['description'] ?></textarea>
                              </div>
                              </div>
                              <div class="col-sm-12 d-flex justify-content-end">
                                 <!-- delete button -->
                                  <a href="<?= base_url('admin/delete_product/' . $product['id']) ?>" class="btn btn-danger me-1 mb-1">Delete</a>
                                 <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php $this->load->view('admin/partials/footer') ?>
</div>
</div>
<script src="assets/admin/static/js/components/dark.js"></script>
<script src="assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/admin/compiled/js/app.js"></script>
    
</body>

</html>