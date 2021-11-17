<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

//Listing all produk
	public function listing()
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->where('produk.status_produk', 'Publikasi');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		//$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}
//Listing diadmin
	public function listing_admin()
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		//$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

//Listing all produk home
	public function home()
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->where('produk.status_produk', 'Publikasi');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}
	
	//read produk
	public function read($slug_produk)
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->where('produk.status_produk', 'Publikasi');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//produk
	public function produk($limit, $start)
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->where('produk.status_produk', 'Publikasi');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function produk_populer(){
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar,
							COUNT(transaksi.`id_produk`) AS jml');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('transaksi', 'transaksi.id_produk = produk.id_produk', 'left');
		$this->db->join('request_transaksi', 'request_transaksi.order_id = transaksi.order_id', 'left');
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->where('request_transaksi.transaction_status', 'settlement');
		$this->db->where('produk.status_produk', 'Publikasi');
		$this->db->group_by('produk.nama_produk');
		$this->db->order_by('jml', 'desc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();

	}

	//total produk
	public function total_produk(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk','Publikasi');
		$query = $this->db->get();
		return $query->row();
	}

	//kategori produk
	public function kategori($id_kategori, $limit, $start)
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->where('produk.status_produk', 'Publikasi');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	//total kategori produk
	public function total_kategori($id_kategori){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk','Publikasi');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}


//listing kategori
	public function listing_kategori()
	{
		$this->db->select(	'produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) as jumlah_gambar');
		$this->db->from('produk');



		//JOIN penggabungan tabel
		$this->db->join('users','users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		//$this->db->join();
		//end
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}
	

//Detail produk
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

//Produk
	//Tambah
	public function tambah($data){
		$this->db->insert('produk', $data);
	}
	//edit
	public function edit($data){
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}
	//delete
	public function delete($data){
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}
	//edit
	public function edit_kategori_null($data){
		$this->db->set('status_produk','Draft');
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('produk', $data);
	}

//Utk gambar
	public function gambar($id_produk){
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//Tambah gambar
	public function tambah_gambar($data){
		$this->db->insert('gambar', $data);
	}
	//hapus_gambar (delete)
	public function hapus_gambar($data){
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}
	//Detail gambar produk
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */
