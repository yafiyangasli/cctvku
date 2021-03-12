<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model'); //manggil model
		$this->load->library('pagination'); //manggil library pagination
		$this->load->library('form_validation'); //manggil library form validation
		date_default_timezone_set('Asia/Jakarta'); //set default timezone untuk controller ini menjadi asia jakarta
		if($this->input->post('search')){ //deteksi apakah search diisi ato nggak
			$search=$this->input->post('search'); //masukkin kata yg disearch kedalam variabel $search
			$this->session->set_userdata('search',$search); //set session userdata bernama search dengan isian yang ada didalam variabel search
			redirect('product'); //redirect ke halaman produk
		}
		
	}
// fungsi untuk load halaman index di about
	public function index(){

		$data['title']='';
		$data['active']='About';
		if($this->session->userdata('username')!=NULL){ //kalo semisal login berarti jumlahtrans dan jumlahcart bakal ada dan punya nilai, nilai ini bakalan jadi buat badge cart sama transaksi yang ada dinavbar
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}

		$this->load->view('templates/header',$data); //load tampilan header
		$this->load->view('about/index', $data); //load tampilan isi
		$this->load->view('templates/footer'); //load tampilan footer
	}
}
