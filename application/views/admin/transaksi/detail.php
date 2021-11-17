  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/css/custom.css">

<?php 
echo form_open('admin/transaksi/detail/'.$header_transaksi->order_id)


?>


<section class="content">
  <div class="content-wrapper">
    <div class="container">
      <form role="form" >
        <div class="card" style="background-color: #d4d5d6">
          <div class="text-center form p-4">
            <div class="px-2">
            <div class="p-k-k card-deck"> 
              <div class="card shadow-lg bg-white">
                <div class="">
              </div>
                <div class="card-body">
                 <div class="row justify-content-center">
                    <table class="center" style="width: 100%;" id="example1">
                        <tr>
                          <th style="text-align: left; padding-left: 30px;">Kode Transaksi</th>
                            <td style="text-align: right; padding-right: 30px; height: 40px;font-weight: bold; font-size: 15px;"><?php echo $header_transaksi->order_id?></td>
                        </tr>
                        <tr>
                          <th style="text-align: left; padding-left: 30px;font-weight: normal;">Atas Nama</th>
                            <td style="text-align: right; padding-right: 30px;height:40px;"><?php echo $atas_nama->nama_pelanggan?></td>
                        </tr>
                        <tr>
                          <th style="text-align: left; padding-left: 30px;font-weight: normal;">Tanggal Transaksi</th>
                            <td style="text-align: right; padding-right: 30px; height: 40px;"><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: left; padding-left: 30px;font-weight: normal;">Alamat</th>
                            <td style="text-align: right; padding-right: 30px; height: 40px;">Kec. <?php echo $header_transaksi->kecamatan,', desa ',$header_transaksi->desa,' (', $header_transaksi->alamat,')' ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: left; padding-left: 30px;font-weight: normal;">Ongkos Kirim</th>
                            <td style="text-align: right; padding-right: 30px; height: 40px;">+Rp. <?php echo number_format($header_transaksi->jumlah,'0',',','.')  ?></td>
                        </tr>
                         <tr>
                          <th style="text-align: left; padding-left: 30px;">Total Pembayaran</th>
                            <td style="text-align: right; padding-right: 30px; height: 40px;font-weight: bold; font-size: 15px;">Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.')  ?></td>
                        </tr>
                        <tr>
                          <th style="text-align: left; padding-left: 30px;">Status Bayar</th>
                            <td style="text-align: right; padding-right: 30px; height: 40px;font-size: 15px;"><?php if($header_transaksi->transaction_status=='settlement'){echo '<span style="color:Green; font-weight:bold;">Berhasil</span>';}?></td>
                        </tr>
                      </table>
                   <!--    <a class="btn btn-success" href="" onclick="window.print()"><i class="fas fa-file-pdf">
                    </i> Cetak</a> -->
                     <a class="btn btn-success" href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->order_id) ?>"><i class="fas fa-file-pdf">
                    </i> Cetak</a>
                </div>
              </div>
            </div>
          </div>
   

          <div class="card-deck card-detail-transaksi">
            <div class="card shadow-lg bg-white">
              <div class="card-body">
              <table class="table table-hover table-responsive-md">
                <thead class="thead-dark">
                  <tr>
                    <th class="bold-1">NO</th>
                    <th class="bold-1">KODE</th>
                    <th class="bold-1">NAMA PRODUK</th>
                    <th class="padding-5">JUMLAH</th>
                    <th class="padding-5">HARGA</th>
                    <th class="padding-5">SUB TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($transaksi as $transaksi) {?>
                  <tr>
                    <th class="unbold"><?php echo $i ?></th>
                    <th class="unbold"><?php echo $transaksi->kode_produk ?></th>
                    <th class="unbold-1"><?php echo $transaksi->nama_produk ?></th>
                    <th class="unbold-2"><?php echo number_format($transaksi->jumlah) ?></th>
                    <th class="unbold-2">Rp. <?php echo number_format($transaksi->harga,'0',',','.') ?></th>
                    <th class="unbold-2">Rp. <?php echo number_format($transaksi->total_harga,'0',',','.') ?></th>
                  </tr>
                <?php $i++; } ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <?php if ($header_transaksi->konfirmasi=='sudah'): ?>
             <div class="hapus-tombol p-k-k">    
                <div class="card align-items-center d-flex justify-content-center">
                <div class="card-body">               
                  <div class="custom-control custom-checkbox" ><input name="pilihan" class="custom-control-input" type="checkbox" id="customCheckbox1" value="sudah"   checked="checked" onclick="return false;">
                    <label for="customCheckbox1" class="custom-control-label">Pemesanan Sudah Terkonfirmasi</label></div>
                </div>
                 <!--  <div style="padding-top: 10px; padding-bottom: 10px" >
                    <button type="submit" class="btn btn-info btn-lg btn rounded-pill">Konfirmasi</button>
                  </div> -->
                </div>
              </div>
             <!-- <?php elseif ($header_transaksi->konfirmasi=='belum') : ?>
             <div class="hapus-tombol p-k-k">    
                <div class="card align-items-center d-flex justify-content-center">
                <div class="card-body">               
                  <div class="custom-control custom-checkbox" ><input name="pilihan" class="custom-control-input" type="checkbox" id="customCheckbox1" value="sudah" required oninvalid="this.setCustomValidity('Konfirmasi pemesanan belum dipilih!')" oninput="setCustomValidity('')">
                    <label for="customCheckbox1" class="custom-control-label">Konfirmasi Pemesanan</label></div>
                </div>
                  <div style="padding-top: 10px; padding-bottom: 10px" >
                    <button type="submit" class="btn btn-info btn-lg btn rounded-pill">Konfirmasi</button>
                  </div>
                </div>
              </div> -->
              <?php else: ?>
              <div class="hapus-tombol p-k-k">    
                <div class="card align-items-center d-flex justify-content-center">
                <div class="card-body">               
                  <div class="custom-control custom-checkbox" ><input name="pilihan" class="custom-control-input" type="checkbox" id="customCheckbox1" value="sudah" required oninvalid="this.setCustomValidity('Konfirmasi pemesanan belum dipilih!')" oninput="setCustomValidity('')">
                    <label for="customCheckbox1" class="custom-control-label">Konfirmasi Pemesanan dan Pengemasan</label></div>
                </div>
                  <div style="padding-top: 10px; padding-bottom: 10px" >
                    <button type="submit" class="btn btn-info btn-lg btn rounded-pill">Konfirmasi</button>
                  </div>
                </div>
                </div>
              <?php endif ?>
      </form>
      </div>
    </div>
  <!-- </div> -->
</section>
<?php echo form_close(); ?>

