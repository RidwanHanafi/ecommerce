<?php
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
  echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk), ' class="quick-example"');
?>

  <!-- /.card-header -->
<section class="content">
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->nama_produk ?>" required oninvalid="this.setCustomValidity('Masukan Nama Produk!')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kode Produk</label>
                          <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $produk->kode_produk ?>" required oninvalid="this.setCustomValidity('Masukan Kode Produk!')" oninput="setCustomValidity('')">
                        </div>
                      </div>
                    </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- Pilih -->
                      <div class="form-group">
                        <label>Kategori Produk</label>
                        <select class="custom-select" name="id_kategori">
                          <?php foreach ($kategori as $kategori ) { ?>
                            <option value="<?php echo $kategori->id_kategori ?>"<?php if($produk->id_kategori==$kategori->id_kategori){echo "selected";} ?>>
                              <?php echo $kategori->nama_kategori ?>
                            </option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo $produk->harga ?>" required oninvalid="this.setCustomValidity('Masukan Harga!')" oninput="setCustomValidity('')">
                  </div>
                 
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $produk->stok ?>" required oninvalid="this.setCustomValidity('Masukan Stok Produk!')" oninput="setCustomValidity('')">
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" class="form-control" placeholder="Berat" value="<?php echo $produk->berat ?>" required oninvalid="this.setCustomValidity('Masukan Berat Produk!')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                      <div class="col-sm-6">  
                        <div class="form-group">
                          <label>Ukuran</label>
                          <input type="text" name="ukuran" class="form-control" placeholder="Ukuran" value="<?php echo $produk->ukuran ?>" required oninvalid="this.setCustomValidity('Masukan Ukuran Produk!')" oninput="setCustomValidity('')">
                        </div>
                      </div>
                    </div>  
                  <div class="form-group">
                    <label>Keyword</label>
                    <textarea name="keyword" class="form-control" placeholder="Keyword" required oninvalid="this.setCustomValidity('Masukan Keyword Produk!')" oninput="setCustomValidity('')"><?php echo $produk->keyword ?></textarea>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Upload Gambar</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                            <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                          </div>
                         </div>
                      </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-12">
                            <!-- Pilih -->
                            <div class="form-group">
                              <label>Status Produk</label>
                              <select class="custom-select" name="status_produk" required oninvalid="this.setCustomValidity('Masukan Status Produk!')" oninput="setCustomValidity('')">
                                <option value="Publikasi">Publikasi</option>
                                <option value="Draft" <?php if($produk->status_produk=="Draft"){echo "selected";} ?> >Draft</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                   <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"  required oninvalid="this.setCustomValidity('Masukan Keterangan Produk!')" oninput="setCustomValidity('')"><?php echo $produk->keterangan ?></textarea>
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
  </div>
</section>

<?php echo form_close(); ?>
