 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                <?php 
                  echo $transaksi_masuk
                ?>
                </h3>

                <p>Pesanan baru</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-basket "></i>
              </div>
              <a href="<?php echo base_url('admin/transaksi') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?php 
                  echo $transaksi_terima
                ?>
                <!-- <sup style="font-size: 20px">%</sup> -->
                </h3>

                <p>Konfirmasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-smile-o"></i>
              </div>
              <a href="<?php echo base_url('admin/transaksi/terima') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?php 
                echo $transaksi_tolak
                ?>
                </h3>
                <p>Belum Konfirmasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-frown-o"></i>
              </div>
              <a href="<?php echo base_url('admin/transaksi/tolak') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Rp. 

                  <?php 
                  $jumlah=0;
                  foreach ($pemasukan as $pemasukan) {
                    $date = date('Y-m-d',strtotime('-30 days', strtotime($pemasukan->tanggal_update)));  
                    $date_now = date('Y-m-d');
                    $start_date = new DateTime($date);
                    $end_date = new DateTime($date_now);
                    $interval = $start_date->diff($end_date);
                    if($interval->days >=30 ){

                    $jumlah+= $pemasukan->jumlah_bayar;
                    }else{
                      echo "0";
                    }
                  }echo number_format($jumlah,'0',',','.') ?>
                </h3>



                <!-- <?php 
                  $jumlah=0;
                  foreach ($pemasukan as $pemasukan) {
                    
                     $jumlah+= $pemasukan->jumlah_bayar;

                  } echo number_format($jumlah,'0',',','.') ?>
 -->

                <p>Pemasukan 30 hari terakhir
                  <?php 
                  $date = date("d M Y");
                  $date_start = date("d M Y", strtotime('-30 days'));
                  echo  $date_start ." - ". $date ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-money "></i>
              </div>
              <a href="#" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?php 
                echo $jumlah_admin;
                ?>
                </h3>
                <p>Data Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-o"></i>
              </div>
              <a href="<?php echo base_url('admin/user') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
  </div>
</section>