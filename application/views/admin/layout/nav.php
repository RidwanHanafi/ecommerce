<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('admin/dashboard'); ?>" class="brand-link">
    <img src="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"
         alt="Esthree"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Esthree</span>
  </a>

    
<!-- Menu Pengguna  -->


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                 <div class="image">
                   <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar2.png"
                   class="img-circle elevation-2" alt="User Image">
                 </div>
                 <div class="info">
                   <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?> -
                     <?php if($this->session->userdata('akses_level')=='Admin'){echo 'Super Admin';}else{echo 'Admin';}?></a>
                 </div>
           </div>
        <li class="nav-item">
         <a href="<?php echo base_url('admin/dashboard') ?>" class=" nav-link <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>Dashboard</p>
           </a>
       </li>
       <style>
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{
          background-color: #ffc107;
          color: #1f2d3d;         
        }
       </style>
       <!-- Transaksi -->
        <li class="nav-item has-treeview">
         <a href="#" class="nav-link">
           <i class="nav-icon fa fa-exchange"></i>
           <p>Transaksi</p>
              <i class="right fas fa-angle-left"></i>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/transaksi') ?>" class="nav-link">
                <i class="fa fa-cubes nav-icon"></i>
                <p>Transaksi Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/transaksi/terima') ?>" class="nav-link">
                <i class="fa fa-check nav-icon"></i>
                <p>Diterima</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?php echo base_url('admin/transaksi/tolak') ?>" class="nav-link">
                <i class="far fa fa-clock-o nav-icon"></i>
                <p>Tertunda</p>
              </a>
            </li> -->
          </ul>
       </li>

       <!-- User -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Pengguna
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/user') ?>" class="nav-link">
                <i class="fas fa-address-card nav-icon"></i>
                <p>Data Pengguna</p>
              </a>
            </li>
            <?php if ($this->session->userdata('akses_level')== 'Admin'): ?>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/user/tambah') ?>" class="nav-link">
                <i class="far fa fa-user-plus nav-icon"></i>
                 <p>Tambah Pengguna</p>
                </a>
            </li>
            <?php endif ?>
            
          </ul>
        </li>

        <!-- Produk -->
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link ">
             <i class="nav-icon fas fa-cookie-bite"></i>
             <p>Produk
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url('admin/produk') ?>" class="nav-link">
                 <i class="fa fa-birthday-cake nav-icon"></i>
                 <p>Data Produk</p>
               </a>
             </li>
              <li class="nav-item">
               <a href="<?php echo base_url('admin/produk/contoh') ?>" class="nav-link">
                 <i class="fa fa-birthday-cake nav-icon"></i>
                 <p>Tampih Hello</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('admin/produk/tambah') ?>" class="nav-link">
                 <i class="far fa fa-plus nav-icon"></i>
                 <p>Tambah Produk</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('admin/kategori') ?>" class="nav-link">
                 <i class="fas fa-shapes nav-icon"></i>
                 <p>Kategori Produk</p>
               </a>
             </li>
           </ul>
         </li>
         <!-- Ongkos Kirim -->
        <li class="nav-item">
         <a href="<?php echo base_url('admin/ongkir') ?>" class=" nav-link <?php if($this->uri->segment(2)=="ongkir"){echo "active";}?>">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>Ongkos Kirim</p>
           </a>
        </li>
        <!-- Laporan -->
         <li class="nav-item">
         <a href="<?php echo base_url('admin/laporan') ?>" class=" nav-link <?php if($this->uri->segment(2)=="laporan"){echo "active";}?>">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>Laporan</p>
           </a>
        </li>

         <!-- Konfigurasi -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-gear fa-spin"></i>
            <p>Konfigurasi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link">
                <i class="fas fa-puzzle-piece nav-icon"></i>
                <p>Umum</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link">
                <i class="fas fa-theater-masks nav-icon"></i>
                <p>Logo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link">
                <i class="fas fa-file-image nav-icon"></i>
                <p>Icon</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content">
    <div class="container">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Admin</a></li>
                <li class="breadcrumb-item active"><?php echo $title ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    </div>
  </div>

 