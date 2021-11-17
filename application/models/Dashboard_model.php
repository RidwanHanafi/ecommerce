<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function listing_masuk(){
		$this->db->select('*');
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
		return $query->num_rows();
	}
	public function listing_terima(){
		$this->db->select('*');
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
		return $query->num_rows();
	}

	public function listing_tolak(){
		$this->db->select('*');
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
		return $query->num_rows();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */