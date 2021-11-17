<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//Proteksi Halaman
		$this->simple_login->cek_login();
	}

	//Data pengguna
	public function index()
	{
		$user = $this->user_model->listing();
			$data = array(	'title' => 'Data Pengguna',
						'user'	=>	$user,
						'isi'	=> 'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}
	//Tambah Data pengguna
	public function tambah()
	{
		$akses_level = $this->session->userdata('akses_level');

		if ($akses_level == 'User') {
			$this->session->set_flashdata('gagal','Anda bukan Super Admin');
			redirect(base_url('admin/user'),'refresh');
		}else{
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Pengguna','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email','required|valid_email',
						array('required' 		=> '%s harus diisi',
									'valid_email' => '%s tidak valid'));

		$valid->set_rules('username', 'Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
						array('required'  =>'%s harus diisi',
									'min_length'=>'%s minimal 6 karakter',
									'max_length'=>'%s maxsimal 32 karakter',
									'is_unique' =>'%s sudah dipakai, buat username baru.'));

		$valid->set_rules('password', 'Password','required',
					array('required' =>'%s harus diisi',
						'min_length'=>'%s minimal 6 karakter'
						));

				if ($valid->run()==FALSE) {
					// email valid

					$data = array(	'title'	=> 'Tambah Pengguna',
									'isi'		=> 'admin/user/tambah');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$i = $this->input;
						$data = array(	'nama'				=>$i->post('nama'),
										'email'				=>$i->post('email'),
										'username'			=>$i->post('username'),
										'password'			=>SHA1($i->post('password')),
										'akses_level'		=>$i->post('akses_level')
										);
						$this->user_model->tambah($data);
						$this->session->set_flashdata('sukses','Data berhasil ditambah');
						redirect(base_url('admin/user'),'refresh');
				}
				//akhir database
			}
	}

	//Edit Data pengguna
	public function edit($id_user)
	{

		$user = $this->user_model->detail($id_user);
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama lengkap','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email','required|valid_email',
						array('required' 		=> '%s harus diisi',
									'valid_email' => '$s tidak valid'));

				if ($valid->run()==FALSE) {
					// email valid

					$data = array('title'	=> 'Edit Pengguna',
									'user'	=> $user,
									'isi'	=> 'admin/user/edit');

					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
					$i = $this->input;
					if (strlen($i->post('password'))>= 6) {
						$data = array(	'id_user'				=> $id_user,
										'nama'			=>$i->post('nama'),
										'email'			=>$i->post('email'),
										'username'		=>$i->post('username'),
										'password'		=>SHA1($i->post('password')),
										'akses_level'	=>$i->post('akses_level')
									);
					}else{
						
						$data = array(	'id_user'		=>$id_user,
										'nama'			=>$i->post('nama'),
										'email'			=>$i->post('email'),
										'username'		=>$i->post('username'),
										'akses_level'	=>$i->post('akses_level')
												);
						$this->user_model->edit($data);
						$this->session->unset_userdata('nama');
   						$this->session->set_userdata('nama', $i->post('nama'));
						$this->session->set_flashdata('ubah','Data berhasil ubah');
						redirect(base_url('admin/user'),'refresh');
				}
				//akhir database
			}
	}

	//Delete user
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('hapus','Data berhasil dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
}


/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */
