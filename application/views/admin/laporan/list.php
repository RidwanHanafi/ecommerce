<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/moment/moment.min.js"></script>

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
							<form action="<?php echo base_url('admin/laporan/cetak') ?>" method="post">
							<div class="col-md-3" style="padding-bottom: 10px;">
					            <h4>Filter</h4>
					            <input type="text" id="reportrange" class="form-control ">

					        </div>
					        <div style="padding-left: 10px">
					         	<button class="btn btn-success btn-lg btn rounded-pill buttons-print" type="submit">Cetak</button>
					         </div>
					         </form>

					       	<br>
							<table class="table table-bordered table-hover table-responsive-md" id="example1">
									<thead class="thead-dark">
										<tr>
											<th style="text-align: center">NO</th>
											<th>PELANGGAN</th>
											<th style="text-align: center">KODE TRANSAKSI</th>
											<th style="text-align: center">TANGGAL TRANSAKSI</th>
											<th style="text-align: center">NAMA PRODUK</th>
											<th style="text-align: center">JUMLAH ITEM</th>
											<th style="text-align: center">JUMLAH BAYAR</th>
											
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach  ($header_transaksi->result()  as $header_transaksi) { ?>
											<tr>
												<td style="text-align: center;"><?php echo $no++ ?></td>
												<td style="font-weight: bold;"><?php echo $header_transaksi->nama_pelanggan ?>
												<!-- <div class="menjorok">
													<small>
														<br>Alamat 	:<?php echo $header_transaksi->kecamatan,', ', $header_transaksi->desa ?>
													</small>
												</div> -->
												</td>
												<td style="text-align: center"><?php echo $header_transaksi->order_id ?></td>
												<td style="text-align: center"><?php echo date('d-m-Y H:i',strtotime( $header_transaksi->tanggal_update))?>
												<td style="text-align: left"><?php echo $header_transaksi->pesanan ?>
												<td style="text-align: right"><?php echo $header_transaksi->total_item ?></td>
												<td style="text-align: right">Rp. <?php echo number_format($header_transaksi->jumlah_bayar, '0',',','.')?></td>
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
