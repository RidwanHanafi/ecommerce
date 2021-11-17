<?php

  
  echo validation_errors('<div class="alert alet-warning">', '</div>');

  //Form
  echo form_open(base_url('admin/ongkir/edit/'.$detail->id_kecamatan), ' class="quick-example"');
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
              <form role="form" >
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- Pilih -->
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control"  id="kecamatan" value="<?php echo $detail->kecamatan ?>" readonly>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="form-group">
                    <label>Ongkos Kirim</label>
                    <input type="text" name="jumlah" class="form-control" placeholder="Ongkos Kirim" id="jumlah" value="<?php echo $detail->jumlah ?>" required oninvalid="this.setCustomValidity('Masukan Ongkos Kirim')" oninput="setCustomValidity('')">
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- Pilih -->
                      <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status"  required oninvalid="this.setCustomValidity('Masukan Status Ongkir')" oninput="setCustomValidity('')">
                          <option value="">Pilih Status</option>
                          <option value="aktif">Aktif</option>
                          <option value="nonaktif">Non-Aktif</option>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>

                  
                  <div class="card-footer" style="background-color: rgba(245, 245, 245, 0);">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <!-- <button type="submit" class="btn btn-default float-right">Reset</button> -->
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
<?php echo form_close() ?>


