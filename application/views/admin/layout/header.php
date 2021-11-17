
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url('admin/dashboard'); ?>" class="navbar-brand">
        <img src="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"
         alt="Esthree"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
        <span class="brand-text font-weight-light">Esthree Cake</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url() ?>"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link">Home</a>
          </li>
         <!--  <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li> -->
          
        </ul>

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar py-2 rounded-pill mr-1 pr-5" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar rounded-pill border-0 ml-n5" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>


      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       
      
        <!-- Profil user Dropdown Menu -->
        <li class="dropdown user user-menu">
          <a class="user-panel nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="true" >
        
          <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
          <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar2.png" class="img-circle" alt="User Image">
          </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
          <li class="user-header">
            <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar2.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('nama'); ?> -
                    <?php if($this->session->userdata('akses_level')=='Admin'){echo 'Super Admin';}else{echo 'Admin';}?>
                  <small><?php echo date('d M Y') ?></small>
                </p>
          </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="float-left text-muted text-sm">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="float-right text-muted text-sm">
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
              </li>
      </ul>
    </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->