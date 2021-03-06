<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url() ?>assets/template2/images/jabat_tangan.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Kontak
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 w-full-md">
					<div class="item-slick1" style="background-image: url(<?php echo base_url() ?>assets/template2/images/toko/kontak-removebg-fix.png);">
					</div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<img src="<?php echo base_url('assets/template2/images/icons/Linearicons-Free-v1.0.0/SVG/map-marker.svg') ?>">
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Alamat
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<?php echo $site->alamat ?>
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<img src="<?php echo base_url('assets/template2/images/icons/Linearicons-Free-v1.0.0/SVG/phone-handset.svg') ?>">
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Ayo Tanya!
							</span>
							<br>
							<br>
							<a href="<?php echo $site->telepon ?>" target="_blank" rel="nofollow" title="whatapp" class="telepon stext-115 cl1 size-213 p-t-18">
								<?php echo $site->telepon ?>
							</a>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<img src="<?php echo base_url('assets/template2/images/icons/Linearicons-Free-v1.0.0/SVG/envelope.svg') ?>">
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email Support
							</span>
							<br>
							<br>
							<p><a href = "mailto:<?php echo $site->email ?>?subject=Keluhan atau Masukan
&body=Berikan sebuah ide untuk kami!" class="telepon kontak stext-115 cl1 size-213 p-t-18">
								<?php echo $site->email ?>
							</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="-7.652803" data-map-y="110.284246" data-pin="<?php echo base_url() ?>assets/template2/images/toko/markerku.png ?>" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>
	<div class="size-303" id="google_map" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>