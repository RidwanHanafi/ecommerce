<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url()?>assets/template2/images/toko/banner-registrasi.png');">
		<h2 class="ltext-105 cl0 txt-center">
			<?php echo $title ?>
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<span class="center align-middle mtext-105 cl2 txt-center p-b-30">
							<?php 

							if ($this->session->flashdata('salah')) {
								echo '<div>';
								echo $this->session->flashdata('salah');
								echo '</div>';
							}

							if ($this->session->flashdata('keluar')) {
								echo '<div>';
								echo $this->session->flashdata('keluar');
								echo '</div>';
							}
							
							if ($this->session->flashdata('awas')) {
								echo '<div>';
								echo $this->session->flashdata('awas');
								echo '</div>';
							}
							if ($this->session->flashdata('berhasil')) {
								echo '<div>';
								echo $this->session->flashdata('berhasil');
								echo '</div>';
							}
							if ($this->session->flashdata('fail')) {
								echo '<div>';
								echo $this->session->flashdata('fail');
								echo '</div>';
							}

							 ?>			
						</span>
					</form> 
				</div>

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<?php 
					//Menampilkan error
					echo validation_errors('<div class="stext-110 alert alert-info alert-dismissible" style="margin: 0px 550px 0px 150px;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');

					//form open
					echo form_open(base_url('masuk')); ?>
					<div>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Masuk
						</h4>


						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email" value="<?php echo set_value('email') ?>" required>
							<img class="how-pos4 pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
							<img class="icon_password pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/password.png" alt="ICON">
						</div>
					
						<h4 class="ukuranfont mtext-105 cl2 txt-center">
							Lupa password? <a class="font_masuk" href="<?php echo base_url('masuk/lupapassword') ?>">Lupa password</a>
						</h4>
						<h4 class="ukuranfont mtext-105 cl2 txt-center p-b-20">
							Belum punya akun? <a class="font_masuk" href="<?php echo base_url('registrasi') ?>">Registrasi</a>
						</h4>

						<button class="btn-coklat flex-c-m stext-101 cl0 size-119 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
							Login
						</button>
						
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>	
	