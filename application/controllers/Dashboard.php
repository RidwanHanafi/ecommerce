<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('transaksi_model');
		$this->load->model('snap_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('riwayat_model');
		//halaman di protek jika belum login tidak bisa diakses (Simple_pelanggan => check login)
		$this->simple_pelanggan->cek_login();

	}
	
	public function index()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		// $transaksi = $this->snap_model->listing($id_pelanggan);
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data =array(	'title' =>'Transaksi Berhasil',
						// 'transaksi' => $transaksi,
						'header_transaksi' =>$header_transaksi,
						'isi' 	=>'dashboard/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function belanja()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		// $transaksi = $this->snap_model->listing($id_pelanggan);
		$header_transaksi = $this->header_transaksi_model->pelanggan_blm_bayar($id_pelanggan);

		$data =array(	'title' =>'Transaksi',
						// 'transaksi' => $transaksi,
						'header_transaksi' =>$header_transaksi,
						'isi' 	=>'dashboard/belanja'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//dashboard detail
	public function detail($order_id)
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->order_id($order_id);
		$transaksi = $this->transaksi_model->order_id($order_id);
		
		//pelanggan hanya bisa mengakses data transaksi
		if ($header_transaksi->id_pelanggan !=$id_pelanggan) {
			$this->simple_pelanggan->logout_transaksi();
			redirect(base_url('masuk')); 
		}

		$data =array(	'title' =>'Detail Transaksi',
						'header_transaksi' =>$header_transaksi,
						'transaksi' => $transaksi,
						'isi' 	=>'dashboard/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//profil pelanggan
	public function profil()
	{
		$id_pelanggan 	= $this->session->userdata('id_pelanggan');
		$pelanggan 		= $this->pelanggan_model->detail($id_pelanggan);

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama_pelanggan','Nama Pengguna','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('telepon','Nomor Telepon','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
						array('required'		=> '%s harus diisi'));
		
		if ($valid->run()==FALSE) {
					// end validasi 
			$data =array(	'title' =>'Profil',
							'pelanggan' =>$pelanggan,
							'isi' 	=>'dashboard/profil'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			
				$i = $this->input;

				//password lebih dari
				if(strlen($i->post('password'))>= 6){
					$data = array(	'id_pelanggan'				=> $id_pelanggan,
									'nama_pelanggan'			=> $i->post('nama_pelanggan'),
									'password'					=> SHA1($i->post('password')),
									'telepon'					=> $i->post('telepon'),
									'alamat'					=> $i->post('alamat')
								);
				}else{
					$data = array(	'id_pelanggan'				=> $id_pelanggan,
									'nama_pelanggan'			=> $i->post('nama_pelanggan'),
									'telepon'					=> $i->post('telepon'),
									'alamat'					=> $i->post('alamat')
								);			
				}

				//end data profil di update
				$this->pelanggan_model->edit($data);
				$this->session->unset_userdata('nama_pelanggan');
   				$this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));
				$this->session->set_flashdata('berhasil','Update berhasil');
				redirect(base_url('dashboard/profil'),'refresh');
		}
		//akhir database
	}



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */