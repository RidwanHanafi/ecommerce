<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('transaksi_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
		//Proteksi Halaman
		$this->simple_login->cek_login();
	}

	//Data Transaksi Pelanggan
	public function index()
	{
		$header_transaksi = $this->header_transaksi_model->listing_masuk();
		$data = array(	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list'
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function terima(){
		$header_transaksi = $this->header_transaksi_model->listing_terima();
		
		$data = array(	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list'
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tolak(){
		$header_transaksi = $this->header_transaksi_model->listing_tolak();

		$data = array(	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list'
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//dashboar detail
	public function detail($order_id)
	{
		$valid = $this->form_validation;
		$header_transaksi = $this->header_transaksi_model->order_id($order_id);
		$transaksi = $this->transaksi_model->order_id($order_id);
		$atas_nama = $this->header_transaksi_model->order_id($order_id);
		$site				= $this->konfigurasi_model->listing();

			//validasi input
		$valid->set_rules('pilihan','Anda belum','required', 
						array('required'=> '%s konfirmasi pesanan'));
		if ($valid->run()==FALSE) {
					
			$data =array(	'title' =>'Detail Transaksi',
							'header_transaksi' =>$header_transaksi,
							'transaksi' => $transaksi,
							'atas_nama' => $atas_nama,
							'site'		=>$site,
							'isi' 	=>'admin/transaksi/detail'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{

			$i = $this->input;
			$order_id;
			$konfirmasi 	= $i->post('pilihan');

			$this->transaksi_model->edit($order_id, $konfirmasi);
			$this->session->set_flashdata('ubah','Data berhasil ubah');
			redirect(base_url('admin/transaksi'),'refresh');
		}
		
	}
	public function cetak($order_id)
	{
		$header_transaksi 	= $this->header_transaksi_model->order_id($order_id);
		$transaksi 			= $this->transaksi_model->order_id($order_id);
		$atas_nama	 		= $this->header_transaksi_model->order_id($order_id);
		$site				= $this->konfigurasi_model->listing();

			$data =array(	'title' =>'Detail Transaksi',
							'header_transaksi' =>$header_transaksi,
							'transaksi' => $transaksi,
							'atas_nama' => $atas_nama,
							'site'		=> $site,
							'isi' 	=>'admin/transaksi/detail'
						);
			$this->load->view('admin/transaksi/cetak', $data, FALSE);
			//redirect(base_url('admin/transaksi/terima'),'refresh');
		
	}

	//cetak PDF
	public function pdf($order_id)
	{
		
		$header_transaksi 	= $this->header_transaksi_model->order_id($order_id);
		$transaksi 			= $this->transaksi_model->order_id($order_id);
		$atas_nama	 		= $this->header_transaksi_model->order_id($order_id);
		$site				= $this->konfigurasi_model->listing();	

			$data =array(	'title' =>'Detail Transaksi',
							'header_transaksi' =>$header_transaksi,
							'transaksi' => $transaksi,
							'atas_nama' => $atas_nama,
							'site'		=> $site
						);
			//$this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/cetak', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf();

		// Write some HTML code:
		$mpdf->WriteHTML('Hello World');

		// Output a PDF file directly to the browser
		$mpdf->Output();
	}

	//cetak PDF
	public function kirim($order_id)
	{
		
		$header_transaksi 	= $this->header_transaksi_model->order_id($order_id);
		$transaksi 			= $this->transaksi_model->order_id($order_id);
		$atas_nama	 		= $this->header_transaksi_model->order_id($order_id);
		$site				= $this->konfigurasi_model->listing();	

			$data =array(	'title' =>'Detail Transaksi',
							'header_transaksi' =>$header_transaksi,
							'transaksi' => $transaksi,
							'atas_nama' => $atas_nama,
							'site'		=> $site
						);
			//$this->load->view('admin/transaksi/kirim', $data, FALSE);
		$html = $this->load->view('admin/transaksi/kirim', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf();

		//setting header dan footer
		$mpdf->SetHTMLHeader('
		<div style="text-align: right; font-weight: bold;">
		   <img src="'.base_url('assests/upload/image/'.$site->logo).'" style="height:50px; width:"auto">
		</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; background-color:#5e483b; color:white; font-size: 12px;">
			Alamat:'.$site->namaweb.'('.$site->alamat.')<br>
			Telepon:'.$site->telepon.'
			</div>
		');
		//end header dan footer

		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output a PDF file directly to the browser
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$order_id.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}
}

/* End of file rekening.php */
/* Location: ./application/controllers/admin/rekening.php */
