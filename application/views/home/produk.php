<!-- Product -->
<section class="sec-product bg0 p-t-100 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Produk Terbaru
			</h3>
			<h4 class="ltext-108 cl5 txt-center respon1">
				<?php
				$bulan = date("F");
				if($bulan == 'January'){
					echo '(Januari)';
				}elseif($bulan == 'February'){
					echo '(Februari)';
				}elseif($bulan == 'March'){
					echo '(Maret)';
				}elseif($bulan == 'April'){
					echo '(April)';
				}elseif($bulan == 'May'){
					echo '(Mei)';
				}elseif($bulan == 'June'){
					echo '(Juni)';
				}elseif($bulan == 'July'){
					echo '(Juli)';
				}elseif($bulan == 'August'){
					echo '(Agustus)';
				}elseif($bulan == 'September'){
					echo '(September)';
				}elseif($bulan == 'October'){
					echo '(Oktober)';
				}elseif($bulan == 'November'){
					echo '(November)';
				}else{
					echo '(December)';
				}
				?>
			</h4>
		</div>
		
			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				<?php foreach ($produk as $produk) {

					$date = date('Y-m-d',strtotime($produk->tanggal_update));	
					$date_now = date('Y-m-d');
					$start_date = new DateTime($date);
					$end_date = new DateTime($date_now);
					$interval = $start_date->diff($end_date);

					
					if($interval->days <=30 ){
					 ?>
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<?php 	
							echo form_open(base_url('belanja/add'));
							echo form_hidden('id', $produk->id_produk);
							echo form_hidden('qty', 1);
							echo form_hidden('price', $produk->harga);
							echo form_hidden('name', $produk->nama_produk);
							//elemen redirect
							echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

						?>
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img class="qqq" src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php $produk->nama_produk ?>">

								<button type="submit" value="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Beli
								</button>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $produk->nama_produk ?>
									</a>

									<span class="stext-105 cl3">
										IDR <?php echo number_format($produk->harga,'0',',','.') ?>
									</span>
									
								</div>
								<!-- <a href="#" class="torp-right btn-addwish-b2 dis-block pos-relative js-show-modal1">
										<img class="icon-heart1 dis-block trans-04" src="<?php echo base_url() ?>assets/template2/images/icons/sleepy-eyes.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo base_url() ?>assets/template2/images/icons/eye.png" alt="ICON">
									</a> -->
								<style>
									.top-right{
										position: absolute;
										right: 1px;
										top:1px;
									}
								</style>
								<div class="block2-txt-child2 flex-r p-t-3">
									
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
					<?php }else{

					} ?>
					
					<?php } ?>
				</div>
			</div>
	</div>
</section>
