<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?php echo base_url('') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?php echo $title ?>
		</span>
	</div>
</div>
	
	<!-- notifikasi berhasil dihapus peritem -->
	<?php 
		if ($this->session->flashdata('perhapus')) {
		echo '<div class="stext-110 alert alert-info alert-dismissible" style="margin: 0px 550px 0px 150px;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo $this->session->flashdata('perhapus');
		echo '</div>';
		} ?>

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">

	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--70 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Produk</th>
								<th class="column-2"></th>
								<th class="column-3">Harga</th>
								<th class="column-4 text-center">Total</th>
								<th class="column-5">Subtotal</th>
								<th class="column-6" width="14%">Update</th>
							</tr>

							<?php
							//loop keranjang belanja
							foreach ($keranjang as $keranjang) {
								
								//ambil data produk
								$id_produk = $keranjang['id'];
								$produk = $this->produk_model->detail($id_produk);
								//form update per item
								echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
								// echo "<pre>";
								//print_r($keranjang);
							 ?>	
							<tr class="table_row">
								<td class="column-1">
									<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="keranjang_belanja how-itemcart1" type="submit" name="hapus">
										<img class="keranjang_belanja" src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
									</a>
								</td>
								<td class="column-2"><?php echo $keranjang['name'] ?></td>
								<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
								<td class="column-4">
									<div class="wrap-num-product flex-w ">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">
									

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
								</td>
								<td class="column-5">Rp. 
									<?php 
									$sub_total = $keranjang['price'] * $keranjang['qty']; 
									echo number_format($sub_total,'0',',','.'); 
									?>
								</td>
								<td class="colomn-6">
									<div class="flex-w">
										<button type="submit" name="update" class="ukuranupdate flex-c-m stext-101 cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
											<i class="zmdi zmdi-edit"></i>
										</button>
									</div>
								</td>
							</tr>
								<?php 
								//echo form_close
								echo form_close();
								} //end looping 
							?>
						</table>
					</div>
				</div>
			</div>
			
			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<?php 
					//notifikasi berhasil dihapus seluruh item
						if ($this->session->flashdata('hapus')) {
						echo '<div class="stext-110 alert alert-info alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo $this->session->flashdata('hapus');
						echo '</div>';
						} 
						if ($this->session->flashdata('update')) {
						echo '<div class="stext-110 alert alert-info alert-dismissible" >
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo $this->session->flashdata('update');
						echo '</div>';
						}
						?>
					<h4 class="mtext-109 cl2 p-b-30">
					Data Keranjang
					</h4>
					<!-- subtotal -->
				
					<!--  -->
					<?php 
					//$kode_transaksi = date('dmY').strtoupper(random_string('alnum', 6));  
					echo form_open(base_url('snap')); ?>
					<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
					<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total(); ?>">
					<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">

					
					 <div class="flex-w flex-t p-b-15">
		              <div class="size-208">
		                <span class="stext-110 cl2">
		                  Nama:
		                </span>
		              </div>

		              <div class="size-209">
		                <div class="bor8 stext-111 cl2">
		                  <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="atas_nama" placeholder="Nama Pengguna" value="<?php echo $pelanggan->nama_pelanggan ?>" required oninvalid="this.setCustomValidity('Masukan Nama Anda')" oninput="setCustomValidity('')" required>
		                </div>
		              </div>
		            </div>

		             <div class="flex-w flex-t p-b-15 p-t-10">
		              <div class="size-208">
		                <span class="stext-110 cl2">
		                  Email:
		                </span>
		              </div>

		              <div class="size-209">
		                <div class="stext-111 cl2">
		                  <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Your Email Address" value="<?php echo $pelanggan->email ?>" required oninvalid="this.setCustomValidity('Masukan Email Anda')" oninput="setCustomValidity('')" readonly>
		                </div>
		              </div>
		            </div>

					 <div class="flex-w flex-t p-b-15 p-t-10">
		              <div class="size-208">
		                <span class="stext-110 cl2">
		                  Telepon:
		                </span>
		              </div>

		              <div class="size-209">
		                <div class="bor8 stext-111 cl2">
		                  <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="telepon" placeholder="Telepon" value="<?php  echo $pelanggan->telepon ?>" required oninvalid="this.setCustomValidity('Masukan Telepon Anda')" oninput="setCustomValidity('')">
		                </div>
		              </div>
		            </div>


		            <div class="flex-w flex-t  p-b-15 p-t-10">
		              <div class="size-208">
		                <span class="stext-110 cl2">
		                  Alamat:
		                </span>
		              </div>

		              <div class="size-209">
		              	<p class="stext-111 cl6 p-t-2">
							Alamat penerima
						</p>
						<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
							<select id="kecamatan" name="kecamatan" class="w-select-custom stext-111 custom-select" required oninvalid="this.setCustomValidity('Masukan Nama Kecamatan')" oninput="setCustomValidity('')">
								<option value="">Pilih Kecamatan</option>
									<?php foreach ($kecamatan as $kecamatan) : ?>
										<option value="<?php echo $kecamatan->id ?>"><?php echo $kecamatan->name ?></option>
									<?php endforeach ?>
							</select>
							<div class="dropDownSelect2"></div>
						</div> 
						<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
							<select id="desa" name="desa" class="js-select2" required oninvalid="this.setCustomValidity('Masukan Nama Desa/Kelurahan')" oninput="setCustomValidity('')">
								<option value="">Pilih Desa</option>
							</select> 
							<div class="dropDownSelect2"></div>
						</div>
		              </div>

		             <div class="size-208 w-full-ssm">
						<span class="stext-110 cl2">
						Detail
						</span>
					</div>

					<div class="size-209  p-r-0-sm w-full-ssm">
						<p class="stext-111 cl6 p-t-2">
						<div class="bor8 m-b-10">
							<textarea class="stext-111 cl2 plh3 size-110 p-lr-10 p-tb-7" name="alamat" placeholder="Alamat" value="<?php echo $pelanggan->alamat ?>" required oninvalid="this.setCustomValidity('Masukan Alamat Anda')" oninput="setCustomValidity('')" required><?php echo $pelanggan->alamat ?></textarea>
						</div>
						</p>
					</div>
		            </div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Keterangan:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								Ingin menghapus seluruh keranjang belanja?
							</p>
							
							<div class="p-t-15">
								<div class="flex-w">
									<a href="<?php echo base_url('belanja/hapus') ?>" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn22 p-lr-15 trans-04 pointer">
										Hapus Keranjang
									</a>
								</div>
									
							</div>
						</div>
					</div>
					
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
							Total:
							</span>
						</div>
<div class="checkout_btn_inner float-right">
               
              </div>
						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
							Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?>
							
							</span>
						</div>
					</div>
					
					<button type="submit" class="btn-coklat flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
					Proses
					</button>
					<?php echo form_close(); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
.w-select-custom {
width: 100%;
}
</style>
