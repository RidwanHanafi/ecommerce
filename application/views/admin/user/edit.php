<?php
  echo validation_errors('<div class="alert alet-warning">', '</div>');

  //Form
  echo form_open(base_url('admin/user/edit/'.$user->id_user), ' class="quick-example"');
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
                  <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" >
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- Pilih -->
                      <div class="form-group">
                        <label>Hak Akses</label>
                        <select class="custom-select" name="akses_level">
                          <option value="Admin">Super Admin</option>
                          <option value="User" <?php if($user->akses_level=="User"){echo "selected";} ?> >Admin</option>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-info swalDefaultInfo">Submit</button>
                 
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

<?php echo form_close(); ?>
