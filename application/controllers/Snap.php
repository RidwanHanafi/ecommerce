<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
		parent::__construct();
		
		header("Access-Control-Allow-Origin: *");  
		header("Access-Control-Allow-Methods: PUT, GET, POST");
		header("Access-Control-Allow-Header: Origin, X-Requested-With, Content-Type, Accept");

        $params = array('server_key' => 'SB-Mid-server-ld9Hm9xW2_JUewdUhwkWH4b1', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('snap_model');
		$this->load->model('alamat_model');
		$this->load->helper('url');
		$this->load->helper('string');

    }

    public function index()
    {
    	//cek pelanggan login atau blm, jika belum harus registrasi dan langsung login (mengecek dengan session email)
		//kondisi sudah login
		if($this->session->userdata('email')){
			if($this->cart->total() > 0 && !empty($this->input->post('kecamatan')) && !empty($this->input->post('atas_nama'))){
			
			$email 				= $this->session->userdata('email');
			$nama_pelanggan		= $this->session->userdata('nama_pelanggan');
			$pelanggan 			= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);
			$keranjang 			= $this->cart->contents();


			//menambil nama kecamatan sesuai id_kecamatan
			$i= $this->input;
			$kecamatan = $i->post('kecamatan');
			$data_alamat = $this->alamat_model->cek_kecamatan($kecamatan);
			$jumlah = $data_alamat->jumlah;
			//end ambil
			$this->session->set_userdata('ongkir', $jumlah);
			
			$data = array(	'title' 		=> 'Checkout',
							'keranjang' 	=> $keranjang,
							'pelanggan'		=> $pelanggan,
							'nama_pelanggan'=> $nama_pelanggan,
							'email'			=> $email,
							'atas_nama'		=> $i->post('atas_nama'),
							'telepon'		=> $i->post('telepon'),
							'alamat'		=> $i->post('alamat'),
							'kecamatan'		=> $data_alamat->kecamatan,
							'desa'			=> $i->post('desa'),
							'ongkir'		=> $jumlah,
							'isi'			=> 'checkout_snap'
						);


			$this->load->view('layout/wrapper', $data, FALSE);
			}else if($this->cart->total() > 0){
				//jika cart ada tetapi belum mengisi data -> belanja
				redirect(base_url('belanja'),'refresh');
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
	

    public function token()
    {
		
    	$kode_transaksi = date('dmY').strtoupper(random_string('alnum', 6));  
 		$email 			= $this->session->userdata('email');
		$nama_pelanggan = $this->session->userdata('nama_pelanggan');
		$ongkir			= $this->session->userdata('ongkir');

		$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);
		$keranjang 		= $this->cart->contents();
		
		$ongkos = array(	'id'	=>'000',
		      				'price' => $ongkir,
		      				'quantity' => '1',
		      				'name' => 'Ongkos Kirim'
		      				);  
		
	    foreach ($keranjang as $keranjang) {
	        $keranjang = array(	'id' => $keranjang['id'],
				           	'price' => $keranjang['price'],
				           	'quantity' => $keranjang['qty'],
				           	'name' => $keranjang['name']
          					);
          	$kr[] = $keranjang;
      	}
      	array_push($kr,$ongkos);
		// // Optional
		// $item1_details = array(
		//   'id' => 'a1',
		//   'price' => 15000,
		//   'quantity' => 2,
		//   'name' => "Apple"
		// );

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 15000,
		//   'quantity' => 1,
		//   'name' => "Orange"
		// );

		$item_details = $kr;
		
		$transaction_details = array(
		  'order_id' 	=> $kode_transaksi,
		  'gross_amount'=> $this->cart->total()+$ongkir// no decimal allowed for creditcard
		);


		// Optional
		// $billing_address = array(
		//   'first_name'    => $atas_nama,
		//   'address'       => 'Kecamatan ',$kecamatan.', Desa '.$desa,
		//   // 'city'          => "Jakarta",
		//   //'postal_code'   => "16602",
		//   'phone'         => $telepon,
		//   'country_code'  => 'IDN'
		// );
		
		// Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		//Optional
		// $customer_details = array(
		//   'first_name'    => $atas_nama,
		//   'email'         => $email,
		//   'phone'         => $pelanggan->telepon,
		//   'billing_address'  => $billing_address,
		//   //'shipping_address' => $shipping_address
		// );

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 5
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
           	//'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
		

    }

    public function finish()
    {
	 	//kondisi sudah login
		if($this->session->userdata('email')){
	    	//kondisi jika cart tidak kosong
			if(!empty($this->cart->contents())){
				$email 			= $this->session->userdata('email');
				$nama_pelanggan = $this->session->userdata('nama_pelanggan');
				$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);
				$keranjang 		= $this->cart->contents();


				$result = json_decode($this->input->post('result_data'));
				
				if(isset($result->va_numbers[0]->bank)){
					$bank = $result->va_numbers[0]->bank;
				}else{
					$bank = NULL;
				}

				if(isset($result->va_numbers[0]->va_number)){
					$va_number = $result->va_numbers[0]->va_number;
				}else{
					$va_number = NULL;
				}

				if(isset($result->bca_va_number)){
					$bca_va_number = $result->bca_va_number;
				}else{
					$bca_va_number = NULL;
				}

				if(isset($result->bill_key)){
					$bill_key = $result->bill_key;
				}else{
					$bill_key = NULL;
				}

				if(isset($result->biller_code)){
					$biller_code = $result->biller_code;
				}else{
					$biller_code = NULL;
				}

				if(isset($result->permata_va_number)){
					$permata_va_number = $result->permata_va_number;
				}else{
					$permata_va_number = NULL;
				}
				
				$data = [
					//sama balikannya dengan bank lain
					'status_code' => $result->status_code,
					'status_message' => $result->status_message,
					'transaction_id' => $result->transaction_id,
					'order_id' => $result->order_id,
					'gross_amount' =>$result->gross_amount,
					'payment_type' =>$result->payment_type,
					'transaction_time' =>$result->transaction_time,
					'transaction_status' => $result->transaction_status,

					'fraud_status' => $result->fraud_status,
					'pdf_url' => $result->pdf_url,
					'finish_redirect_url' => $result->finish_redirect_url,
					//tiap bank beda
					'permata_va_number' =>$permata_va_number,
					'bank'=>$bank,
					'va_number' =>$va_number,
					'bill_key' =>$bill_key,
					'biller_code' =>$biller_code,
					'bca_va_number' => $bca_va_number,
				];
					
					$hasil = $this->data['finish'] = json_decode($this->input->post('result_data'));
					$return = $this->snap_model->insert($data);
					
					
					$data =array(	'title' 	=> 'Konfirmasi',
									'return'	=> $return,
									'finish'	=> $hasil,
									'isi'  		=> 'belanja/konfirmasi');
				
					//proses masuk ke tabel transaksi
					foreach ($keranjang as $keranjang) {
						$sub_total = $keranjang['price'] * $keranjang['qty']; 
						$transaksi_item =array(	'id_pelanggan'	=>$pelanggan->id_pelanggan,
										'order_id' 				=>$result->order_id,
										'id_produk' 			=>$keranjang['id'],
										'harga'					=>$keranjang['price'],
										'jumlah'				=>$keranjang['qty'],
										'total_harga'			=>$sub_total,
										'tanggal_transaksi'		=>$result->transaction_time
									);
					$this->transaksi_model->tambah($transaksi_item);

					}
					
					//proses masuk ke tabel header_transaksi;
					$i= $this->input;
					$pelanggan = array( 
										'id_pelanggan'		=> $pelanggan->id_pelanggan,
										'nama_pelanggan'	=> $i->post('atas_nama'),
										'email'				=> $email,
										'telepon'			=> $i->post('telepon'),
										'kecamatan'			=> $i->post('kecamatan'),
										'desa'				=> $i->post('desa'),
										'alamat'			=> $i->post('alamat'),
										'order_id'			=> $result->order_id,
										'tanggal_transaksi'	=> $result->transaction_time,
										'jumlah_bayar'		=> $result->gross_amount,
										'tanggal_post'		=> date('Y-m-d H:i:s')
										);

					//proses masuk ke tabel header_transaksi
					$this->header_transaksi_model->tambah($pelanggan);
					//end proses masuk tabel transaksi

					//setelah masuk ke tabel transaksi, maka keranjang dikosongkan
					$this->session->unset_userdata('ongkir');
					$this->session->unset_userdata('atas_nama');
					$this->session->unset_userdata('telepon');
					$this->session->unset_userdata('alamat');
					$this->session->unset_userdata('kecamatan');
					$this->session->unset_userdata('desa');


					$this->cart->destroy();
					$link = anchor('dashboard/belanja', 'cek detail pemesanan');
					$message = 'Segera lakukan pembayaran atau' .' '. $link .' '. '?';
					$this->session->set_flashdata('konfirmasi', $message);
					$this->load->view('layout/wrapper', $data, FALSE);
					
				}else{
					//jika cart kosong
					$result = json_decode('result_data');
				
					if(isset($result->va_numbers[0]->bank)){
						$bank = $result->va_numbers[0]->bank;
					}else{
						$bank = '-';
					}

					if(isset($result->va_numbers[0]->va_number)){
						$va_number = $result->va_numbers[0]->va_number;
					}else{
						$va_number = '-';
					}

					if(isset($result->bca_va_numbers)){
						$bca_va_number = $result->bca_va_number;
					}else{
						$bca_va_number = '-';
					}

					if(isset($result->bill_key)){
						$bill_key = $result->bill_key;
					}else{
						$bill_key = '-';
					}

					if(isset($result->biller_code)){
						$biller_code = $result->biller_code;
					}else{
						$biller_code = '-';
					}

					if(isset($result->permata_va_number)){
						$permata_va_number = $result->permata_va_number;
					}else{
						$permata_va_number = '-';
					}

					$hasil = $this->data['finish'] = json_decode($this->input->post('result_data'));
					$data =array(	'title' 	=> 'Konfirmasi',
									'finish'	=>  $hasil,
									'isi'  		=> 'belanja/konfirmasi');

					$link = anchor('dashboard/belanja', 'cek pembayaran');
					$message = 'Segera lakukan pembayaran atau' .' '. $link .' '. '?';
					$this->session->set_flashdata('gagal', $message);
					$this->load->view('layout/wrapper',$data, FALSE);
				}

			}else{
				//jika belum registrasi, masuk keregistrasi
				$this->session->set_flashdata('registrasi', '<div class="stext-110 alert alert-info alert-dismissible" style="margin: 0px 550px 0px 150px;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');
				redirect(base_url('registrasi'),'refresh');
			}

	}
	private function _sendEmail($token, $type){
		
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'rambocool888@gmail.com';
        $config['smtp_pass'] = '***********';
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
		if($type =='bayar'){
			$this->email->subject('Pembayaran');
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
    
}
