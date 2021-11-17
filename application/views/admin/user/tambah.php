<?php
  

  //Form
  echo form_open(base_url('admin/user/tambah'), ' class="quick-example"');
?>

  <!-- /.card-header -->
<section class="content">
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
             <?php
              //notif jika data berhasil ditambah
              if($this->session->flashdata('sukses')){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria=label="Close">
                <span aria-hidden="true">&times;</span></button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }
              echo validation_errors('<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria=label="Close">
                <span aria-hidden="true">&times;</span></button>', '</div>');
              ?>
            <div class="card">
  						<div class="card-body">
              <!-- form start -->
              <form role="form" >
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" id="namapengguna" value="<?php echo set_value('nama') ?>" required oninvalid="this.setCustomValidity('Masukan Nama Pengguna')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required oninvalid="this.setCustomValidity('Masukan Email')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required oninvalid="this.setCustomValidity('Masukan Username')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')">
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- Pilih -->
                      <div class="form-group">
                        <label>Hak Akses</label>
                        <select class="custom-select" name="akses_level">
                          <option value="Admin">Super Admin</option>
                          <option value="User">Admin</option>
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


