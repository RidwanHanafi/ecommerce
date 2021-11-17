<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  //load model
  public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
    $this->load->model('dashboard_model');
    $this->load->model('header_transaksi_model');

		//Proteksi Halaman
		$this->simple_login->cek_login();
	}
  
  public function index()
  {
    $transaksi_masuk = $this->dashboard_model->listing_masuk();
    $transaksi_terima = $this->dashboard_model->listing_terima();
    $jumlah_admin = $this->user_model->jumlah_admin();
    $pemasukan = $this->header_transaksi_model->listing_terima();
    $data = array('title' => 'Dashboard',
                  'transaksi_masuk'   => $transaksi_masuk,
                  'transaksi_terima' => $transaksi_terima,
                  'jumlah_admin'  => $jumlah_admin,
                  'pemasukan'     => $pemasukan,
                  'isi'   => 'admin/dashboard/list'
                );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

}
