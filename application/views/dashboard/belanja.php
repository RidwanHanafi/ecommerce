<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<?php include('menu.php') ?>
	</div>
	<div class="ltext-105 cl5 txt-center respon1">
		<span>
			<label><?php echo $title ?></label>
		</span>

		<?php 
		
		?>
	 	<div class="bg0 p-t-75 p-b-85">

		<div class="container">
			<div class="row">
				<div class="ukuran_tabel_riwayat col-lg-10 m-lr-auto m-b-50">
					<div class=" m-r--70 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="kolom">No</th>
									<th class="kolom">Kode Transaksi</th>
									<th class="kolom">Tanggal transaksi</th>
									<th class="kolom">JUMLAH ITEM</th>
									<th class="kolom">TOTAL BAYAR</th>
									<th class="kolom">Detail</th>
									<th></th>
									
								</tr>

								<?php
								//loop keranjang belanja
								$i=1;
							
								foreach ($header_transaksi as $header_transaksi) { ?>	

								<tr class="table_row">
									<td class="kolom">
										<?php echo $i ?>

									</td>
									
									<td class="kolom"><?php echo $header_transaksi->order_id?></td>
									<td class="kolom"><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
									
									<td class="kolom"><?php echo $header_transaksi->total_item ?></td>
									<td class="kolom">Rp. <?php echo number_format( $header_transaksi->jumlah_bayar) ?></td>
									
									<td class="kolom">
										<a href="<?php echo base_url('dashboard/detail/'.$header_transaksi->order_id) ?>" class="ukr-btn-detail btn-coklat  stext-101 cl0 bg3 bor2 hov-btn3 p-lr-15 trans-04"><i>
											</i> Detail</a>

									</td>
									<!-- <td class="kolom">
										<a href="<?php echo base_url('dashboard/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn-addwish-b2 pos-relative ">
										<img class="icon-heart1  trans-04" src="<?php echo base_url() ?>assets/template2/images/icons/sleepy-eyes.png" alt="ICON">
										<img class="icon-heart2  trans-04 ab-t-l" src="<?php echo base_url() ?>assets/template2/images/icons/eye.png" alt="ICON">
									</a> 
									</td> -->
								</tr>
								<?php 
									$i++;  }
								?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	</div>
</div>
