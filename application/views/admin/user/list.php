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
							<p>
								<?php if ($this->session->userdata('akses_level')=='Admin'): ?>
								<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-lg btn rounded-pill">
									<i class= "fa fa-plus-circle"></i> Tambah Baru
								</a>
								<?php endif ?>
							</p>

							<?php
							//notif jika data berhasil ditambah
							if($this->session->flashdata('sukses')){

								echo '<p class="alert alert-success alert-dismissible">
					                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                  <i class="icon fas fa-check-circle"></i>';

								echo $this->session->flashdata('sukses');
							}
							echo '</p>'
							?>
							<?php
							 //notif jika masuk paksa ke tambah
							if($this->session->flashdata('gagal')){

								echo '<p class="alert alert-warning alert-dismissible">
					                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                  <i class="icon fas fa-warning"></i>';

								echo $this->session->flashdata('gagal');
							}
							echo '</p>' ?>
							<?php
							 //notif jika data berhasil diubah
							if($this->session->flashdata('ubah')){

								echo '<p class="alert alert-success alert-dismissible">
					                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                  <i class="icon fas fa-edit"></i>';

								echo $this->session->flashdata('ubah');
							}
							echo '</p>' ?>
							<?php
							 //notif jika data berhasil diubah
							if($this->session->flashdata('hapus')){

								echo '<p class="alert alert-success alert-dismissible">
					                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                  <i class="icon fas fa-check-circle"></i>';

								echo $this->session->flashdata('hapus');
							}
							echo '</p>' ?>


							<table class="table table-bordered table-responsive-md" id="example1">
									<thead class="thead-dark">
										<tr>
											<th>NO</th>
											<th>NAMA</th>
											<th>EMAIL</th>
											<th>USERNAME</th>
											<th>LEVEL</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($user as $user) { ?>
										<tr>
											<td><?php echo $no;$no++ ?></td>
											<td><?php echo $user->nama ?></td>
											<td><?php echo $user->email ?></td>
											<td><?php echo $user->username ?></td>
											<td><?php if($user->akses_level == 'Admin'){echo 'Super Admin';}else{ echo 'Admin';}?></td>
											<td>
												<?php if ($this->session->userdata('akses_level')=='User' && $user->username == $this->session->userdata('username')): ?>
												<a href="<?php echo base_url('admin/user/edit/' .$user->id_user) ?>"
													class="btn btn-warning btn-xs"><i class="fas fa-edit">
													</i> Edit</a>
												<?php elseif ($this->session->userdata('akses_level')=='Admin') :?>
													<a href="<?php echo base_url('admin/user/edit/' .$user->id_user) ?>"
													class="btn btn-warning btn-xs"><i class="fas fa-edit">
													</i> Edit</a>
													<a href="<?php echo base_url('admin/user/delete/' .$user->id_user) ?>"
													class="btn btn-danger btn-xs"
													onclick="return confirm ('Yakin ingin menghapus data ini?');">
													<i class="fas fa-trash">
													</i> Hapus</a>
												 <?php endif?>
												
												
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
