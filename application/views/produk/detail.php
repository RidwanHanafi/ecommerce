<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="<?php echo base_url('produk') ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Produk
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $title ?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w "></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>">
									<div class="wrap-pic-w pos-relative">
										<img class="detail" src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<?php if($gambar){ 
									foreach ($gambar as $gambar) {
									
								?>
								<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>">
									<div class="wrap-pic-w pos-relative">
										<img class="detail" src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" alt="<?php echo $gambar->judul_gambar ?>">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<?php 
										}
									}  
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $title ?>
						</h4>
						<?php 	
							echo form_open(base_url('belanja/add'));
							echo form_hidden('id', $produk->id_produk);
							// echo form_hidden('qty', 1);
							echo form_hidden('price', $produk->harga);
							echo form_hidden('name', $produk->nama_produk);
							//elemen redirect
							echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

						?>
						<span class="mtext-106 cl2">
							IDR <?php echo number_format($produk->harga,'0',',','.') ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $produk->keterangan ?>
						</p>
						
						<!--  -->
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-204 flex-w flex-m respon6-next">
								<div class="wrap-num-product flex-w m-r-20 m-tb-10">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-minus"></i>
									</div>

									<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>

								<button typle="submit" name="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Beli
								</button>
							</div>
						</div>
						<?php echo form_close(); ?>	
					</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="<?php echo base_url() ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2  tooltip100" data-tooltip="Akun">
									<i class="zmdi zmdi-account"></i>
								</a>
							</div>

							<a href="<?php echo $site->facebook ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="<?php echo $site->instagram ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Instagram">
								<i class="fa fa-instagram"></i>
							</a>

							<a href="<?php echo $site->telepon ?>" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Whatapp">
								<i class="fa fa-wa"></i>
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				S&K
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Produk: <?php echo $title ?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Produk Kami 
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php foreach ($produk_rilis as $produk_rilis) { ?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<?php 	
							echo form_open(base_url('belanja/add'));
							echo form_hidden('id', $produk_rilis->id_produk);
							echo form_hidden('qty', 1);
							echo form_hidden('price', $produk_rilis->harga);
							echo form_hidden('name', $produk_rilis->nama_produk);
							//elemen redirect
							echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

						?>
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img class="qqq" src="<?php echo base_url('assets/upload/image/'.$produk_rilis->gambar) ?>" alt="<?php $produk_rilis->nama_produk ?>">

								<button type="submit" value="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Beli
								</button>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="<?php echo base_url('produk/detail/'.$produk_rilis->slug_produk) ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $produk_rilis->nama_produk ?>
									</a>

									<span class="stext-105 cl3">
										IDR <?php echo number_format($produk_rilis->harga,'0',',','.') ?>
									</span>
								</div>

								
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<style>
		wrap-slick2::after {
  content: "";
 background:url(https://www.google.co.in/images/srpr/logo11w.png) no-repeat;
  opacity: 0.2;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: 1;  
  height:100%;
  width:100%;
}
	</style>