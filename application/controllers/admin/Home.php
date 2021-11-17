<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

//Halaman utama toko
  public function index()
  {

    $data = array('title' => 'Esthree Cake and Bakery',
                  'isi'   => 'home/list');

      $this->load->view('layout/wrapper', $data, FALSE);
  }

}
