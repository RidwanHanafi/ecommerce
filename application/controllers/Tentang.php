<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
	}
	public function index()
	{
		$about = $this->konfigurasi_model->listing();
		$data =array(	'title' 	=> 'Tentang',
						'website'	=> $about->website,
						'keyword' 	=> $about->keyword,
						'alamat' 	=> $about->alamat,
						'deskripsi' => $about->deskripsi,
						'logo'		=> $about->logo,
						'isi'  		=>'tentang/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Tentang.php */
/* Location: ./application/controllers/Tentang.php */