<?php $alamat = $this->konfigurasi_model->listing(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo '&nbsp'; ?></title>
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
         .no-border{
          

        }
        table{
            width: 100%;
            border: solid thin #000;
            border-collapse:  collapse;
        }
       
        td, th{
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: :top;
             border: 1px solid #333;
        }
        th{
            background-color: #F5F5F5;
            font-weight: bold;
        }
        h1{
            text-align: left;
            font-size: 19px;
            text-transform: uppercase;
        }
        h2{
            text-align: center;
            font-size: 16px;
            text-transform: uppercase;
        }
         small {
            font-weight: normal;
        }
    </style>
   
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/css/custom.css">
</head>
<body onload="print()">
    <div class="cetak">
       <table style="border: none">
        <thead>
            <th style="border:none;"><img class="tampil-logo" src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" style="height:50px; width:"auto"></th>
            <th style="border:none;"><h1 >Laporan Keuangan <?php echo $site->namaweb ?></h1>
                <small>
                <?php echo $alamat->alamat ?>
                </small>
            </th>
        </thead>
        </table>
        <br>
        <br>
         <span style="text-align: center;">Ket: Tahun-Bulan-Hari</span><br>
        <span style="text-align: center;">Antara: <?php echo str_replace("AND","Sampai",$tanggal) ?></span>
        <br>
        <br>
        <table>
        <thead>
            <tr>
                <th class="bold-center">NO</th>
                <th class="bold-1">PELANGGAN</th>
                <th class="bold-1">KODE TRANSAKSI</th>
                <th class="bold-1">TANGGAL TRANSAKSI</th>
                <th class="bold-1">NAMA PRODUK</th>
                <th class="bold-1">JUMLAH ITEM</th>
                <th>HARGA</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; $jumlah=0; foreach ($header_transaksi->result()  as $header_transaksi) {?>
        <tr>
            <td class="unbold-center"><?php echo $i ?></td>
            <td class="unbold"><?php echo $header_transaksi->nama_pelanggan ?></td>
            <td class="unbold-1"><?php echo $header_transaksi->order_id ?></td>
            <td class="unbold"><?php echo date('d-m-Y H:i',strtotime($header_transaksi->tanggal_update)) ?></td>
            <td class="unbold-1"><?php echo $header_transaksi->pesanan ?></td>
            <td class="padding-5"><?php echo $header_transaksi->total_item ?></td>
            <td class="padding-5" style="font-weight: normal">Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?></td>

        </tr>
        <?php
        $jumlah = $header_transaksi->jumlah_bayar+$jumlah;
        $i++; } ?>
        <tr>
             <th class="bold-1"colspan="6" style="text-align: center">Jumlah Pendapatan </th>
             <th class="padding-5" style="font-weight: bold; text-align: right;">Rp. <?php echo number_format($jumlah,'0',',','.') ?></th>
        </tr>
        </tbody>
        </table>
        <br>
        <br>
        
        <p style="text-align: right"><?php $date = date("d F Y"); echo "Tanggal $date";   ?></p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p style="text-align: right;padding-right: 30px;"><?php echo $this->session->userdata('nama'); ?></p>
    </div>
</body>
</html>
