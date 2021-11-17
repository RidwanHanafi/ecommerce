<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('header_transaksi_model');
		//Proteksi Halaman
		$this->simple_login->cek_login();
	}
	public function index()
	{
		$header_transaksi = $this->db->query("SELECT header_transaksi.nama_pelanggan,
                            header_transaksi.jumlah_bayar,
                            header_transaksi.order_id,
                            header_transaksi.tanggal_update,
                            pelanggan.nama_pelanggan,
                            SUM(transaksi.jumlah) AS total_item,
                            CONCAT(header_transaksi.kecamatan,', ', header_transaksi.desa,' (', header_transaksi.alamat,')' ) AS alamat,
                            GROUP_CONCAT(produk.nama_produk ORDER BY header_transaksi.order_id ASC SEPARATOR ', ') AS pesanan
                        FROM header_transaksi
                        LEFT JOIN request_transaksi
                        ON request_transaksi.order_id = header_transaksi.order_id
                        LEFT JOIN  pelanggan
                        ON pelanggan.id_pelanggan = header_transaksi.id_pelanggan
                        LEFT JOIN ongkir 
                        ON ongkir.kecamatan = header_transaksi.kecamatan
                        LEFT JOIN transaksi
                        ON transaksi.order_id = header_transaksi.order_id
                        LEFT JOIN produk
                        ON produk.id_produk = transaksi.id_produk
                        WHERE request_transaksi.transaction_status = 'settlement'
                        AND header_transaksi.konfirmasi = 'sudah'
                        GROUP BY header_transaksi.order_id DESC
                        ORDER BY header_transaksi.id_header_transaksi DESC 
                        ");
		$data = array(	'title' => 'Laporan',
						'header_transaksi'	=> $header_transaksi,
						'isi'	=> 'admin/laporan/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function cetak(){
		$tanggal			= $this->input->post('tanggal');
		
		 $header_transaksi = $this->db->query("SELECT header_transaksi.nama_pelanggan,
                            header_transaksi.jumlah_bayar,
                            header_transaksi.order_id,
                            header_transaksi.tanggal_update,
                            pelanggan.nama_pelanggan,
                            SUM(transaksi.jumlah) AS total_item,
                            CONCAT(header_transaksi.kecamatan,', ', header_transaksi.desa,' (', header_transaksi.alamat,')' ) AS alamat,
                            GROUP_CONCAT(produk.nama_produk ORDER BY header_transaksi.order_id ASC SEPARATOR ', ') AS pesanan
                        FROM header_transaksi
                        LEFT JOIN request_transaksi
                        ON request_transaksi.order_id = header_transaksi.order_id
                        LEFT JOIN  pelanggan
                        ON pelanggan.id_pelanggan = header_transaksi.id_pelanggan
                        LEFT JOIN ongkir 
                        ON ongkir.kecamatan = header_transaksi.kecamatan
                        LEFT JOIN transaksi
                        ON transaksi.order_id = header_transaksi.order_id
                        LEFT JOIN produk
                        ON produk.id_produk = transaksi.id_produk
                        WHERE request_transaksi.transaction_status = 'settlement'
                        AND header_transaksi.konfirmasi = 'sudah'
                        AND (header_transaksi.`tanggal_update` BETWEEN '$tanggal')
                        GROUP BY header_transaksi.order_id DESC
                        ORDER BY header_transaksi.id_header_transaksi DESC 
                        ");
		//$header_transaksi 	= $this->header_transaksi_model->listing_laporan($tanggal);
		$site				= $this->konfigurasi_model->listing();
		
		$data =array(	'title' =>'Detail Transaksi',
						'header_transaksi' => $header_transaksi,
						'tanggal'	=> $tanggal,
						'site'		=> $site,
						'isi' 	=>'admin/laporan/cetak'
						);
		$this->load->view('admin/laporan/cetak', $data, FALSE);
	}

	

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */