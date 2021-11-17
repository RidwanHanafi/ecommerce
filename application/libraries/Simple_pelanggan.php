<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
		//load data model user
        $this->CI->load->model('pelanggan_model');
	}

	//fungsi login
	public function login($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email, $password);
		//jika ada data user, maka create session login
		if($check){
			$id_pelanggan  	= $check->id_pelanggan;
			$nama_pelanggan = $check->nama_pelanggan;
			
			//create session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email',$email);

			//kembali ke halaman admin
			redirect(base_url(''),'refresh');
		}else{
			//jika gagal login (username dan password salah)
			$this->CI->session->set_flashdata('salah','Email atau Password salah');
			redirect(base_url('masuk'),'refresh');

		}
	}

	//fungsi cek login
	public function cek_login()
	{
		//memeriksa apakah session udah atau belum
		if ($this->CI->session->userdata('email')=="") {
			$this->CI->session->set_flashdata('warning','Anda harus login');
			redirect(base_url('masuk'),'refresh');
		}
	}

	//fungsi logout
	public function logout()
	{
		//membuang session yang diset saat login
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		//Setelah session dibuang, maka redirect ke login
		$this->CI->session->set_flashdata('keluar', 'Anda berhasil logout');
		redirect(base_url('masuk'),'refresh');
	}

	//fungsi logout jika mencoba melihat transaksi orang lain
	public function logout_transaksi()
	{
		//membuang session yang diset saat login
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		//Setelah session dibuang karena berusaha masuk transaksi orang lain, maka redirect ke login
		$this->CI->session->set_flashdata('keluar', 'Anda dipaksa keluar karena mencoba mengakses data transaksi orang lain!');
		redirect(base_url('masuk'),'refresh');
	}

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
