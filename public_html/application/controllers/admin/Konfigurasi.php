<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		
	}

	//umum
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('namaweb','Nama Web','required',
						array('required'		=> '%s harus diisi'));

				if ($valid->run()==FALSE) {
					// email valid

					$data = array('title'	=> 'Konfigurasi Website',
								'konfigurasi' => $konfigurasi,
								'isi'		=> 'admin/konfigurasi/list');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$i = $this->input;
						
						$data = array(	'id_konfigurasi'	=>$konfigurasi->id_konfigurasi,
										'namaweb'			=>$i->post('namaweb'),
										'tagline'			=>$i->post('tagline'),
										'email'				=>$i->post('email'),
										'website'			=>$i->post('website'),
										'keyword'			=>$i->post('keyword'),
										'metatext'			=>$i->post('metatext'),
										'telepon'			=>$i->post('telepon'),
										'alamat'			=>$i->post('alamat'),
										'facebook'			=>$i->post('facebook'),
										'instagram'			=>$i->post('instagram'),
										'deskripsi'			=>$i->post('deskripsi'),
										'rekening_pembayaran'=>$i->post('rekening_pembayaran')
									);
						$this->konfigurasi_model->edit($data);
						$this->session->set_flashdata('sukses','Data berhasil diubah');
						redirect(base_url('admin/konfigurasi'),'refresh');
				}
				//akhir database
	}

	//logo
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('namaweb','Nama Website','required',
						array('required'		=> '%s harus diisi'));

		
				if ($valid->run()) {
					//mengecek gambar jika diganti
					if(!empty($_FILES['logo']['name'])){

					$config['upload_path'] = './assets/upload/image/logo/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg'; //format gambar
					$config['max_size']  = '10000'; //KB(10MB)
					$config['max_width']  = '1920'; //px
					$config['max_height']  = '1080';//px
					
					$this->load->library('upload', $config);
					

					if ( ! $this->upload->do_upload('logo')){
					
				//akhir validasi
					$data = array('title'	=> 'Konfigurasi Logo',
									'konfigurasi'	=> $konfigurasi,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/konfigurasi/logo');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$upload_gambar = array('upload_data' => $this->upload->data());

						//Membuat thumbnail gambar
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/upload/image/logo/'.$upload_gambar['upload_data']['file_name'];

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
						
						$data = array(	'id_konfigurasi'=>$konfigurasi->id_konfigurasi,
										'namaweb'		=>$i->POST('namaweb'),
										//Nama file gambar yang disimpan
										'logo'		=>$upload_gambar['upload_data']['file_name'],
										);
						$this->konfigurasi_model->edit($data);
						$this->session->set_flashdata('ubah','Data berhasil diubah');
						redirect(base_url('admin/konfigurasi/logo'),'refresh');
				}}else{
					//jika diedit tanpa ganti gambar
					$i = $this->input;
						
						$data = array(	'id_konfigurasi'=>$konfigurasi->id_konfigurasi,
										'namaweb'		=>$i->POST('namaweb'),
										//Nama file gambar yang disimpan
										//'logo'		=>$upload_gambar['upload_data']['file_name'],
										);
						$this->konfigurasi_model->edit($data);
						$this->session->set_flashdata('ubah','Data berhasil diubah');
						redirect(base_url('admin/konfigurasi/logo'),'refresh');
				}}
				//akhir database
				$data = array('title'	=> 'Konfigurasi Logo',
									'konfigurasi'	=> $konfigurasi,
									'isi'		=> 'admin/konfigurasi/logo');

					$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
	//icon 
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('namaweb','Nama Website','required',
						array('required'		=> '%s harus diisi'));

		
		if ($valid->run()) {
			//mengecek gambar jika diganti
			if(!empty($_FILES['icon']['name'])){

			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg'; //format gambar
			$config['max_size']  = '10000'; //KB(10MB)
			$config['max_width']  = '1920'; //px
			$config['max_height']  = '1080';//px
			
			$this->load->library('upload', $config);
			

			if ( ! $this->upload->do_upload('icon')){
			
			//akhir validasi
			$data = array('title'	=> 'Konfigurasi Icon',
							'konfigurasi'	=> $konfigurasi,
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/konfigurasi/icon');

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
				
				$data = array(	'id_konfigurasi'=>$konfigurasi->id_konfigurasi,
								'namaweb'		=>$i->POST('namaweb'),
								//Nama file gambar yang disimpan
								'icon'		=>$upload_gambar['upload_data']['file_name'],
								);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('ubah','Data berhasil diubah');
				redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}else{
			//jika diedit tanpa ganti gambar
			$i = $this->input;
				
				$data = array(	'id_konfigurasi'=>$konfigurasi->id_konfigurasi,
								'namaweb'		=>$i->POST('namaweb'),
								//Nama file gambar yang disimpan
								//'icon'		=>$upload_gambar['upload_data']['file_name'],
								);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('ubah','Data berhasil diubah');
				redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}
		//akhir database
		$data = array('title'	=> 'Konfigurasi Icon',
							'konfigurasi'	=> $konfigurasi,
							'isi'		=> 'admin/konfigurasi/icon');

			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */