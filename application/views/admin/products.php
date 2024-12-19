
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => 'Products']) ?>

<body>
    <script src="assets/admin/static/js/initTheme.js"></script>
    <div id="app">
    <?php $this->load->view('admin/partials/sidebar') ?>
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
                <h3>Products</h3>

                <p class="text-subtitle text-muted">
                    This page shows the list of products
                </p>
                <a href="<?= base_url('admin/products/add') ?>" class="btn btn-primary mb-3">Add Product</a>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                   
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($products as $product): ?>
                                        <tr style="cursor: pointer;" onclick="window.location='<?= base_url('admin/products/' . $product->id) ?>'">
                                            <td><?= $product->name ?></td>
                                            <td>Rp. <?= number_format($product->price, 0, ',', '.') ?></td>
                                            <td><?= $product->quantity ?></td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Basic Tables end -->

    
</div>

    <?php $this->load->view('admin/partials/footer') ?>
        
    </div>
    <script src="assets/admin/static/js/components/dark.js"></script>
    <script src="assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="assets/admin/compiled/js/app.js"></script>
    
    <script>

    </script>
    
</body>

</html>