<section class="content">
	<div class="content-wrapper">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
				<div class="card-body">
				<p>
					<a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-success btn-lg  btn rounded-pill">
						<i class= "fa fa-plus-circle"></i> Tambah Baru
					</a>
				</p>
				<?php
				//notif jika data berhasil ditambah
				if($this->session->flashdata('sukses')){
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria=label="Close">
					<span aria-hidden="true">&times;</span></button>';
					echo $this->session->flashdata('sukses');
                echo '</div>';
           		}
                //notif jika data berhasil ditambah
				if($this->session->flashdata('hapus')){
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria=label="Close">
					<span aria-hidden="true">&times;</span></button>';
					echo $this->session->flashdata('hapus');
                echo '</div>';
            	}
							?>
							<table class="table table-bordered table-responsive-md" id="example1">
									<thead>
										<tr>
											<th>NO</th>
											<th>NAMA</th>
											<th>SLUG</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($kategori as $kategori) { ?>
										<tr>
											<td><?php echo $no;$no++ ?></td>
											<td><?php echo $kategori->nama_kategori ?></td>
											<td><?php echo $kategori->slug_kategori ?></td>
											<td>
											
												<a href="<?php echo base_url('admin/kategori/edit/' .$kategori->id_kategori) ?>"
													class="btn btn-warning btn-xs"><i class="fas fa-edit">
													</i> Edit</a>

												<a href="<?php echo base_url('admin/kategori/delete/' .$kategori->id_kategori) ?>"
													class="btn btn-danger btn-xs"
													onclick="return confirm ('Yakin ingin menghapus data ini?')">
													<i class="fas fa-trash">
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
