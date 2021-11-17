<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<?php include('menu.php') ?>
	</div>
	<div class="ltext-105 cl5 txt-center respon1">
		<span>
			<label><?php echo $title ?></label>
		</span>
		<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		
	</div>
	<div class="ltext-105 cl5 txt-center respon1">
		
	 	<div class="bg0 p-t-75 p-b-85">

		<div class="container">
			<div class="row">
				<div class="ukuran_tabel_riwayat col-lg-10  m-lr-auto m-b-50">
					<div class=" m-r--70 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="kolom">No</th>
									<th class="kolom">Kode Transaksi</th>
									<th class="kolom">Status Transaksi</th>
									<th class="kolom">Tanggal</th>
									<th class="kolom">Detail</th>
									<!-- <th class="kolom">Bill Key</th>
									<th class="kolom">Biller Code</th>
									<th class="kolom">Bank</th>
									<th class="kolom">VA Number</th>
									<th class="kolom">VA Permata</th> -->
									<!-- <th class="kolom">Panduan Pembayaran</th> -->
								</tr>

								<?php
								//loop keranjang belanja
								$i=1;
								foreach ($header_transaksi as $header_transaksi) { ?>	

								<tr class="table_row">
									<td class="kolom">
										<?php echo $i ?>
									</td>
									<td class="kolom"><?php echo $header_transaksi->order_id ?></td>
									<td class="kolom"><?php 
										if ($header_transaksi->transaction_status=='settlement') {
											echo '<span style="color:Green;">Berhasil</span>';
										}elseif ($header_transaksi->transaction_status=='pending'){
											echo 'Tertunda';
										}elseif ($transaksi->transaction_status=='deny'){
											echo 'Ditolak';
										}elseif ($header_transaksi->transaction_status=='expire'){
											echo 'Kadaluarsa';
										}else{
											echo 'error';
										}
									?></td>
									<td class="kolom"><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
									<td class="kolom">
										<a href="<?php echo base_url('dashboard/detail/'.$header_transaksi->order_id) ?>" class="ukr-btn-detail btn-coklat  stext-101 cl0 bg3 bor2 hov-btn3 p-lr-15 trans-04"><i>
										</i>Detail</a>
									</td>
									<!-- <td class="kolom"><?php echo $transaksi->bill_key ?></td>
									<td class="kolom"><?php echo $transaksi->biller_code ?></td>
									<td class="kolom"><?php echo $transaksi->bank?></td>
									<td class="kolom"><?php echo $transaksi->va_number ?></td>
									<td class="kolom"><?php echo $transaksi->permata_va_number ?></td> -->
									<!-- <td class="kolom"><a href="<?php echo $transaksi->pdf_url; ?>" target=_blank class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="alamat"readonly required >Payment Guide</a></td> -->

								
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

	</div>
</div>
