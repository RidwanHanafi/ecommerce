<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing all transaksi
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing all transaksi berdasarkan header
	public function order_id($order_id)
	{
		$this->db->select('transaksi.*, 
						produk.nama_produk,
						produk.kode_produk');
		$this->db->from('transaksi');
		//join dgn produk
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		//end join
		$this->db->where('order_id', $order_id);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	//Detail transaksi
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//Detail slug transaksi
	public function read($slug_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('slug_transaksi', $slug_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//Login transaksi
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where(array(	'username'=> $username,
								'password'=> SHA1($password)));
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($transaksi_item){
		$this->db->insert('transaksi', $transaksi_item);
	}
	//edit
	public function edit($order_id, $konfirmasi){
		$this->db->query(	"update header_transaksi 
							set konfirmasi='$konfirmasi' 
							where order_id='$order_id' ");
	}
	//delete
	public function delete($data){
		$this->db->where('id_transaksi', $transaksi_item['id_transaksi']);
		$this->db->delete('transaksi', $transaksi_item);
	}

	public function konfirmasi(){
		$this->db->insert('konfirmasi', $data);
	}

	
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
