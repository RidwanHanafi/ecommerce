<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
	}

//Halaman utama toko
  public function index()
  {
  	$site = $this->konfigurasi_model->listing();
  	$kategori = $this->konfigurasi_model->nav_produk();
  	$produk = $this->produk_model->home();
    $home_kategori = $this->konfigurasi_model->home_kategori();
    $produk_populer = $this->produk_model->produk_populer();
    
    $data = array(	'title' =>$site->namaweb,
    				'keyword' => $site->keyword,
    				'deskripsi' => $site->deskripsi,
    				'site'	=> $site,
    				'kategori' => $kategori,
					'tes' =>$home_kategori,
							'produk' => $produk,
					'produk_populer' => $produk_populer,
					'isi'   =>'home/list');
    $this->load->view('layout/wrapper', $data, FALSE);
  }
 

}
