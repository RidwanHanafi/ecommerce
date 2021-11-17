<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	
	}
	public function index()
	{
		//validasi input
		$valid = $this->form_validation;
		$valid->set_rules('nama_pelanggan','Nama Pengguna','required',
						array('required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email','required|valid_email|is_unique[pelanggan.email]',
						array('required' 		=> '%s harus diisi',
									'valid_email' => '%s tidak valid',
									'is_unique' => '%s sudah terdaftar'));

		$valid->set_rules('password', 'Password','required',
					array('required' =>'%s harus diisi',
						'min_length'=>'%s minimal 6 karakter'
						));

				if ($valid->run()==FALSE) {
					// end validasi
					$data = array('title' => 'Registrasi',
									'isi' => 'registrasi/list');
					$this->load->view('layout/wrapper', $data, FALSE);
					//Masuk database
				}else{
						$token_beta = base64_encode(random_bytes(32));
						$token = strtr($token_beta, '+/=', '-_,');
						$i = $this->input;
						$data = array(	'status_pelanggan'			=>'Pending',
										'nama_pelanggan'			=>htmlspecialchars($i->post('nama_pelanggan',true)),
										'email'						=>htmlspecialchars($i->post('email',true)),
										'password'					=>SHA1($i->post('password')),
										'telepon'					=>$i->post('telepon'),
										'alamat'					=>$i->post('alamat'),
										'tanggal_daftar'			=>time()
										);
						$this->pelanggan_model->tambah($data);

						$user_token = array(	'email'	 => htmlspecialchars($i->post('email',true)),
												'token'	 => $token,
												'waktu'	 => time()	
												);
						$this->pelanggan_model->insert_token_user($user_token);
						$this->_sendEmail($token, 'verifikasi');
						//create session login pelanggan
						$this->session->set_userdata('email', $i->post('email'));
						$this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));
						//end create session
						$this->session->set_flashdata('sukses','Registrasi berhasil');
						redirect(base_url('registrasi/sukses'),'refresh');
				}
				//akhir database
	}

	private function _sendEmail($token, $type){
		
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'rambocool888@gmail.com';
        $config['smtp_pass'] = 'zwalyyurbwcbhceg';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";

		$this->load->library('email', $config);
        $this->email->initialize($config);

		$this->email->from('rambocool888@gmail.com','Esthree Cake and Bakery');
		$input = $this->input->post('email'); 

		$data = array(	'token' => $token,
						'input' => $input
					);

		$this->email->to($input);
		if($type =='verifikasi'){
			$this->email->subject('Aktifasi Akun');
			// $this->email->message('Anda meminta untuk mengganti password. Jika anda ternyata tidak meminta ini, harap abaikan. Pesan ini akan otomatis kadaluwarsa dalam waktu 24 jam kedepan. Klik link dibawah ini untuk melakukan perubahan pada password anda:<br><a href="' . base_url() . 'masuk/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
			$pesan = $this->load->view('registrasi/aktifasi-template', $data, TRUE);
			$this->email->message($pesan);
			
		}
		
		if($this->email->send()){
			$this->session->set_flashdata('berhasil','Tolong cek email anda untuk aktifasi akun');
			redirect(base_url('masuk'),'refresh');
		}
		else{
			echo $this->email->print_debugger();
			die;
		}

		
	}
	public function verifikasi(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		//validasi ke database apakah ada emailnya
		$pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

		if($pelanggan){
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();

			if($user_token){
				if(time() - $user_token['waktu'] < (60*60*24)){
					$this->db->set('status_pelanggan','Aktif');
					$this->db->where('email', $email);
					$this->db->update('pelanggan');

					$this->db->delete('token', ['email'=> $email]);
					$this->session->set_flashdata('berhasil', ''.$email.' Aktifasi berhasil');
					redirect(base_url('masuk'),'refresh');
				}else{
					$this->db->delete('pelanggan',['email' => $email]);
					$this->db->delete('token',['email' => $email]);
					$this->session->set_flashdata('fail','Link sudah tidak bisa digunakan lagi');

				}
			}else{
				$this->session->set_flashdata('fail','Aktifasid gagal, token salah atau anda sudah melakukan aktifasi');
				redirect(base_url('masuk'),'refresh');
			}
		}
		else{
			$this->session->set_flashdata('fail','Aktifasi gagal, email salah ');
			
			redirect(base_url('masuk'),'refresh');

		}
	}

	//login berhasil atau sukses
	public function sukses()
	{
		$data = array(	'title' => 'Registrasi Berhasil',
						'isi' => 'registrasi/sukses'
						);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */