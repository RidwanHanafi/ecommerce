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
								<a href="<?php echo base_url('admin/transaksi') ?>" class="btn btn-success btn-lg btn rounded-pill">
								<i class= "fa fa-refresh fa-spin"></i> Refresh
							</a>
							</p>

							<table class="table table-bordered table-hover table-responsive-md" id="example1">
									<thead class="thead-dark">
										<tr>
											<th>NO</th>
											<th>PELANGGAN</th>
											<th>KODE TRANSAKSI</th>
											<th>TANGGAL TRANSAKSI</th>
											<th style="text-align: right">JUMLAH BAYAR</th>
											<th>JUMLAH ITEM</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($header_transaksi as $header_transaksi) { ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td style="font-weight: bold;"><?php echo $header_transaksi->nama_pelanggan ?>
												<div class="menjorok">
													<small>
														<br>Alamat 	:<?php echo $header_transaksi->kecamatan,', ', $header_transaksi->desa ?>
													</small>
												</div>
												</td>
												<td><?php echo $header_transaksi->order_id ?></td>
												<td><?php echo $header_transaksi->tanggal_transaksi ?></td>
												<td style="text-align: right">Rp. <?php echo number_format($header_transaksi->jumlah_bayar, '0',',','.')?></td>

												<td style="text-align: center"><?php echo $header_transaksi->total_item ?></td>
									 			<td>
									 				<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->order_id) ?>" class="btn btn-info btn-xs"><i class="fas fa-info-circle">
														</i>Detail</a>
													<?php if ($header_transaksi->konfirmasi=='sudah'): ?>
													<a  href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->order_id) ?>" class="btn btn-success btn-xs" ><i class="fas fa-print">
														</i>Cetak</a>
													<a href="<?php echo base_url('admin/transaksi/kirim/'.$header_transaksi->order_id) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-file-pdf-o">
														</i>Unduh</a>
													<?php endif ?>
													
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
