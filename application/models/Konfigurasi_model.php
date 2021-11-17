<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

	//listing
	public function listing(){
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}	
	//edit
	public function edit($data){
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);

	}

	//load menu kategori produk
	public function nav_produk(){
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori');

		$this->db->from('produk');



		//JOIN penggabungan 
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		//$this->db->join();
		//end
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_kategori', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	//load menu kategori produk
	public function home_kategori(){
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori');

		$this->db->from('produk');



		//JOIN penggabungan 
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		//$this->db->join();
		//end
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_kategori', 'asc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */