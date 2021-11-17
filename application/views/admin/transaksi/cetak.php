<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css" media="print">
       
    	body{
    		font-size: 12px;
    		font-family: Helvetica,sans-serif;
    	}
    	.cetak{
    		width: 19cm;
    		height: 27cm;
    		padding: 1cm;
    	}
    	table{
    		border: solid thin #000;
    		border-collapse:  collapse;
    	}
    	td, th{
    		padding: 3mm 6mm;
    		text-align: left;
    		vertical-align: :top;
    	}
    	th{
    		background-color: #F5F5F5;
    		font-weight: bold;
    	}
    	h1{
    		text-align: center;
    		font-size: 18px;
    		text-transform: uppercase;
    	}
    </style>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/css/custom.css">
</head>
<body onload="print()">
	<div class="cetak">
       
        <img class="tampil-logo" src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" style="height:50px; width:"auto">

    	<h1>DETAIL TRANSAKSI <?php echo $site->namaweb ?></h1>
      
    	<table style="width: 100%;" id="example1">
            <tr>
              <th style="padding-left: 30px;">Kode Transaksi</th>
                <td style=" padding-right: 30px; height: 20px;font-weight: bold; font-size: 15px;"><?php echo $header_transaksi->order_id?></td>
            </tr>
            <tr>
              <th style="padding-left: 30px;font-weight: normal;">Atas Nama</th>
                <td style=" padding-right: 30px;height:2-px;"><?php echo $atas_nama->nama_pelanggan?></td>
            </tr>
            <tr>
              <th style="padding-left: 30px;font-weight: normal;">Tanggal Transaksi</th>
                <td style=" padding-right: 30px; height: 20px;"><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
            </tr>
            <tr>
              <th style="padding-left: 30px;font-weight: normal;">Alamat</th>
                <td style="padding-right: 30px; height: 20px;">Kec. <?php echo $header_transaksi->kecamatan,', desa ',$header_transaksi->desa,' (', $header_transaksi->alamat,')' ?></td>
            </tr>
             <tr>
              <th style="padding-left: 30px;font-weight: normal;">Ongkos Kirim</th>
                <td style="padding-right: 30px; height: 20px;">+Rp. <?php echo number_format($header_transaksi->jumlah,'0',',','.')  ?></td>
            </tr>
             <tr>
              <th style=" padding-left: 30px;">Total Pembayaran</th>
                <td style=" padding-right: 30px; height: 20px;font-weight: bold; font-size: 15px;">Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.')  ?></td>
            </tr>
            <tr>
              <th style="padding-left: 30px;">Status Bayar</th>
                <td style=" padding-right: 30px; height: 20px;font-size: 15px;"><?php if($header_transaksi->transaction_status=='settlement'){echo '<span style="color:Green; font-weight:bold;">Berhasil</span>';}?></td>
            </tr>
        </table>
        <br>
        <br>
		<table class="center">
        <thead>
			<tr>
				<th class="bold-center">NO</th>
				<th class="bold-1">KODE</th>
				<th class="bold-1">NAMA PRODUK</th>
				<th class="padding-5">JUMLAH</th>
				<th class="padding-5">HARGA</th>
				<th class="padding-5">SUB TOTAL</th>
			</tr>
        </thead>
        <tbody>
        <?php $i=1; foreach ($transaksi as $transaksi) {?>
        <tr>
            <th class="unbold-center"><?php echo $i ?></th>
            <th class="unbold"><?php echo $transaksi->kode_produk ?></th>
            <th class="unbold-1"><?php echo $transaksi->nama_produk ?></th>
            <th class="unbold-2"><?php echo number_format($transaksi->jumlah) ?></th>
            <th class="unbold-2">Rp. <?php echo number_format($transaksi->harga,'0',',','.') ?></th>
            <th class="unbold-2">Rp. <?php echo number_format($transaksi->total_harga,'0',',','.') ?></th>
        </tr>
        <?php $i++; } ?>
        </tbody>
      	</table>
    </div>
</body>
</html>
