<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alamat_model');
		$this->simple_login->cek_login();
    }
    
   	
	public function index()
	{
		$ongkir = $this->alamat_model->listing();
		$data = array(	'title' 			=> 'Ongkos Kirim',
                        'ongkir'        	=>  $ongkir,
						'isi'				=> 'admin/ongkir/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function edit($id_kecamatan)
    {
        $detail = $this->alamat_model->detail($id_kecamatan);
        //validasi
        $valid = $this->form_validation;
		$valid->set_rules('status','Anda belum','required', 
						array('required'=> '%s memilih status'));
		if ($valid->run()==FALSE) {
					
			$data =array(	'title' =>'Ubah Ongkir',
							'detail'=> $detail,
							'isi' 	=>'admin/ongkir/edit'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
            $i = $this->input;
            $data = array('id_kecamatan'=> $id_kecamatan,
                            'status'    => $i->post('status'),
                            'jumlah'    => $i->post('jumlah'),
                            'tanggal'   => date('Y-m-d H:i:s')
                        );
			$this->alamat_model->edit($data);
			$this->session->set_flashdata('edit','Data berhasil ubah');
			redirect(base_url('admin/ongkir'),'refresh');
		}
    }

}

/* End of file Ongkir.php */
 ?>