
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('public/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Homepage
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fa fa-bullhorn"></i>
                    <p>Top Bar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Navigation Bar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fas fa-clone"></i>
                    <p>Carousel</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fas fa-flag"></i>
                    <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Product Gallery</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fa fa-exchange"></i>
                    <p>Product Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                    <i class="nav-icon fas fa-shoe-prints"></i>
                    <p>Footer</p>
                    </a>
                </li>
                </ul>
               </li>
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        Products
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Product Badge</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                            <i class="nav-icon fa fa-cloud-upload"></i>
                            <p>Upload Products</p>
                            </a>
                        </li>
                    </ul>
               </li>
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                        Email
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>Template</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html')?>" class="nav-link">
                            <i class="nav-icon fa fa-envelope-open"></i>
                            <p>Send Email</p>
                            </a>
                        </li>
                    </ul>
               </li>
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-rocket"></i>
                    <p>
                        Performance
                    </p>
                    </a>
               </li>
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-cogs"></i>
                    <p>
                        Website Settings
                    </p>
                    </a>
               </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>