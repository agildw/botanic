<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => 'Dashboard - Botanic']) ?>

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
         <h3>Profile Statistics</h3>
      </div>
      <div class="page-content">
         <section class="row">
            <div class="col-12 col-lg-9">
               <div class="row">
                  <div class="col-6 col-lg-4 col-md-6">
                     <div class="card">
                        <div class="card-body px-4 py-4-5">
                           <div class="row">
                              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                 <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                 </div>
                              </div>
                              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                 <h6 class="text-muted font-semibold">Users</h6>
                                 <h6 class="font-extrabold mb-0">
                                    <?= count($users) ?>
                                 </h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 col-lg-4 col-md-6">
                     <div class="card">
                        <div class="card-body px-4 py-4-5">
                           <div class="row">
                              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                 <div class="stats-icon red mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                 </div>
                              </div>
                              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                 <h6 class="text-muted font-semibold">Products</h6>
                                 <h6 class="font-extrabold mb-0">
                                    <?= count($products) ?>
                                 </h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 col-lg-4 col-md-6">
                     <div class="card">
                        <div class="card-body px-4 py-4-5">
                           <div class="row">
                              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                 <div class="stats-icon green mb-2">
                                    <i class="iconly-boldBuy"></i>
                                 </div>
                              </div>
                              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                 <h6 class="text-muted font-semibold">Orders</h6>
                                 <h6 class="font-extrabold mb-0">
                                    <?= count($orders) ?>
                                 </h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h4>Orders Statistics</h4>
                        </div>
                        <div class="card-body">
                           <div id="chart-profile-visit"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-lg-3">
               <div class="card">
                  <div class="card-body py-4 px-4">
                     <div class="d-flex align-items-center  align-items-center ">
                        <div class="avatar avatar-xl">
                           <img src="./assets/admin/compiled/jpg/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                           <h5 class="font-bold"><?= $this->session->userdata('name') ?></h5>
                           <!-- <h7 class="text-muted mb-0"><?= $this->session->userdata('email') ?></h6> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <h4>Recent Users</h4>
                  </div>
                  <div class="card-content pb-4">
                     <div class="recent-message d-flex px-4 py-3  align-items-center ">
                        <div class="avatar avatar-lg">
                           <img src="./assets/admin/compiled/jpg/4.jpg">
                        </div>
                        <div class="name ms-4">
                           <h5>
                              <?= isset($users[0]->name) ? $users[0]->name : 'Manusia' ?>
                           </h5>
                        </div>
                     </div>
                     <div class="recent-message d-flex align-items-center px-4 py-3">
                        <div class="avatar avatar-lg">
                           <img src="./assets/admin/compiled/jpg/5.jpg">
                        </div>
                        <div class="name ms-4">
                           <h5>
                              <?= isset($users[1]->name) ? $users[1]->name : 'Manusia' ?>
                           </h5>
                        </div>
                     </div>
                     <div class="recent-message d-flex px-4 py-3  align-items-center ">
                        <div class="avatar avatar-lg">
                           <img src="./assets/admin/compiled/jpg/1.jpg">
                        </div>
                        <div class="name ms-4">
                           <h5>
                              <?= isset($users[2]->name) ? $users[2]->name : 'Manusia' ?>
                           </h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <?php $this->load->view('admin/partials/footer') ?>
   </div>
</div>
<script src="assets/admin/static/js/components/dark.js"></script>
<script src="assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/admin/compiled/js/app.js"></script>
<!-- Need: Apexcharts -->
<script src="assets/admin/extensions/apexcharts/apexcharts.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<!-- <script src="assets/admin/static/js/pages/dashboard.js"></script> -->

<?php
// Generate last 7 days
$last7Days = [];
$order_created_count = [];
for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $last7Days[] = date('d M', strtotime($date));
    $order_created_count[$date] = 0; // Initialize count
}

// Count orders created per day
foreach ($orders as $order) {
    $date = date('Y-m-d', strtotime($order['created_at']));
    if (isset($order_created_count[$date])) {
        $order_created_count[$date]++;
    }
}

// Convert counts to array of values
$order_created_count_values = array_values($order_created_count);
?>

 <script>


var optionsProfileVisit = {
  annotations: {
    position: "back",
  },
  dataLabels: {
    enabled: false,
  },
  chart: {
    type: "bar",
    height: 300,
  },
  fill: {
    opacity: 1,
  },
  plotOptions: {},
  series: [
    {
      name: "Order Created",
      data: <?= json_encode(array_values($order_created_count)) ?>,
    },
  ],
  colors: "#435ebe",
  xaxis: {
   categories: <?= json_encode($last7Days) ?>,
   // categories: [
   //   "Monday",
   //   "Tuesday",
   //   "Wednesday",
   //   "Thursday",
   //   "Friday",
   //   "Saturday",
   //   "Sunday",
   //  ],
  },
}

var chartProfileVisit = new ApexCharts(
  document.querySelector("#chart-profile-visit"),
  optionsProfileVisit
)

chartProfileVisit.render()
</script>

</body>

</html>