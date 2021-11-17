  <!-- Shoping Cart -->
  <div class="bg0 p-t-75 p-b-85">

    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
          
    </form>
        	 <?php 

            //notifikasi berhasil pembayaran item
                if ($this->session->flashdata('konfirmasi')) {
	                echo '<div class="stext-110 alert alert-info alert-dismissible">
	                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	                echo $this->session->flashdata('konfirmasi');
	                echo '</div>';
                }else{
                	echo '<div class="stext-110 alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                  	echo $this->session->flashdata('gagal');
                  	echo '</div>';
                } ?>
          <div class="bor10 p-lr-40 p-t-30 p-b-40  m-lr-0-xl p-lr-15-sm">
           
            <h4 class="mtext-109 cl2 p-b-30 text-center ">
              Data 
            </h4>
            <!-- subtotal -->
            
            <!--  -->
            <?php 
            echo form_open(base_url('belanja/konfirmasi')); ?>
          
            <div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
                  Status Code:
                </span>
              </div>

              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="status_code" value="<?php echo $finish->status_code ?>"readonly required>
              </div>
            </div>
            
            <div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
                  Status Message:
                </span>
              </div>

              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="email" name="status_message" value="<?php echo $finish->status_message ?>" readonly required >
              </div>
            </div>

            <div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
                  Order ID:
                </span>
              </div>

              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="order_id" value="<?php  echo $finish->order_id ?>" readonly required >
              </div>
            </div>

            <div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
                  Transaction Status:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="transaction_status" value="<?php echo $finish->transaction_status ?>" readonly required >
              </div>
            </div>

             <div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
                    Bill Key:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="bill_key" value="<?php 
                  if(isset($finish->bill_key))
                  {
                  	echo $finish->bill_key;

                  }else{
                  	echo "-";
                  } ?>" readonly required >
              </div>
            </div>

            <div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
	                Biller Code:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="biller_code" value="<?php  
                  if(isset($finish->biller_code))
                  {
                  	echo $finish->biller_code;

                  }else{
                  	echo "-";
                  } ?>" readonly required >
              </div>
            </div>

			<div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
	                Bank:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="bank" value="<?php  
                  if(isset($finish->va_numbers[0]->bank))
                  {
                  	echo $finish->va_numbers[0]->bank;

                  }else{
                  	echo "-";
                  } ?>" readonly required >
              </div>
            </div>

			<div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
	                VA Number:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="va_number" value="<?php  
                  if(isset($finish->va_numbers[0]->va_number))
                  {
                  	echo $finish->va_numbers[0]->va_number;

                  }else{
                  	echo "-";
                  } ?>" readonly required >
              </div>
            </div>

			<div class="flex-w flex-t bor12 p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
	                VA Permata:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <input class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="permata_va_number" value="<?php  
                  if(isset($finish->permata_va_number))
                  {
                  	echo $finish->permata_va_number;

                  }else{
                  	echo "-";
                  } ?>" readonly required >
              </div>
            </div>

            <div class="flex-w flex-t p-t-15 p-b-10">
              <div class="size-208 w-full-ssm p-t-3">
                <span class="stext-110 cl2">
	                Panduan Pembayaran:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                  <a href="<?php echo $finish->pdf_url; ?>" target=_blank class="stext-111 cl2 plh3 ukr_checkout_input p-l-5 p-r-30" type="text" name="alamat"readonly required >Payment Guide</a>
              </div>
            </div>
            <style>
            	.konfirmasi{
            		width: 180px;
            	}
            </style>

            <!-- <div class="flex-w flex-t p-t-27 p-b-33">
              <div class="size-208">
                <span class="mtext-101 cl2">
                  Total:
                </span>
              </div>

              <div class="size-209 p-t-1">
                <span class="mtext-110 cl2">
                  Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?>
                </span>
              </div>
            </div>
           
            <button  id="pay-button" class="btn-coklat flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              Bayar
            </button> -->
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
  // $i =$this->input;
	// 	$data = array(	'id_pelanggan'		=> $i->post('id_pelanggan'),
	// 					'jumlah_transaksi'	=> $i->post('jumlah_transaksi'),
	// 					'tanggal_transaksi'	=> $i->post('tanggal_transaksi'),
	// 					'nama_pelanggan'	=> $i->post('nama_pelanggan'),
	// 					'telepon'			=> $i->post('telepon'),
	// 					'alamat'			=> $i->post('alamat')
  //         );
  //         echo $this->input->post('nama_pelanggan'); 
   
  //  echo $this->input->post('alamat'); 
  ?>