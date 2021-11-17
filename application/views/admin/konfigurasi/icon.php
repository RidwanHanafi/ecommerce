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
  echo form_open_multipart(base_url('admin/konfigurasi/icon'), ' class="quick-example"');
?>


<section class="content">
  <!-- <div class="content-wrapper"> -->
    <div class="container">
      <form role="form">
        <div class="card">
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <div class="px-2">
              <div class="form-group">
                  <label>Nama Web</label>
                  <input type="text" name="namaweb" class="form-control text-center" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required oninvalid="this.setCustomValidity('Masukan Nama Website!')" oninput="setCustomValidity('')">
              </div>
            <div class="row">
              <div class="col-sm-7">
              <label> </label>
              <div class="form-group">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="icon" value="<?php echo $konfigurasi->icon  ?>" required oninvalid="this.setCustomValidity('Upload Gambar Icon!')" oninput="setCustomValidity('')">
                      <label class="custom-file-label text-left" for="exampleInputFile" data-browse="Pilih">Pilih Gambar</label>
                    </div>            
                  </div>
              </div>
            </div>
            <div class="col-sm-5">
              <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail" width="150">
            </div>
          </div>

        <div class="row">
          <div class="col-sm-7">
          <label> </label>
          </div>
          <div class="col-sm-5">
          <text>Icon Lama</text>
        </div>
      </div>
        <br>
            </div>
              <button type="submit" class="btn btn-primary btn-lg">Upload</button>
            </div>
        </div>
        </div>
      </form>
    </div>
  <!-- </div> -->
</section>
<?php echo form_close(); ?>