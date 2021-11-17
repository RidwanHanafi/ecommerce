<section class="content">
	<div class="content-wrapper">
    	<div class="content">
      		<div class="container">
		        <div class="row">
       				<div class="col-12">
            			<div class="card">
							<div class="card-body">
							<?php
							//notif jika data berhasil ditambah
							if($this->session->flashdata('edit')){
								echo '<div class="alert alert-success alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<i class="icon fas fa-info "></i>';
								echo $this->session->flashdata('edit');
								echo '</div>';
							}
							?>
							<table class="table table-bordered table-responsive-md" id="example1">
								<thead class="thead-dark">
									<tr>
										<th style="text-align:center;">NO</th>
										<th style="text-align:center;">KECAMATAN</th>
										<th style="text-align:center;">JUMLAH</th>
										<th style="text-align:center;">STATUS</th>
										<th style="text-align:center;">TANGGAL UBAH</th>
										<th style="text-align:center;">ACTION</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($ongkir as $ongkir) { ?>
									<tr>
										<td style="text-align:center;"><?php echo $no;$no++ ?></td>
										<td><?php echo $ongkir->kecamatan ?></td>
										<td style="text-align:right;"> 
										<?php if($ongkir->jumlah==0 && $ongkir->status=='aktif'){ ?>
											Gratis Ongkir 
										<?php }else if($ongkir->jumlah==0 && $ongkir->status==NULL){ ?>
											-
										<?php }else{ ?>
											Rp.
										 <?php echo number_format($ongkir->jumlah, '0',',','.'); 
										} ?> </td>
										<td style="text-align:center; text-transform: uppercase;">
										<?php if($ongkir->status==NULL){ ?>
											-
										<?php }else{
											echo $ongkir->status; 
										} ?>
										</td>
										<td style="text-align:center;">
										<?php if($ongkir->tanggal =='0000-00-00 00:00:00'){?>
											-
										<?php }else{
										 echo date('d-m-Y',strtotime($ongkir->tanggal));
										}
										 ?></td>
										<td>
											<a href="<?php echo base_url('admin/ongkir/edit/' .$ongkir->id_kecamatan) ?>"
												class="btn btn-warning btn-xs"><i class="fas fa-edit">
												</i> Edit</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
		 		</div>
 			</div>
		</div>
	</div>
</section>
<style >
	.dataTables_filter {
		width: 50%;
		float: right;
		text-align: left;
	}
</style>