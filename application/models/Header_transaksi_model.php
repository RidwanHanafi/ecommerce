<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// dashboard admin
	//Listing all header_transaksi null
	public function listing()
	{
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item, COUNT(header_transaksi.id_header_transaksi) AS total_row');
		$this->db->from('header_transaksi');
		//join
		$this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		//end join 
		$this->db->where('transaction_status', 'settlement');
		$this->db->where('konfirmasi IS NULL');
		$this->db->group_by('header_transaksi.id_header_transaksi', 'desc');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get(); 
		return $query->result();
	}
	//Listing all header_transaksi null
	public function listing_masuk()
	{
		$this->db->select(	'header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item, COUNT(header_transaksi.id_header_transaksi)  AS total_row');
		$this->db->from('header_transaksi');
		//join
		$this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		//end join 
		$this->db->where('transaction_status', 'settlement');
		$this->db->where('konfirmasi IS NULL');
		$this->db->group_by('header_transaksi.id_header_transaksi', 'desc');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get(); 
		return $query->result();
	}
	//Listing all header_transaksi kondisi pesanan diterima
	public function listing_terima()
	{
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item,COUNT(header_transaksi.id_header_transaksi)AS total_row');
		$this->db->from('header_transaksi');
		//join
		$this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		//end join 
		$this->db->where('transaction_status', 'settlement');
		$this->db->where('konfirmasi', 'sudah');
		$this->db->group_by('header_transaksi.id_header_transaksi', 'desc');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get(); 
		return $query->result();
	}

	//Listing all header_transaksi kondisi pesanan ditolak
	public function listing_tolak()
	{
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item,COUNT(header_transaksi.id_header_transaksi) AS total_row');
		$this->db->from('header_transaksi');
		//join
		$this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		//end join 
		$this->db->where('transaction_status', 'settlement');
		$this->db->where('konfirmasi', 'belum');
		$this->db->group_by('header_transaksi.id_header_transaksi', 'desc');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get(); 
		return $query->result();
	}
	public function listing_laporan($tanggal)
	{
		// $this->db->select('header_transaksi.nama_pelanggan,
		// 					header_transaksi.jumlah_bayar,
		// 					header_transaksi.tanggal_update,
		// 					pelanggan.nama_pelanggan,
		// 					CONCAT(header_transaksi.kecamatan,", ", header_transaksi.desa," (", header_transaksi.alamat,")" ) AS alamat,
		// 					GROUP_CONCAT(produk.nama_produk ORDER BY header_transaksi.order_id ASC SEPARATOR ", ") AS pesanan');
		// $this->db->from('header_transaksi');
		// //join
		// $this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		// $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// $this->db->join('ongkir', 'ongkir.kecamatan = header_transaksi.kecamatan', 'left');
		// $this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		// $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		// //end join 
		// $this->db->where('transaction_status', 'settlement');
		// $this->db->where('konfirmasi', 'sudah');
		// $this->db->group_by('header_transaksi.order_id', 'desc');
		// $this->db->order_by('id_header_transaksi', 'desc');
		// $query = $this->db->get(); 
		// return $query->result();
	}
	// end dashboard admin

	//Listing all header_transaksi
	public function pelanggan($id_pelanggan)
	{
		$this->db->select('header_transaksi.*,SUM(transaksi.jumlah) AS total_item, request_transaksi.transaction_status');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		//join
		$this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		//end join 
		$this->db->where('transaction_status', 'settlement');
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//Listing all header_transaksi
	public function pelanggan_blm_bayar($id_pelanggan)
	{
		$this->db->select('header_transaksi.*,SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		//join
		$this->db->join('transaksi', 'transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		//end join 
		$this->db->where('transaction_status !=', 'settlement');
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	

	//Detail header_transaksi
	public function detail($id_header_transaksi)
	{
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('id_header_transaksi', $id_header_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//Detail header_transaksi
	public function order_id($order_id)
	{
		$this->db->select('*,request_transaksi.transaction_status, ongkir.jumlah');
		$this->db->from('header_transaksi');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = header_transaksi.order_id', 'left');
		$this->db->join('ongkir', 'ongkir.kecamatan = header_transaksi.kecamatan', 'right');
		$this->db->where('header_transaksi.order_id', $order_id);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	

	// //header_transaksi sudah login
	// public function sudah_login($email,$nama_header_transaksi)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('header_transaksi');
	// 	$this->db->where('email', $email);
	// 	$this->db->where('nama_header_transaksi', $nama_header_transaksi);
	// 	$this->db->order_by('id_header_transaksi', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	
	// //Login header_transaksi
	// public function login($email, $password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('header_transaksi');
	// 	$this->db->where(array(	'email'=> $email,
	// 							'password'=> SHA1($password)));
	// 	$this->db->order_by('id_header_transaksi', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
		//Tambah
	public function tambah($pelanggan){
		$this->db->insert('header_transaksi', $pelanggan);
	}
	//edit
	public function edit($pelanggan){
		$this->db->where('id_header_transaksi', $pelanggan['id_header_transaksi']);
		$this->db->update('header_transaksi', $data);
	}
	//delete
	public function delete($pelanggan){
		$this->db->where('id_header_transaksi', $pelanggan['id_header_transaksi']);
		$this->db->delete('header_transaksi', $pelanggan);
	}
	

}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */
