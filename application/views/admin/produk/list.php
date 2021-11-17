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
								<a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-success btn-lg btn rounded-pill">
									<i class= "fa fa-plus-circle"></i> Tambah Baru
								</a>
							</p>
							<?php
							//notif jika data berhasil ditambah
							if($this->session->flashdata('sukses')){
								echo '<div class="alert alert-success alert-success">
                 					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  						<i class="icon fas fa-check"></i>';
								echo $this->session->flashdata('sukses');
								echo '</div>';
							}
							if($this->session->flashdata('ubah')){
								echo '<div class="alert alert-success alert-success">
                 					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  						<i class="icon fas fa-check"></i>';
								echo $this->session->flashdata('ubah');
								echo '</div>';
							}
							?>
							<table class="table table-bordered table-hover table-responsive-md" id="example1">
									<thead class="thead-dark">
										<tr>
											<th>NO</th>
											<th>GAMBAR</th>
											<th>NAMA</th>
											<th>KATEGORI</th>
											<th>HARGA</th>
											<th>STATUS</th>
											<th>StATUS</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($produk as $produk) { ?>
										<tr>
											<td><?php echo $no;$no++ ?></td>
											<td>
											<img src="<?php echo base_url('assets/upload/image/thumbs/' .$produk->gambar) ?>" class="img img-respinsive img-thumbnail" width="50">
											</td>
											<td><?php echo $produk->nama_produk ?></td>
											<td><?php echo $produk->nama_kategori ?></td>
											<td><?php echo number_format($produk->harga, '0',',','.') ?></td>
											<td><?php echo $produk->tanggal_post ?></td>
											<td><?php echo $produk->status_produk ?></td>
											<td>

												<a href="<?php echo base_url('admin/produk/gambar/' .$produk->id_produk) ?>"
													class="btn btn-info btn-xs"><i class="fas fa-image">
													</i> Gambar [ <?php echo $produk->jumlah_gambar; ?> ]</a>


												<a href="<?php echo base_url('admin/produk/edit/' .$produk->id_produk) ?>"
													class="btn btn-warning btn-xs"><i class="fas fa-edit">
													</i> Edit</a>

												<?php //include ('delete.php'); ?>

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
