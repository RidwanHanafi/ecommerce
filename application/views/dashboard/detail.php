<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<?php include('menu.php') ?>
	</div>
	<div class="ltext-105 cl5 txt-center respon1">
		<span>
			<label><?php echo $title ?></label>
		</span>

	<?php 
	if($header_transaksi){ 
	?>
	
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">

		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--70 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="kolom">No</th>
									<th class="kolom">Kode</th>
									<th class="kolom">Nama produk</th>
									<th class="kolom">Jumlah </th>
									<th class="kolom">Harga</th>
									<th class="kolom">Sub Total</th>
								</tr>

								<?php
								//loop keranjang belanja
								$i=1;
								foreach ($transaksi as $transaksi) { ?>	

								<tr class="table_row">
									<td class="kolom">
										<?php echo $i ?>

									</td>
									<td class="kolom"><?php echo $transaksi->kode_produk ?></td>
									<td class="kolom"><?php echo $transaksi->nama_produk?></td>
									<td class="kolom"><?php echo number_format($transaksi->jumlah) ?></td>
									<td class="kolom"><?php echo $transaksi->harga ?></td>
									<td class="kolom"><?php echo $transaksi->total_harga ?></td>
									
								</tr>
								<?php 
									$i++;  }
								?>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="konten_data mtext-109 cl2 p-b-30">
							Data
						</h4>
						<div class="konten_data flex-w flex-t p-t-3 p-b-2">
							<div class="kiri size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Kode Transaksi:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
									&nbsp&nbsp<?php echo $header_transaksi->order_id ?>
								</span>	
							</div>
						</div>

						<div class="konten_data flex-w flex-t p-t-3 p-b-2">
							<div class="kiri size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Tanggal: 
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
									&nbsp&nbsp<?php echo date('d-m-Y H:i',strtotime($header_transaksi->tanggal_transaksi))?>
								</span>	
							</div>
						</div>
						<?php 
							$va_number = $header_transaksi->va_number;
							$bca_va_number = $header_transaksi->bca_va_number;
							$permata_va_number = $header_transaksi->permata_va_number;
							$bill_key = $header_transaksi->bill_key;
							$biller_code = $header_transaksi->biller_code;

							//va_number
							if(!empty($va_number) && !empty($bca_va_number)){ ?>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Bank:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo strtoupper($header_transaksi->bank) ?>
										</span>	
									</div>
								</div>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											VA Number:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo $header_transaksi->bca_va_number ?>
										</span>	
									</div>
								</div>
							<?php 
							// bca_va_number
							}elseif(!empty($va_number)){ ?>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Bank:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo strtoupper($header_transaksi->bank) ?>
										</span>	
									</div>
								</div>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											VA Number:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo $header_transaksi->va_number ?>
										</span>	
									</div>
								</div>
							<?php 
							}elseif(!empty($permata_va_number)){ ?>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Bank:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbspPermata
										</span>	
									</div>
								</div>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											VA Number:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo $header_transaksi->permata_va_number ?>
										</span>	
									</div>
								</div>
							<?php }elseif(!empty($bill_key) && !empty($biller_code)){ ?>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Bank:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbspMandiri
										</span>	
									</div>
								</div>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Bill key:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo $header_transaksi->bill_key ?>
										</span>	
									</div>
								</div>
								<div class="konten_data flex-w flex-t p-t-3 p-b-2">
									<div class="kiri size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Biller code:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<span class="stext-111 cl2 plh3 p-l-5 p-r-30" >
											&nbsp&nbsp<?php echo $header_transaksi->biller_code ?>
										</span>	
									</div>
								</div>
							<?php } ?>
							<div class="konten_data flex-w flex-t p-t-3 p-b-2">
								<div class="kiri size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Total:
									</span>
								</div>

								<div class="size-209 p-t-1">
									<span class="mtext-110 cl2">
										&nbsp&nbsp&nbspRp. <?php echo number_format($header_transaksi->gross_amount)?>
									</span>
								</div>
							</div>

							<div class="konten_data flex-w flex-t p-t-3 p-b-2">
								<div class="kiri size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Status Bayar:
									</span>
								</div>

								<div class="size-209 p-t-1">
									<span class="mtext-110 cl2" >
										&nbsp&nbsp <?php if ($header_transaksi->transaction_status=='settlement') {
											echo '<span style="color:Green;">Berhasil</span>';
										}elseif ($header_transaksi->transaction_status=='pending'){
											echo 'Tertunda';
										}elseif ($header_transaksi->transaction_status=='deny'){
											echo 'Ditolak';
										}elseif ($header_transaksi->transaction_status=='expire'){
											echo 'Kadaluarsa';
										}else{
											echo 'error';
										} ?>
									</span>	
								</div>
							</div>

						<?php if ($header_transaksi->konfirmasi== NULL && $header_transaksi->transaction_status=='settlement') { ?>
							<div class=" bor12 p-t-15 p-b-20"></div>
							<span class="stext-110 cl2">
								Status pesanan:
							</span>
							<div class="s-pesanan p-t-3 p-b-2">
								<div class="">
									<span class="stext-110 cl2">
										Pesanan anda menunggu konfirmasi.
									</span>
								</div>
						<?php }elseif($header_transaksi->konfirmasi== 'sudah' && $header_transaksi->transaction_status=='settlement'){?>
							<div class=" bor12 p-t-15 p-b-20"></div>
							<span class="stext-110 cl2">
								Status pesanan:
							</span>
							<div class="s-pesanan p-t-3 p-b-2">
								<div class="">
									<span class="stext-110 cl2">
										Pesanan anda akan diantar ke tujuan.
									</span>
								</div>
						<?php }elseif($header_transaksi->konfirmasi== 'belum' && $header_transaksi->transaction_status=='settlement'){ ?>
							<div class=" bor12 p-t-15 p-b-20"></div>
							<span class="stext-110 cl2">
								Status pesanan:
							</span>
							<div class="s-pesanan p-t-3 p-b-2">
								<div class="">
									<span class="stext-110 cl2">
										Pesanan anda belum dikonfirmasi, tunggu sebentar ya.
									</span>
								</div>
						<?php }elseif($header_transaksi->transaction_status=='expire'){ ?>
							<div class=" bor12 p-t-15 p-b-20"></div>
							<span class="stext-110 cl2">
								Status pesanan:
							</span>
							<div class="s-pesanan p-t-3 p-b-2">
								<div class="">
									<span class="stext-110 cl2">
										Silahkan lakukan pemesanan ulang
									</span>
								</div>
						<?php } ?>
						<!-- <div class=" bor12 p-t-15 p-b-20"></div>

						<div class="p-t-30">
							<a href="<?php echo base_url('snap') ?>" type="submit" class="btn-coklat flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proses to Checkout
							</a>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	//jika keranjang kososng tampilkan gambar
	}else{ ?>
		<div class="item-slick1" style="background-image: url(<?php echo base_url() ?>assets/template2/images/sad_icon.png);">
		</div>
	<?php } ?>
</div>
</div>
</div>

