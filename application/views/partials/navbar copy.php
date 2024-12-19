
<header id="header" class="position-relative">
   <!-- headerHolderCol -->
   <div class="headerHolder container pt-lg-5 pb-lg-7 py-4">
      <div class="row">
         <div class="col-6 col-sm-2">
            <!-- mainLogo -->
            <div class="logo">
               <a href="<?= site_url('/'); ?>"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
            </div>
         </div>
         <div class="col-6 col-sm-7 col-lg-8 static-block">
            <!-- mainHolder -->
            <div class="mainHolder pt-lg-5 pt-3 	justify-content-center">
               <!-- pageNav2 -->
               <nav class="navbar navbar-expand-lg navbar-light p-0 pageNav2 position-static">
                  <button type="button" class="navbar-toggle collapsed position-relative" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav mx-auto text-uppercase d-inline-block">
                        <li class="nav-item">
                           <a class="d-block" href="<?= site_url('/'); ?>">home</a>
                        </li>
                        <li class="nav-item">
                           <a class="d-block" href="<?= site_url('/products'); ?>"
                              >Store</a>
                        </li>
                        <li class="nav-item">
                           <a class="d-block" href="<?= site_url('/about'); ?>">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="d-block" href="<?= site_url('/contact'); ?>">Contact</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         
         <div class="col-sm-3 col-lg-2">
            <!-- wishListII -->
            <ul class="nav nav-tabs wishListII pt-5 justify-content-end border-bottom-0">
               
               <li class="nav-item">
                  <a class="nav-link position-relative icon-cart" href="<?= site_url('/cart'); ?>">
                     <span class="num rounded d-block text-center" style="width: 1.8em; height:1.5em;">
                        <p class="text-center">
                           <?php echo(get_cart_item_count()); ?>
                        </p>
                     </span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link icon-profile" href="<?= $this->session->userdata('id') ? site_url('/profile') : site_url('/auth/login'); ?>"></a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</header>