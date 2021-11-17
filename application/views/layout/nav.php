<?php 
//ambil data dari konfigurasi_model
$site = $this->konfigurasi_model->listing();
$listing_kategori = $this->produk_model->listing_kategori();
$listing_kategori_m = $this->produk_model->listing_kategori();
$nav_produk_mobile = $this->kategori_model->listing();
$pelanngan =$this->pelanggan_model->listing();
 ?>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="<?php echo base_url('') ?>" class="logo">
						<img src="<?php echo base_url('assets/upload/image/logo/'.$site->logo) ?>" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="menu">
								<a class="" href="<?php echo base_url() ?>">Home</a>
							</li>
							

							<li  class="label1" data-label1="hot">
								<a href="<?php echo base_url('produk') ?>">Produk</a>
								<ul class="sub-menu">
									<?php foreach ($listing_kategori as $listing_kategori) { ?>
									<li><a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>"><?php echo $listing_kategori->nama_kategori ?></a></li>
									<?php } ?>
								</ul>
							</li>

							<!-- <li>
								<a href="shoping-cart.html">Features</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li> -->
							<li>
								<a href="<?php echo base_url('kontak') ?>">Kontak</a>
							</li>
							
							<li>
								<a href="<?php echo base_url('tentang') ?>">Tentang</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<!-- <div class="flex-c-m h-full p-r-24">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>
						</div> -->
						<?php 
							//cek data belanjaan ada / tdk
							$cek_keranjang= $this->cart->contents();
							?>	
						<div class="flex-c-m h-full p-l-18 p-r-25">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo count($cek_keranjang) ?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('assets/upload/image/logo/'.$site->logo) ?>" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>
				<?php 
					//cek data belanjaan ada / tdk
					$cek_keranjang_mobile= $this->cart->contents();

					?>
				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo count($cek_keranjang) ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<?php if($this->session->userdata('email')){ ?>
					<li class="p-b-13">
						<a href="<?php echo base_url('dashboard/belanja') ?>" class=" stext-102 cl2 hov-cl1 trans-04">
							<?php echo $this->session->userdata('nama_pelanggan'); ?>
						</a>
					</li>
					<?php }else{ ?>

					<li class="p-b-13">
						<a href="<?php echo base_url('masuk') ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Login
						</a>
					</li>

					<?php } ?>
				<li>
					<a href="<?php echo base_url() ?>">Home</a>
				</li>

				<li>
					<a href="<?php echo base_url('produk') ?>"class="label1 rs1" data-label1="hot">Produk</a>
					<ul class="sub-menu active-menu">
						<?php foreach ($listing_kategori_m as $listing_kategori_m) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$listing_kategori_m->slug_kategori) ?>"><?php echo $listing_kategori_m->nama_kategori ?></a></li>
						<?php } ?>
					</ul>
				</li>

				<li>
					<a href="<?php echo base_url('tentang') ?>">Tentang</a>
				</li>

				<li>
					<a href="<?php echo base_url('kontak') ?>">Kontak</a>
				</li>

				<?php if($this->session->userdata('email')){ ?>
					<li class="p-b-13">
						<a href="<?php echo base_url('masuk/logout') ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Logout
						</a>
					</li>
					<?php }?>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?php echo base_url() ?>assets/template2/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					
					<?php if($this->session->userdata('email')){ ?>
					<li class="p-b-15">
						<a href="<?php echo base_url('dashboard/belanja') ?>" class="profil_pelanggan stext-102 cl2 hov-cl1 trans-04">
							<?php echo $this->session->userdata('nama_pelanggan'); ?>
						</a>
					</li>
					<?php }else{ ?>

					<li class="p-b-15">
						<img class=" pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/user.svg" alt="ICON"><a href="<?php echo base_url('masuk') ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Login
						</a>
					</li>

					<?php } ?>

					<li class="p-b-15">
						<img class=" pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/home.svg" alt="ICON"><a href="<?php echo base_url() ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-15">
						<img class=" pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/cart.svg" alt="ICON"><a href="<?php echo base_url('belanja') ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Keranjang
						</a>
					</li>

					<li class="p-b-15">
						<img class=" pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/phone-call.svg" alt="ICON"><a href="<?php echo base_url('kontak') ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Kontak
						</a>
					</li>

					<?php if($this->session->userdata('email')){ ?>
					<li class="p-b-15">
						<img class=" pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/exit.svg" alt="ICON"><a href="<?php echo base_url('masuk/logout') ?>" class="stext-102 cl2 hov-cl1 trans-04">
							Logout
						</a>
					</li>
					<?php }?>
				</ul>
				<div class="sidebar-gallery w-full p-tb-30">
					<img width="100%" height="auto" class="pointer-none" src="<?php echo base_url()?>assets/template2/images/open_toko.jpg" alt="image"><a href="<?php echo base_url('masuk/logout') ?>" class="stext-102 cl2 hov-cl1 trans-04">
				</div>	
				<div class="sidebar-gallery w-full p-tb-30">
					<!-- <span class="mtext-101 cl5">
						Follow kami di:
						<?php if (!empty($site->instagram)) {?>
							<a href="<?php echo $site->instagram ?>">Instagram</a>
						<?php } ?>
						<script src="https://apps.elfsight.com/p/platform.js" defer></script>
						<div class="elfsight-app-c1148b67-e670-4aed-a1b0-3007f00b6d5c"></div>
					</span> -->

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<!-- <div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery" 
							style="background-image: url('<?php echo base_url() ?>assets/template2/images/gallery-01.jpg');"></a>
						</div> -->

						<!-- item gallery sidebar -->
						<!-- <div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery" 
							style="background-image: url('<?php echo base_url() ?>assets/template2/images/gallery-02.jpg');"></a>
						</div> -->
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
	<!-- id="lblGreetings" -->
						<label>
						<?php
						date_default_timezone_set("Asia/Jakarta");

						$b = time();
						$hour = date("G",$b);

						if ($hour>=0 && $hour<=11)
						{
							echo "Selamat Pagi";
						}
						elseif ($hour >=12 && $hour<=14)
						{
							echo "Selamat Siang";
						}
						elseif ($hour >=15 && $hour<=17)
						{
							echo "Selamat Sore";
						}
						elseif ($hour >=17 && $hour<=18)
						{
							echo "Selamat Petang";
						}
						elseif ($hour >=19 && $hour<=23)
						{
							echo "Selamat Malam";
						}

						?>
						</label>
					</span>

					<p class="stext-108 cl6 p-t-27">
						Semoga harimu menyenangkan
					</p>
				</div>

			</div>
		</div>
	</aside>

				
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
	
		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Keranjangku
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer ">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
		
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php 
						//jika tidak ada data belanja
					if (empty($cek_keranjang)) { ?>	
					<a class="header-cart-item flex-w flex-t m-b-12">
						<p class="stext-110">Keranjang Belanja Kosong</p>
						<span class="jika_kosong stext-110" style="background-image: url('<?php echo base_url() ?>assets/template2/images/EmbarrassedFittingFulmar.webp?>'); no-repeat center"></span>
					</a>
					<?php 
						//jika ada
					
						}else{ 
							//total belanja
							$total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
							//menampilkan data belanja
							foreach ($cek_keranjang as $cek_keranjang) {
								$id_produk = $cek_keranjang['id'];
								//ambil data produk
								$produknya = $this->produk_model->detail($id_produk)
							?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="keranjang_belanja header-cart-item-img hov-img0">
							<img class="keranjang_belanja" src="<?php echo base_url('assets/upload/image/'.$produknya->gambar) ?>" alt="<?php echo $cek_keranjang['name'] ?>">
						</div>
						
						<div class="header-cart-item-txt p-t-8">
							<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk)?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $cek_keranjang['name'] ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $cek_keranjang['qty'] ?> x Rp. <?php echo number_format($cek_keranjang['price'],'0',',','.') ?> = Rp. <?php echo number_format($cek_keranjang['subtotal'],'0',',','.') ?>
							</span>
						</div>
					</li>
					<?php 
						}//foreach cek_keranjang

						}//end if ?>	
				</ul>
			</div>
			
			<div class="w-full">
					
					<div class="header-cart-total w-full p-tb-40">
						<?php if(!empty($cek_keranjang)) { ?>
							Total:
						<?php echo $total_belanja; } ?>
					</div>
					<div class="header-cart-buttons flex-w w-full">
						<a href="<?php echo base_url('belanja') ?>" class="btn-coklat flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Keranjang
						</a>

						<a href="<?php echo base_url('snap') ?>" class="btn-coklat flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
		</div>
	</div>