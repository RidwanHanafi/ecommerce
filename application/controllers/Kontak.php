<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');

	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
	  	$kategori = $this->konfigurasi_model->nav_produk();
	  	$produk = $this->produk_model->home();

	    $data = array(	'title' =>$site->namaweb,
	    				'keyword' => $site->keyword,
	    				'deskripsi' => $site->deskripsi,
	    				'site'	=> $site,
	    				'kategori' => $kategori,
	    				'produk' => $produk,
	            		'isi'   =>'kontak/list');
	    $this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */