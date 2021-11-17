<!-- Blog -->
	<section class="sec-blog bg0 p-t-60 p-b-90">
		<div class="container">
			<div class="p-b-66">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Populer Produk
				</h3>
			</div>

			<div class="row">
				<?php foreach ($produk_populer as $produk_populer) {  ?>
					
				<div class="col-sm-6 col-md-4 p-b-40">
					<div class="blog-item">
						<div class="hov-img0">
							<a href="<?php echo base_url('produk/detail/'.$produk_populer->slug_produk) ?>">
								<img class="produk_populer" src="<?php echo base_url('assets/upload/image/'.$produk_populer->gambar) ?>" alt="<?php $produk->nama_produk ?>">
							</a>
						</div>

						<div class="p-t-15">
							<div class="stext-107 flex-w p-b-14">
								<span class="m-r-3">
									<span class="cl4">
										By
									</span>

									<span class="cl5">
										<?php echo $site->namaweb ?>
									</span>
								</span>

								<span>
									<span class="cl4">
										on
									</span>

									<span class="cl5">
										<?php echo date('d F Y',strtotime($produk_populer->tanggal_post))?>
									</span>
								</span>
							</div>

							<h4 class="p-b-12">
								<a href="<?php echo base_url('produk/detail/'.$produk_populer->slug_produk) ?>" class="mtext-101 cl2 hov-cl1 trans-04">
									<?php echo $produk_populer->nama_produk ?>
								</a>
							</h4>

							<p class="stext-108 cl6">
								<?php echo $produk_populer->keterangan ?>
							</p>
						</div>
					</div>
				</div> 
			<?php } ?>
				
			</div>
		</div>
	</section>