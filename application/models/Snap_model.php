<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Snap_model extends CI_Model {
public function __construct()
	{
		
		parent::__construct();
		$this->load->database();
		
	}
	public function listing($id_pelanggan){
		$this->db->select('request_transaksi.*');
		$this->db->from('request_transaksi');
		$this->db->join('header_transaksi', 'header_transaksi.order_id = request_transaksi.order_id', 'left');
		$this->db->where('id_pelanggan', $id_pelanggan);
		// $this->db->where('transaction_status !=', 'settlement');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//Detail transaksi
	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('request_transaksi');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	public function insert($data)
	{
		return $this->db->insert('request_transaksi', $data);
	}
	// lokasi
	public function kecamatan(){
		$this->db->select('kecamatan.*');
		$this->db->from('kecamatan');
		$this->db->join('kabupaten', 'kabupaten.id = kecamatan.regency_id', 'left');
		$this->db->where('kabupaten.name', 'kabupaten magelang');
				
				
	}
}

/* End of file Konfirmasi.php */
/* Location: ./application/models/Konfirmasi.php */