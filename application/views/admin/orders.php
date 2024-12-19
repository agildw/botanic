
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => 'Orders']) ?>
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
                <h3>Orders</h3>

                <p class="text-subtitle text-muted">
                    This page shows the list of orders
                </p>
                <!-- <a href="<?= base_url('admin/orders/add') ?>" class="btn btn-primary mb-3">Add Order</a> -->
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Status</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($orders as $order): ?>
                                        <tr style="cursor: pointer;" data-href="<?= base_url('admin/orders/' . $order['order_code']); ?>">
                                            <td><?= $order['order_code']; ?></td>
                                            <td>
                                                <span class="badge 
                                                    <?php 
                                                        if ($order['status'] == 'PAID') {
                                                            echo 'bg-success';
                                                        } elseif ($order['status'] == 'UNPAID') {
                                                            echo 'bg-warning';
                                                        } elseif ($order['status'] == 'EXPIRED') {
                                                            echo 'bg-danger';
                                                        }
                                                    ?>">
                                                    <?= $order['status']; ?>
                                                </span>
                                            </td>
                                            <td>Rp. <?= number_format($order['total_price'], 0, ',', '.') ?></td>
                                            <td> <?= date('d M Y, H:i', strtotime($order['created_at'])); ?></td>
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
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tr[data-href]');
            rows.forEach(row => {
                row.addEventListener('click', () => {
                    window.location.href = row.dataset.href;
                });
            });
        });
    </script>
    
</body>

</html>