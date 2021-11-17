 <?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "key: ba8586473106b327c25b3c364c1e6278"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   $provinsi = json_decode($response,true) ;
// }
?>
  <!-- Shoping Cart -->
  <div class="bg0 p-t-75 p-b-85">

    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
          <div class="m-l-25 m-r--70 m-lr-0-xl">
          <div class="wrap-table-shopping-cart">
            <table class="table-shopping-cart">
              <tr class="table_head">
                <th class="column-1">Produk</th>
                <th class="column-2"></th>
                <th class="column-3">Harga</th>
                <th class="column-4 text-center">Total</th>
                <th class="column-5">Subtotal</th>
                  <!-- <th class="column-6" width="14%">Update</th> -->
                </tr>

                <?php
                //loop keranjang belanja
                foreach ($keranjang as $keranjang) {
                  
                  //ambil data produk
                  $id_produk = $keranjang['id'];
                  $produk = $this->produk_model->detail($id_produk);
                  //form update per item
                  // echo "<pre>";
                  // print_r($keranjang);
                 ?> 
                <tr class="table_row">
                  <td class="column-1">
                    <a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="keranjang_belanja how-itemcart1" type="submit" name="hapus">
                      <img class="keranjang_belanja" src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                    </a>
                  </td>
                  <td class="column-2"><?php echo $keranjang['name'] ?></td>
                  <td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
                  <td class="column-4 text-center" > <?php echo $keranjang['qty']; ?></td>
                  <td class="column-5">Rp. 
                    <?php 
                    $sub_total = $keranjang['price'] * $keranjang['qty']; 
                    echo number_format($sub_total,'0',',','.'); 
                    ?>
                  </td>
                </tr>

                  <?php 
                  //echo form_close
                 
                  } //end looping 
                ?>
              </table>
            </div>
          </div>
        </div>
        
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
          <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
            <?php 
            //notifikasi berhasil dihapus seluruh item
                if ($this->session->flashdata('hapus')) {
                  echo '<div class="stext-110 alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                  echo $this->session->flashdata('hapus');
                  echo '</div>';
                } ?>
            <h4 class="mtext-109 cl2 p-b-30">
              Data Keranjang
            </h4>
            <!-- subtotal -->
          
           
            <!--  -->
            <form id="payment-form" method="post" accept-charset="utf-8" action="<?=base_url()?>snap/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
            <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total(); ?>">
            <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
            <div class="flex-w flex-t p-b-13">
              <div class="size-208">
                <span class="stext-110 cl2">
                  Nama:
                </span>
              </div>

              <div class="size-209">
                <span class="stext-111 cl2">
                  <input class="long" type="text" name="atas_nama" value="<?php echo $atas_nama ?>" readonly>
                </span>
              </div>
            </div>
            
            <div class="flex-w flex-t p-t-15 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Email:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  <input class="long" type="email" name="email" value="<?php echo $email ?>" readonly>
                </span>
              </div>
            </div>
<style type="text/css">
  .long{
    border: none;
    overflow: auto;
}

</style>
<script type="text/javascript">
  var insideHeight = document.getElementById("long").scrollHeight;
document.getElementById("container").style.height = insideHeight + 'px';
</script>
            <div class="flex-w flex-t p-t-15 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Telepon:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  <input class="long" type="text" name="telepon" value="<?php  echo $telepon ?>"readonly>
                </span>
              </div>
            </div>

            <div class="flex-w flex-t p-t-15 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Kecamatan:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  <input class="long" type="text" name="kecamatan" value="<?php  echo $kecamatan ?>"readonly>
                </span>
              </div>
            </div>
           
           <div class="flex-w flex-t p-t-15 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Desa:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  <input class="long" type="text" name="desa" value="<?php  echo $desa ?>" readonly>
                </span>
              </div>
            </div>
           <div class="flex-w flex-t p-t-15 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Detail Alamat:
                </span>
              </div>
              <div class="size-209 p-r-0 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  <textarea class=" size-110 " name="alamat" value="<?php echo $alamat ?>" readonly><?php echo $alamat ?></textarea>
                </span>
              </div>
            </div>
            <div class="flex-w flex-t bor12 p-t-5 p-b-15">
            </div>
            <div class="flex-w flex-t p-t-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Sub produk:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?>
                </span>
              </div>
            </div>
            <div class="flex-w flex-t p-t-5 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Ongkos Kirim:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  Rp. <?php echo number_format($ongkir,'0',',','.') ?>
                </span>
              </div>
            </div>
            <div class="flex-w flex-t p-t-27 p-b-33">
              <div class="size-208">
                <span class="mtext-101 cl2">
                  Total:
                </span>
              </div>

              <div class="size-209 p-t-1">
                <span class=" mtext-110 cl2">
                  Rp. <?php $total = $this->cart->total()+$ongkir;
                  echo number_format($total,'0',',','.') ?>
                  
                </span>
              </div>
            </div>
            
            <a href="" type="submit" id="pay-button" class="btn-coklat flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              Pembayaran
            </a>
            </form>
            <div class="flex-w flex-t p-t-15 p-b-15">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">
                  Ket:
                </span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="stext-111 cl2">
                  Pastikan data anda benar.<br> Ubah data? <a href="<?php base_url('belanja') ?>">Klik</a>
                </span>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- <script type="text/javascript">

  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
  
  $.ajax({
    url: '<?=base_url()?>snap/token',
    cache: false,

    success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {
        
        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
});

</script> -->


</body>
</html>
