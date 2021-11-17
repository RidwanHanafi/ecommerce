<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('alamat_model');
		
		//load helper random string
		$this->load->helper('string');
	}

	//hal belanja
	public function index()
	{
		$keranjang = $this->cart->contents();
		//cek pelanggan login atau blm, jika belum harus registrasi dan langsung login (mengecek dengan session email)

		//kondisi sudah login
		if($this->session->userdata('email')){
			if($this->cart->total() > 0){
			
			$email 				= $this->session->userdata('email');
			$nama_pelanggan		= $this->session->userdata('nama_pelanggan');
			$pelanggan 			= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);
			$keranjang 			= $this->cart->contents();
			$kecamatan			= $this->alamat_model->kecamatan();
			
			// end validasi
			$data = array(	'title' 		=> 'Keranjang',
							'keranjang' 	=> $keranjang,
							'pelanggan'		=> $pelanggan,
							'nama_pelanggan'=> $nama_pelanggan,
							'email'			=> $email,
							'kecamatan'		=> $kecamatan,
							'isi'			=> 'belanja/list'
						);
			
			$this->load->view('layout/wrapper', $data, FALSE);	
			}else{
			//jika cart kosong ->produk
			redirect(base_url('produk'),'refresh');
			}

		}else{
			//jika belum registrasi, masuk keregistrasi
			$this->session->set_flashdata('registrasi', '<div class="stext-110 alert alert-info alert-dismissible" style="margin: 0px 550px 0px 150px;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');
			redirect(base_url('registrasi'),'refresh');
		}
					
	}
	public function desa(){
		
		$kecamatan_id 		= $this->input->post('kecamatan_id');
		$desa				= $this->alamat_model->desa($kecamatan_id);

		echo json_encode($desa);
	}

	//sukses belanja
	public function sukses()
	{
		$data =array(	'title' => 'Belanja Berhasil',
						'isi'	=> 'belanja/sukses'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}					


	// // //Checkout
	// public function checkout()
	// {
	// 	//cek pelanggan login atau blm, jika belum harus registrasi dan langsung login (mengecek dengan session email)

	// 	//kondisi sudah login
	// 	if($this->session->userdata('email')){
	// 		$email 			= $this->session->userdata('email');
	// 		$nama_pelanggan = $this->session->userdata('nama_pelanggan');
	// 		$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);
	// 		$jumlah_transaksi	= $this->cart->total();
	// 		$keranjang 		= $this->cart->contents();

	// 		$valid = $this->form_validation;
	// 		$valid->set_rules('nama_pelanggan','Nama Pengguna','required',
	// 						array('required'	=> '%s harus diisi'));

	// 		$valid->set_rules('telepon','Nomor Telepon','required',
	// 						array('required'	=> '%s harus diisi'));

	// 		$valid->set_rules('alamat','Alamat','required',
	// 						array('required'		=> '%s harus diisi'));

	// 		$valid->set_rules('email', 'Email','required|valid_email',
	// 						array('required' 	=> '%s harus diisi',
	// 									'valid_email' => '%s tidak valid'));			


	// 		if ($valid->run()==FALSE) {
	// 		// end validasi
			
	// 		$data = array(	'title' 	=> 'Checkout',
	// 						'keranjang' => $keranjang,
	// 						'pelanggan'	=> $pelanggan,
	// 						'nama_pelanggan' => $nama_pelanggan,
	// 						'email'		=> $email,
	// 						'isi'		=> 'belanja/checkout'
	// 					);

	// 		$this->load->view('layout/wrapper', $data, FALSE);
	// 		//masuk database
	// 		}//masuk database
	// 		else{
	// 					$i = $this->input;
	// 					$data = array(	'id_pelanggan'				=>$pelanggan->id_pelanggan,
	// 									'nama_pelanggan'			=>$i->post('nama_pelanggan'),
	// 									'email'						=>$i->post('email'),
	// 									'telepon'					=>$i->post('telepon'),
	// 									'alamat'					=>$i->post('alamat'),
	// 									'kode_transaksi'			=>$i->post('kode_transaksi'),
	// 									'tanggal_transaksi'			=>$i->post('tanggal_transaksi'),
	// 									'jumlah_transaksi'			=>$i->post('jumlah_transaksi'),
	// 									'status_bayar'				=>'Belum',
	// 									'tanggal_post'				=>date('Y-m-d H:i:s')
	// 									);

	// 					//proses masuk ke tabel header_transaksi
	// 					//$this->header_transaksi_model->tambah($data);

	// 					//proses masuk ke tabel transaksi
	// 					foreach ($keranjang as $keranjang) {
	// 						$sub_total = $keranjang['price'] * $keranjang['qty']; 
	// 						$data =array(	'id_pelanggan' 		=>$pelanggan->id_pelanggan,
	// 										'kode_transaksi' 	=>$i->post('kode_transaksi'),
	// 										'id_produk' 		=>$keranjang['id'],
	// 										'harga'				=>$keranjang['price'],
	// 										'jumlah'			=>$keranjang['qty'],
	// 										'total_harga'		=>$sub_total,
	// 										'tanggal_transaksi' =>$i->post('tanggal_transaksi')
	// 									);
	// 						$this->transaksi_model->tambah($data);

	// 					}
	// 					//end proses masuk tabel transaksi
	// 					//setelah masuk ke tabel transaksi, maka keranjang dikosongkan

	// 					//$this->cart->destroy();
	// 					//$this->session->set_flashdata('sukses','Checkout berhasil');
	// 					redirect(base_url('snap'),'refresh');
	// 			}

	// 	}else{
	// 		//jika belum registrasi, masuk keregistrasi
	// 		$this->session->set_flashdata('registrasi', '<div class="stext-110 alert alert-info alert-dismissible" style="margin: 0px 550px 0px 150px;">
	// 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');
	// 		redirect(base_url('registrasi'),'refresh');
	// 	}
	// }


	//add to keranjang
	public function add()
	{
		//ambil dari data form
		$id =$this->input->post('id');
		$qty =$this->input->post('qty');
		$price =$this->input->post('price');
		$name =$this->input->post('name');
		$redirect_page =$this->input->post('redirect_page');

		//proses masuk ke keranjang belanja
		$data = array(
		        'id'      => $id,
		        'qty'     => $qty,
		        'price'   => $price,
		        'name'    => $name
			);
		$this->cart->insert($data);
		redirect($redirect_page,'refresh');
	}

	//update keranjang
	public function update_cart($rowid)
	{
		//jika ada data rowid
		if($rowid){
			$data = array(	'rowid' => $rowid,
							'qty' => $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('update', 'Data berhasil diubah');
			redirect(base_url('belanja'),'refresh');

		}else{
			//jika tidak ada rowid
			redirect(base_url('belanja'),'refresh');
		}
	}


	//hapus semua item dikeranjang
	public function hapus($rowid = '')
	{
		// hapus semua
		if($rowid)
		{
			$this->cart->remove($rowid);
			$this->session->set_flashdata('perhapus', 'Data telah dihapus');
			redirect(base_url('belanja'),'refresh');	

		}else
		{
			//hapus peritem
			$this->cart->destroy();
			$this->session->set_flashdata('hapus', 'Data telah dihapus');
			redirect(base_url('belanja'),'refresh');
		}
		
	}
	


}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */