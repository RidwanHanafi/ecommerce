<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat_model extends CI_Model {
    
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
// alamat pengiriman pelanggan 
    //ajax listing ongkir ke pelanggan jika status aktif 
    public function kecamatan()
    {
        $this->db->from('kecamatan');
        $this->db->join('ongkir', 'ongkir.id_kecamatan = kecamatan.id', 'left');
        $this->db->where('regency_id', '3308');
        $this->db->where('ongkir.status', 'aktif');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
		return $query->result();
        
    }
    //ajax listing desa sesuai kecamatan yg dipilih
    public function desa($kecamatan_id)
    {
        $this->db->select('desa.*');
        $this->db->from('desa');
        $this->db->join('ongkir', 'ongkir.id_kecamatan = desa.district_id', 'left');
        $this->db->where('desa.district_id', $kecamatan_id);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
// end alamat pengiriman pelanggan

    //listing ongkir
    public function listing()
    {
        $this->db->select('ongkir.*');
        $this->db->from('ongkir');
        $this->db->order_by('tanggal', 'desc');
        $this->db->order_by('kecamatan', 'asc');
		$query = $this->db->get();
		return $query->result();
    }

    public function detail($id_kecamatan){
        $this->db->select('ongkir.*');
        $this->db->from('ongkir');
        $this->db->where('ongkir.id_kecamatan', $id_kecamatan);
        $query = $this->db->get();
		return $query->row();
    }

    //update ongkir kecamatan
    public function edit($data)
    {
        // $this->db->query(   "update ongkir 
        //                     set status = '$status' 
        //                     where id='$id' ");
        $this->db->where('id_kecamatan', $data['id_kecamatan']);
		$this->db->update('ongkir', $data);
    }	

    //menampilkan nama kecamatan berdasarkan id_kecamatan
    public function cek_kecamatan($kecamatan){
        $this->db->select('ongkir.*');
        $this->db->from('ongkir');
        $this->db->where('ongkir.id_kecamatan', $kecamatan);
        $query = $this->db->get();
		return $query->row();
    }
  

    public function onkos_kirim()
    {
        $this->db->select('kecamatan.*');
        $this->db->from('kecamatan');
        $this->db->join('ongkir', 'ongkir.id_kecamatan = kecamatan.id', 'left');
        $this->db->where('id_kecamatan', '');
        $query = $this->db->get();
        return $query->result();
    }


}

/* End of file Alamat_model.php */
?>