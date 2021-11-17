<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		
	}

	//login pelanggan
	public function index()
	{

		//validasi
      	$this->form_validation->set_rules('email','Email','required',
        	array('required' => '%s harus di isi'));

      	$this->form_validation->set_rules('password','Password','required',
        	array('required' => '%s harus di isi'));

      	if($this->form_validation->run()){
        	$email = $this->input->post('email');
			$password = $this->input->post('password');

        //proses menuju ke simple Login
        $this->simple_pelanggan->login($email,$password);
      }
      //end validasi
      
		$data = array(	'title' => 'Login Pelanggan',
						'isi'	=> 'masuk/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	//logout pelanggan
	public function logout(){

		//mengambil dari fungsi logout di simple_pelanggan  yg sudah diset di autoload
		$this->simple_pelanggan->logout();

	}
	

	public function lupapassword(){
		
		$this->form_validation->set_rules('email','Email','required|valid_email|trim');
		if($this->form_validation->run() == FALSE){		
			$data = array(	'title' => 'Lupa password',
							'isi'	=> 'masuk/lupa'
							);
			$this->load->view('layout/wrapper', $data, FALSE);
			//$this->session->set_flashdata('salah','Email yang anda masukkan salah');
		}
		else{
			$email = $this->input->post('email');
			$pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();
	
			if($pelanggan){
				$token_beta = base64_encode(random_bytes(32));
				$token = strtr($token_beta, '+/=', '-_,');
				$data = array(	'email'	 => $email,
								'token'	 => $token,
								'waktu'=> time()	
								);
				$this->pelanggan_model->insert_token($data);
				$this->_sendEmail($token, 'lupa');
				// $this->session->set_flashdata('empty','Tolong cek email anda untuk melakukan reset password');
			}
			else{
				$this->session->set_flashdata('salah','Email tidak ditemukan');
				redirect('masuk/lupapassword','refresh');
				
			}
			 
		}
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
		if($type =='lupa'){
			$this->email->subject('Reset Password');
			// $this->email->message('Anda meminta untuk mengganti password. Jika anda ternyata tidak meminta ini, harap abaikan. Pesan ini akan otomatis kadaluwarsa dalam waktu 24 jam kedepan. Klik link dibawah ini untuk melakukan perubahan pada password anda:<br><a href="' . base_url() . 'masuk/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
			$pesan = $this->load->view('masuk/email-template', $data, TRUE);
			$this->email->message($pesan);
			
		}
		
		if($this->email->send()){
			$this->session->set_flashdata('berhasil','Tolong cek email anda untuk melakukan reset password');
			redirect(base_url('masuk'),'refresh');
		}
		else{
			echo $this->email->print_debugger();
			die;
		}

		
	}
	public function resetpassword(){

		$email = $this->input->get('email');
		$token = $this->input->get('token');
		
		//validasi ke database apakah ada emailnya
		$pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

		if($pelanggan){
			$token = $this->db->get_where('token', ['token' => $token])->row_array();

			if($token){
				if(time() - $token['waktu'] < (60*60*24)){
					$this->session->set_userdata('reset_email', $email);
					$this->ubahpassword();
				}else{
					$this->db->delete('token',['email' => $email]);
					$this->session->set_flashdata('fail','Link sudah tidak bisa digunakan lagi');

				}
			}else{
				$this->session->set_flashdata('fail','Reset password gagal, token salah');
				redirect(base_url('masuk'),'refresh');
			}
		}
		else{
			$this->session->set_flashdata('fail','Reset password gagal, email salah');
			
			redirect(base_url('masuk'),'refresh');

		}
	}

	public function ubahpassword(){

		if(!$this->session->userdata('reset_email')){
			redirect(base_url('masuk'),'refresh');
		}
		$this->form_validation->set_rules('password1', 'New Password', 'trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat New Password', 'trim|required|min_length[6]|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			
			$data = array( 'title' => 'Ubah Password',
							'isi'	=> 'masuk/ubah'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			$i = $this->input;
			$email =$this->session->userdata('reset_email');
			$data = array(	'password'			=> SHA1($i->post('password1')),
							'email'				=> $email
							);
			$this->pelanggan_model->reset_password($data);
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('berhasil','Password berhasil dirubah, silahkan login');
			redirect(base_url('masuk'),'refresh');

		}
		
	
		
	}


}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */