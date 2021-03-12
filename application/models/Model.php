<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_model{

	public function getProduk($limit,$start){
		return $this->db->get('produk',$limit,$start)->result_array();
	}

	public function getDataProdukById($id){
		return $this->db->get_where('produk',['id_produk'=>$id])->row_array();
	}

	public function hapusProduk($id){
		$this->db->where('id_produk',$id);
		$this->db->delete('produk');
	}

	public function addToNewProduct($id){
		$this->db->set('is_new', 1);
		$this->db->where('id_produk', $id);
		$this->db->update('produk');
	}

	public function deleteFromNewProduct($id){
		$this->db->set('is_new', 0);
		$this->db->where('id_produk', $id);
		$this->db->update('produk');
	}

	public function hitungProduk(){
		return $this->db->get('produk')->num_rows();
	}

	public function hitungCart($username){
		return $this->db->get_where('cart', ['username' => $username])->num_rows();
	}

	public function hitungTrans($username){
		return $this->db->get_where('checkout', ['username' => $username, 'is_upload'=> 0])->num_rows();
	}

	public function hapusPembelian($id){
		$this->db->where('id_checkout',$id);
		$this->db->delete('checkout');
	}

	public function hapusOrderan($id){
		$this->db->where('id_checkout',$id);
		$this->db->delete('order');
	}

	public function getDataTrans($id){
		return $this->db->get_where('bukti',['id_bukti'=>$id])->row_array();
	}
}