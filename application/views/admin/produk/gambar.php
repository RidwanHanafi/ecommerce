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
  echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk), ' class="quick-example"');
?>


<section class="content">
  <!-- <div class="content-wrapper"> -->
    <div class="container">
      <?php
              //notif jika data berhasil ditambah
              if($this->session->flashdata('sukses')){
                echo '<div class="alert alert-success alert-success">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon fas fa-info "></i>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }
              ?>
      <form role="form" >
        <div class="card">
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <h1 class=""> <?php echo $produk->nama_produk ?> </h1>
            <div class="px-2">
              <div class="form-group">
                  
                  <input type="text" class="form-control text-center" name="judul_gambar" placeholder="Judul Gambar" value="<?php echo set_value('judul_gambar') ?>" required>
              </div>
              <div class="form-group">
                
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar" value="<?php echo set_value('gambar') ?>" required oninvalid="this.setCustomValidity('Upload Gambar Produk!')" oninput="setCustomValidity('')">
                      <label class="custom-file-label" for="exampleInputFile" data-browse="Pilih">Pilih Gambar</label>
                    </div>
                  </div>
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

<section class="content">
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <style >
        .dataTables_filter {
         width: 50%;
         float: right;
         text-align: left;
      }
      </style>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              
              <table class="table table-bordered" id="example1">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>GAMBAR</th>
                      <th>JUDUL</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td>
                      <img src="<?php echo base_url('assets/upload/image/thumbs/' .$produk->gambar) ?>" class="img img-respinsive img-thumbnail" width="50">
                      </td>
                      <td><?php echo $produk->nama_produk ?></td>
                      <td>

                      </td>
                    </tr>
                    <?php $no=1; foreach ($gambar as $gambar) { ?>
                    <tr>
                      <td><?php echo $no;$no++ ?></td>
                      <td>
                      <img src="<?php echo base_url('assets/upload/image/thumbs/' .$gambar->gambar) ?>" class="img img-respinsive img-thumbnail" width="50">
                      </td>
                      <td><?php echo $gambar->judul_gambar ?></td>
                      <td>
                         <!-- <?php //include ('delete_image.php') ?> -->
                          <a href="<?php echo base_url('admin/produk/hapus_gambar/' .$produk->id_produk.'/'.$gambar->id_gambar) ?>"
                          class="btn btn-danger btn-xs" type="button" onclick="return confirm('Yakin ingin menghapus gambar ini?')" ><i class="fas fa-trash">
                          </i> Hapus</a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
            </div>
          </div>
<!-- /.card -->
     </div>
 </div>
</div>
</div>
</div>
</section>



