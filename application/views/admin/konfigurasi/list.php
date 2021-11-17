<?php
//jika terjadi error dalam upload
if (isset($error)) {
  echo '<div class = "alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Maaf, </strong>
        <p>Ukuran gambar yang diupload terlalu besar</P>
        <button type="button" class="close" data-dismiss="alert" aria=label="Close">
        <span aria-hidden="true">&times;</span></button>';
  echo '</div>';
  # code...
}

  echo validation_errors('<div class="alert alet-warning">', '</div>');

  //Form tambah dan upload gambar(multipart)
  echo form_open_multipart(base_url('admin/konfigurasi'), ' class="quick-example"');
?>

  <!-- /.card-header -->
<section class="content">
  <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <?php
              //notif jika data berhasil ditambah
              if($this->session->flashdata('sukses')){
                // echo '<p class="alert alert-success">';

                echo '<p class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check-circle"></i>';

                echo $this->session->flashdata('sukses');
              }
              echo '</p>'
              ?>
            <div class="card">
              <div class="card-body">
              <!-- form start -->
              <form role="form">
                <div class=" card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class=" form-group">
                      <label>Nama Website</label>
                      <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required oninvalid="this.setCustomValidity('Masukan Nama Website!')" oninput="setCustomValidity('')">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tagline</label>
                        <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline  ?>" required oninvalid="this.setCustomValidity('Masukan Kode Produk!')" oninput="setCustomValidity('')">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required oninvalid="this.setCustomValidity('Masukan Email!')" oninput="setCustomValidity('')">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Telepon</label>
                      <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon  ?>" required oninvalid="this.setCustomValidity('Masukan Nomor Telepon!')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Website</label>
                      <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website  ?>" required oninvalid="this.setCustomValidity('Masukan Kode Produk!')" oninput="setCustomValidity('')">
                  </div>
                </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Instagram</label>
                      <input type="url" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required oninvalid="this.setCustomValidity('Masukan Alamat Instagram!')" oninput="setCustomValidity('')">
                      <span class="stext-111 text-danger"><img src="<?php echo base_url()?>assets/template2/images/icons/exclamation-mark.png ?>"> 
                      Contoh: https://www.Instagram.com/esthree_cake_n_bakery</span>
                  </div>
                </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Facebook</label>
                      <input type="urt" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" required oninvalid="this.setCustomValidity('Masukan Alamat Facebook!')" oninput="setCustomValidity('')">
                      <span class="stext-111 text-danger"><img src="<?php echo base_url()?>assets/template2/images/icons/exclamation-mark.png ?>"> 
                      Contoh: https://www.facebook.com/pages/Esthree-Cake-N-Cookies/676564419398835</span>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                    <label>Alamat Toko</label>
                      <input type="text" name="alamat" class="form-control" placeholder="Alamat Toko" value="<?php echo $konfigurasi->alamat  ?>" required oninvalid="this.setCustomValidity('Masukan Alamat!')" oninput="setCustomValidity('')">
                  </div>
                  
                   <div class="form-group">
                    <label>Rekening Pembayaran</label>
                    <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran" required oninvalid="this.setCustomValidity('Masukan Rekening!')" oninput="setCustomValidity('')"><?php echo $konfigurasi->rekening_pembayaran ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Keyword</label>
                    <textarea name="keyword" class="form-control" placeholder="Keyword" required oninvalid="this.setCustomValidity('Masukan Keyword!')" oninput="setCustomValidity('')"><?php echo $konfigurasi->keyword ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Metatext</label>
                    <textarea name="metatext" class="form-control" placeholder="Metatext" required oninvalid="this.setCustomValidity('Masukan Metatext!')" oninput="setCustomValidity('')"><?php echo $konfigurasi->metatext ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required oninvalid="this.setCustomValidity('Masukan Deskripsi!')" oninput="setCustomValidity('')"><?php echo $konfigurasi->deskripsi ?></textarea>
                  </div>

       
                  <div class="card-footer" style="background-color: rgba(245, 245, 245, 0);">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="submit" class="btn btn-default float-right">Reset</button>
                </div>
                </div>
                <!-- /.card-body -->
              </form>


             </div>
           </div>
           <!-- /.card -->
          </div>
        </div>
      </div>
  </div>
</section>

<?php echo form_close(); ?>
