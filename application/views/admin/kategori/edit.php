
<!-- Editttt -->
  <!-- /.card-header -->
<section class="content">
    <div class="content-wrapper">
      <div class="container">
                <?php
          echo validation_errors('<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria=label="Close">
                                  <span aria-hidden="true">&times;</span></button>', '</div>');

          //Form
          echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori), ' class="quick-example"');
        ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
    					<div class="card-body">
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo $kategori->nama_kategori ?>" required oninvalid="this.setCustomValidity('Masukan Nama Kategori!')" oninput="setCustomValidity('')">
                    </div>
                   <!--  <div class="form-group">
                      <label>Urutan</label>
                      <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori->urutan ?>" required>
                    </div> -->

                    <div class="card-footer" style="background-color: rgba(245, 245, 245, 0);">
                      <button type="submit" class="btn btn-info">Ubah</button>
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
