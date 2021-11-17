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
                            echo $this->session->userdata('reset_email'); 
							if ($this->session->flashdata('salah')) {
								echo '<div>';
								echo $this->session->flashdata('salah');
								echo '</div>';
                            }
                             ?>			
                

						</span>
					</form> 
				</div>
				
				<div class=" size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<?php 
					
					//form open
					echo form_open(base_url('masuk/ubahpassword')); ?>
					<div>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Password baru
						</h4>


						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password1" id="password1" placeholder="Password"  required>
							<img class="how-pos4 pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/password.png" alt="ICON">
						</div>
						<?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password2" id="password2" placeholder="New Password" required>
							<img class="how-pos4 pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/password.png" alt="ICON">
						</div>
						<?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
						<button class="btn-coklat flex-c-m stext-101 cl0 size-119 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
							Ubah
						</button>
						
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>	
	