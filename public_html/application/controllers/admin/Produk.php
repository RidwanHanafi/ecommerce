<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		//Proteksi Halaman
		$this->simple_login->cek_login();
	}

	//Data produk
	public function index()
	{
		$produk = $this->produk_model->listing_admin();
		$data = array(	'title' => 'Data Produk',
						'produk'	=>	$produk,	
						'isi'		=> 'admin/produk/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah Data produk
	public function tambah()
	{
		//mengambil data dari kategori
		$kategori = $this->kategori_model->listing();
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama_produk','Nama Produk','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode Produk','required|is_unique[produk.kode_produk]',
						array(	'required'		=> '%s harus diisi',
								'is_unique'		=> '%s sudah tersedia. Buat kode produk baru'));



				if ($valid->run()) {
					$config['upload_path'] = './assets/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg'; //format gambar
					$config['max_size']  = '10000'; //KB(10MB)
					$config['max_width']  = '1920'; //px
					$config['max_height']  = '1080';//px
					
					$this->load->library('upload', $config);
					

					if ( ! $this->upload->do_upload('gambar')){
				
					$data = array('title'	=> 'Tambah Produk',
									'kategori'	=> $kategori,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/produk/tambah');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$upload_gambar = array('upload_data' => $this->upload->data());

						//Membuat thumbnail gambar
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];

						//lokasi gambar thumbnail
						$config['new_image'] = './assets/upload/image/thumbs/';

						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width']         = 250;
						$config['height']       = 250;
						$config['thumb_marker'] ='';
						$this->load->library('image_lib', $config);

						$this->image_lib->resize();

						//end thumbnail

						$i = $this->input;
						//slug produk
						$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
						$data = array(	'id_user'		=> $this->session->userdata('id_user'),
										'id_kategori'	=> $i->post('id_kategori'),
										'kode_produk'	=> $i->post('kode_produk'),
										'nama_produk'	=> $i->post('nama_produk'),
										'slug_produk'	=> $slug_produk,
										'keterangan'	=> $i->post('keterangan'),
										'keyword'		=> $i->post('keyword'),
										'harga'			=> $i->post('harga'),
										'stok'			=> $i->post('stok'),
										//Nama file gambar yang disimpan
										'gambar'		=> $upload_gambar['upload_data']['file_name'],
										'berat'			=> $i->post('berat'),
										'ukuran'		=> $i->post('ukuran'),
										'status_produk'	=> $i->post('status_produk'),
										'tanggal_post'	=> date('Y-m-d H:i:s')
										);
						$this->produk_model->tambah($data);
						$this->session->set_flashdata('sukses','Data berhasil ditambah');
						redirect(base_url('admin/produk'),'refresh');
				}}
				//akhir database
				$data = array(	'title'		=> 'Tambah Produk',
								'kategori'	=> $kategori,
								'isi'		=> 'admin/produk/tambah');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit Data produk
	public function edit($id_produk)
	{
		//mengambil data dari yg sudah diinput/ yang akan diedit
		$produk = $this->produk_model->detail($id_produk);
		//data kategori
		$kategori = $this->kategori_model->listing();

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama_produk','Nama Produk','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode Produk','required',
						array(	'required'		=> '%s harus diisi'));


				if ($valid->run()) {
					//mengecek gambar jika diganti
					if(!empty($_FILES['gambar']['name'])){

					$config['upload_path'] = './assets/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg'; //format gambar
					$config['max_size']  = '10000'; //KB(10MB)
					$config['max_width']  = '1920'; //px
					$config['max_height']  = '1080';//px
					
					$this->load->library('upload', $config);
					

					if ( ! $this->upload->do_upload('gambar')){
					
				//akhir validasi
					$data = array('title'	=> 'Edit Produk: ' .$produk->nama_produk,
									'kategori'	=> $kategori,
									'produk' 	=> $produk,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/produk/edit');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$upload_gambar = array('upload_data' => $this->upload->data());

						//Membuat thumbnail gambar
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];

						//lokasi gambar thumbnail
						$config['new_image'] = './assets/upload/image/thumbs/';

						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width']         = 300;
						$config['height']       = 300;
						$config['thumb_marker'] ='';
						$this->load->library('image_lib', $config);

						$this->image_lib->resize();

						//end thumbnail

						$i = $this->input;
						//slug produk
						$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
						$data = array(	'id_produk'		=>$id_produk,
										'id_user'		=>$this->session->userdata('id_user'),
										'id_kategori'	=>$i->post('id_kategori'),
										'kode_produk'	=>$i->post('kode_produk'),
										'nama_produk'	=>$i->post('nama_produk'),
										'slug_produk'	=>$slug_produk,
										'keterangan'	=>$i->post('keterangan'),
										'keyword'		=>$i->post('keyword'),
										'harga'			=>$i->post('harga'),
										'stok'			=>$i->post('stok'),
										//Nama file gambar yang disimpan
										'gambar'		=>$upload_gambar['upload_data']['file_name'],
										'berat'			=>$i->post('berat'),
										'ukuran'		=>$i->post('ukuran'),
										'status_produk'	=>$i->post('status_produk')
										
										);
						$this->produk_model->edit($data);
						$this->session->set_flashdata('ubah','Data berhasil diubah');
						redirect(base_url('admin/produk'),'refresh');
				}}else{
					//jika diedit tanpa ganti gambar
					$i = $this->input;
						//slug produk
						$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
						$data = array(	'id_produk'		=>$id_produk,
										'id_user'		=>$this->session->userdata('id_user'),
										'id_kategori'	=>$i->post('id_kategori'),
										'kode_produk'	=>$i->post('kode_produk'),
										'nama_produk'	=>$i->post('nama_produk'),
										'slug_produk'	=>$slug_produk,
										'keterangan'	=>$i->post('keterangan'),
										'keyword'		=>$i->post('keyword'),
										'harga'			=>$i->post('harga'),
										'stok'			=>$i->post('stok'),
										//Nama file gambar yang disimpan
										//'gambar'		=>$upload_gambar['upload_data']['file_name'],
										'berat'			=>$i->post('berat'),
										'ukuran'		=>$i->post('ukuran'),
										'status_produk'	=>$i->post('status_produk')
										
										);
						$this->produk_model->edit($data);
						$this->session->set_flashdata('ubah','Data berhasil diubah');
						redirect(base_url('admin/produk'),'refresh');
				}}
				//akhir database
				$data = array(	'title'		=> 'Edit Produk ' .$produk->nama_produk,
								'kategori'	=> $kategori,
								'produk'	=> $produk,
								'isi'		=> 'admin/produk/edit');

					$this->load->view('admin/layout/wrapper', $data, FALSE);

	}


	//Delete produk
	public function delete($id_produk)
	{
		//proses hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar);
		//end


		$data = array('id_produk' => $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('hapus','Data berhasil dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}
		//utk gambar
	public function gambar($id_produk){
		$produk = $this->produk_model->detail($id_produk);
		$gambar = $this->produk_model->gambar($id_produk);

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('judul_gambar','Nama Gambar','required',
						array('required'		=> '%s harus diisi'));


				if ($valid->run()) {
					$config['upload_path'] = './assets/upload/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg'; //format gambar
					$config['max_size']  = '10000'; //KB(10MB)
					$config['max_width']  = '1920'; //px
					$config['max_height']  = '1080';//px
					
					$this->load->library('upload', $config);
					

					if ( ! $this->upload->do_upload('gambar')){
				
					$data = array('title'	=> 'Tambah Gambar Produk'.$produk->nama_produk,
									'produk'	=> $produk,
									'gambar'	=> $gambar,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/produk/gambar');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$upload_gambar = array('upload_data' => $this->upload->data());

						//Membuat thumbnail gambar
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];

						//lokasi gambar thumbnail
						$config['new_image'] = './assets/upload/image/thumbs/';

						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width']         = 250;
						$config['height']       = 250;
						$config['thumb_marker'] ='';
						$this->load->library('image_lib', $config);

						$this->image_lib->resize();


						//end thumbnail

						$i = $this->input;
	
						$data = array(	'id_produk'		=>$id_produk,
										'judul_gambar'	=>$i->post('judul_gambar'),
										//Nama file gambar yang disimpan
										'gambar'		=>$upload_gambar['upload_data']['file_name']
										);
						$this->produk_model->tambah_gambar($data);
						$this->session->set_flashdata('sukses','Data gambar berhasil ditambah, lihat tabel dibawah');
						redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
				}}
				//akhir database
				$data = array(	'title'		=> 'Tambah Gambar Produk ',
								'produk'	=> $produk,
								'gambar'	=> $gambar,
								'isi'		=> 'admin/produk/gambar');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete gambar
	public function hapus_gambar($id_produk, $id_gambar)
	{

		//proses hapus gambar
		$gambar = $this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
		//end


		$data = array('id_gambar' => $id_gambar);
		$this->produk_model->hapus_gambar($data);
		$this->session->set_flashdata('hapus_gambar','Data berhasil dihapus');
		redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
	}

}


/* End of file produk.php */
/* Location: ./application/controllers/admin/produk.php */
