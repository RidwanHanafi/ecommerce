<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  // Halaman login
  public function index()
  {
    //validasi
      $this->form_validation->set_rules('username','Username','required',
        array('required' => '%s harus di isi'));

      $this->form_validation->set_rules('password','Password','required',
        array('required' => '%s harus di isi'));

      if($this->form_validation->run()){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //proses menuju ke simple Login
        $this->simple_login->login($username,$password);
      }
      //end validasi

      $data = array('title' =>'Login Admin');
      $this->load->view('login/list', $data, FALSE);
  }

  //fungsi logout
  public function logout()
  {
    //ambil fungsi logout dari Simple_login
    $this->simple_login->logout();
  }

}
