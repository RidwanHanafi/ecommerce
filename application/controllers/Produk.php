<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//load db
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
	}
	public function index()
	{
		//this bawah ini menampilkan konfigurasi web
		$site = $this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		//mengambil data total
		$total = $this->produk_model->total_produk();
		//$kategoris = $this->kategori_model->listing();
		//panination
		$this->load->library('pagination');
			
		$config['base_url'] 		= base_url().'produk/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page']			= 8;
		$config['uri_segment'] 		= 3;
		$config['num_links'] 		= 3;

		$config['full_tag_open']   = '<div class="flex-c-m flex-w w-full p-t-38">';

		$config['full_tag_close']  = '</div>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '<i class="fa fa-chevron-right"></i>'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '<i class="fa fa-chevron-left"></i>'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li><a href="#" class="wow flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li class="berikutnya flex-c-m how-pagination1 trans-04 m-all-7">';
        $config['num_tag_close']   = '</li>';

		$config['firtst_url']		= base_url().'/produk/';
		$this->pagination->initialize($config);
		//ambil data produk
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)* $config['per_page']:0;
		$produk = $this->produk_model->produk($config['per_page'],$page);
		//akhir pagination

		$data = array(	'title' => 'Produk',
						'site' => $site,
						'listing_kategori' => $listing_kategori,
						'produk' => $produk,
						'pagin'	=>	$this->pagination->create_links(),
						'isi'	=> 'produk/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//listing data kategori produk
	public function kategori($slug_kategori)
	{
		//kategori detail
		$kategori = $this->kategori_model->read($slug_kategori);
		$id_kategori = $kategori->id_kategori;
		//data global
		//this bawah ini menampilkan konfigurasi web
		$site = $this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		//mengambil data total
		$total = $this->produk_model->total_kategori($id_kategori);
		//panination
		$this->load->library('pagination');
			
		$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page']			= 8;
		$config['uri_segment'] 		= 5;
		$config['num_links'] 		= 5;
		
		$config['full_tag_open']   = '<div class="flex-c-m flex-w w-full p-t-38">';

		$config['full_tag_close']  = '</div>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '<i class="fa fa-chevron-right"></i>'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '<i class="fa fa-chevron-left"></i>'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li><a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li class="flex-c-m how-pagination1 trans-04 m-all-7">';
        $config['num_tag_close']   = '</li>';

		$config['firtst_url']		= base_url().'/produk/kategori/'.$slug_kategori;
		$this->pagination->initialize($config);
		//ambil data produk
		$page = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1)* $config['per_page']:0;
		$produk = $this->produk_model->kategori($id_kategori,$config['per_page'],$page);
		//akhir pagination

		$data = array(	'title' => $kategori->nama_kategori,
						'site' => $site,
						'listing_kategori' => $listing_kategori,
						'produk' => $produk,
						'pagin'	=>	$this->pagination->create_links(),
						'isi'	=> 'produk/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	//detail produk  
	public function detail($slug_produk)
	{
		$site 		= $this->konfigurasi_model->listing();
		$produk 	= $this->produk_model->read($slug_produk);
		$id_produk 	= $produk->id_produk;
		//mengambil dari produk_model function gambar
		$gambar 	= $this->produk_model->gambar($id_produk);
		$produk_rilis =$this->produk_model->listing();

		$data = array(	'title' => $produk->nama_produk,
						'site' => $site,
						'produk' => $produk,
						'produk_rilis' =>$produk_rilis,
						'gambar'	=>$gambar,
						'isi'	=> 'produk/detail');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//quick detail produk  
	public function detail_quick($slug_produk)
	{
		$site 		= $this->konfigurasi_model->listing();
		$produk_model	= $this->produk_model->read($slug_produk);
		$id_produk	= $produk->id_produk;
		//mengambil dari produk_model function gambar
		$gambar 	= $this->produk_model->gambar($id_produk);
		$produk_rilis =$this->produk_model->listing();

		$data = array(	'title' => $produk->nama_produk,
						'sites' => $site,
						'produk' => $produk,
						'produk_rilis' =>$produk_rilis,
						'gambar'	=>$gambar,
						'isi'	=> 'layout/header');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */