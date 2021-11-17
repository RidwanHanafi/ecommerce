<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing all kecuali nama produk dan order by order_id
	public function listing($id_pelanggan)
	{
		$this->db->select(	'transaksi.order_id,
							request_transaksi.*,SUM(transaksi.jumlah) AS total_item');
		$this->db->from('transaksi');

		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = transaksi.order_id', 'left');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->where('transaction_status', 'settlement');
		$this->db->group_by('transaksi.order_id');
		$this->db->order_by('transaction_time', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//menampilkan nama produk saja
	public function nama_produk($id_pelanggan)
	{
		$this->db->select('produk.nama_produk');
		$this->db->from('transaksi');
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = transaksi.order_id', 'left');
		$this->db->where('id_pelanggan', $id_pelanggan);
		//$this->db->where('transaksi.order_id', $order_id);
		$this->db->where('transaction_status', 'settlement');
		$this->db->order_by('transaction_time', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function order_id($id_pelanggan){
		$this->db->select('request_transaksi.order_id');
		$this->db->from('request_transaksi');
		$this->db->join('transaksi', 'transaksi.order_id = request_transaksi.order_id', 'left');
		$this->db->where('transaction_status', 'settlement');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('transaction_time', 'desc');
		$this->db->group_by('request_transaksi.order_id');
		$query = $this->db->get();
		return $query->result();
	}



	
}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */
