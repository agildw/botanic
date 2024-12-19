<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head', ['title' => $user['name'] . ' - Users']) ?>

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
               <h3><?= $user['name'] ?></h3>
               <p class="text-subtitle text-muted">
                  This page shows the details of the user
               </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
               <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="<?= base_url('admin/users') ?>">Users</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?= $user['name'] ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
      <div class="row match-height">
         <div class=" col-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Update User</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     <form class="form form-horizontal" action="<?= base_url('admin/update_user_action'). '/' . $user['id'] ?>" method="post">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <label for="name">Name</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Name" value="<?= $user['name'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="password">Password</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Password"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="email">Email</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="email" id="email" class="form-control" name="email"
                                    placeholder="email" value="<?= $user['email'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="phone">Phone</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="phone" class="form-control" name="phone"
                                    placeholder="phone" value="<?= $user['phone'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="city">City</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="city" class="form-control" name="city"
                                    placeholder="City" value="<?= $user['city'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="state">State</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="state" class="form-control" name="state"
                                    placeholder="State" value="<?= $user['state'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="zip">Zip</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="zip" class="form-control" name="zip"
                                    placeholder="Zip" value="<?= $user['zip'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="address">Address</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="address" class="form-control" name="address"
                                    placeholder="address" value="<?= $user['address'] ?>"/>
                              </div>
                              <div class="col-md-4">
                                 <label for="role">Role</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <select id="role" name="role" class="form-control">
                                 <option value="USER" <?= $user['role'] == 'user' ? 'selected' : '' ?>>🤓User</option>
                                 <option value="ADMIN" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>😎Admin</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label for="registered_at">Registered At</label>
                              </div>
                              <div class="col-md-8 form-group">
                                 <input type="text" id="registered_at" class="form-control" name="registered_at"
                                    placeholder="registered_at" value="<?= $user['created_at'] ?>" disabled/>
                              </div>
                              <div class="col-sm-12 d-flex justify-content-end">
                                 <a href="<?= base_url('admin/delete_user/' . $user['id']) ?>" class="btn btn-danger me-1 mb-1">Delete</a>
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