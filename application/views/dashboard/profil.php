<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<?php include('menu.php') ?>
	</div>
	<div class="ltext-105 cl5 txt-center respon1">
		<span>
			<label><?php echo $title ?></label>
		</span>
<style>
	.sss{
		padding-left:150px;
		padding-right:150px;

	}
	
</style>
		<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">

		<div class="sss container" >
			<div class="profil-frame-1 flex-w flex-tr">
				
				<div class="profil-frame-2 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<?php 
					
					//Menampilkan error
					echo validation_errors('<div class="stext-110 alert alert-info alert-dismissible" style="margin: 0px 550px 0px 150px;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');

					//form open
					echo form_open(base_url('dashboard/profil')); ?>
					<div>
						<?php 
						//notifikasi
						if($this->session->flashdata('berhasil')){
							echo '<div class="stext-110 alert alert-dismissible" style="margin: 0px 499px 10px 0px; text-align:left; color:green; text">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo $this->session->flashdata('berhasil');
							echo '</div>';
						}
			 			?>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama_pelanggan" placeholder="Nama Pengguna" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
							<img class="how-pos4 pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/user2.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input style="background-color:#EEEDED" class="good stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly>
							<img class="how-pos4 pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-5 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
							<img class="icon_password pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/password.png" alt="ICON">
						</div>

						<div class="ukr m-b-10 how-pos4-parent">
						<span class="stext-111 text-danger"><img src="<?php echo base_url()?>assets/template2/images/icons/exclamation-mark.png ?>"> Password minimal 6 karakter atau biarkan kosong jika tidak ingin mengganti password</span>
						</div>
						
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="telepon" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required>
							<img class="icon_password pointer-none" src="<?php echo base_url()?>assets/template2/images/icons/password.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="alamat" placeholder="Alamat" value="<?php echo $pelanggan->alamat ?>" required><?php echo $pelanggan->alamat ?></textarea>
						</div>

						

						<button style="width: 25%; margin:0 auto; display:block;" class="btn-coklat flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
							Update
						</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>	
	
	</div>
	
</div>