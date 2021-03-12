<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
//hampir sama kayak yang sebelum sebelumnya
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		$this->load->library('pagination');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$waktuNow=date('Y-m-d H:i:s');
		if($this->input->post('search')){
			$search=$this->input->post('search');
			$this->session->set_userdata('search',$search);
			redirect('product');
		}
		
	}

	public function index(){

		$data['title']='';
		$data['active']='HOME';
		$data['produk']=$this->db->get_where('produk',['is_new'=>1])->result_array();
		if($this->session->userdata('username')!=NULL){
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}

		$this->load->view('templates/header',$data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}
