<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing all pelanggan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//Detail pelanggan
	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//login pelanggan
	public function login($email, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array( 'email' => $email,
								'password' => SHA1($password)
							));
		$this->db->where('status_pelanggan', 'Aktif');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//pelanggan sudah login
	public function sudah_login($email,$nama_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('email', $email);
		$this->db->where('nama_pelanggan', $nama_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// //Login pelanggan
	// public function login($email, $password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('pelanggan');
	// 	$this->db->where(array(	'email'=> $email,
	// 							'password'=> SHA1($password)));
	// 	$this->db->order_by('id_pelanggan', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	//Tambah
	public function tambah($data){
		$this->db->insert('pelanggan', $data);
	}
	//edit
	public function edit($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}
	//delete
	public function delete($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan', $data);
	}

	public function insert_token($data){
		$this->db->insert('token', $data);
	}
	public function insert_token_user($user_token){
		$this->db->insert('token', $user_token);
	}

	// Reset Password
	public function reset_password($data){
		$this->db->where('email', $data['email']);
		$this->db->update('pelanggan', $data);
		
		
	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
