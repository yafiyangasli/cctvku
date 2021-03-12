<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		$this->load->library('pagination');
		$this->load->library('form_validation');

		if($this->input->post('search')){
			$search=$this->input->post('search');
			$this->session->set_userdata('search',$search);
			redirect('product');
		}
	}
//fungsi untuk halaman product
	public function index()
	{
		if($this->session->userdata('username')!=NULL){
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}
//percabangan ini untuk deteksi kalo semisal session search ada isinya apa nggak, jadi hasil search bakal ditampilin dengan halaman yang sama namun desainnya beda
		if($this->session->userdata('search')==NULL){
		$data['title']='Catalogue ';
		$data['active']='Product';
		$data['produk']=$this->db->get('produk')->result_array();
		$data['jumlah_produk']=$this->Model->hitungProduk();


		$config['base_url']= 'http://localhost/cctvku/product/index';
		$config['total_rows']=$this->Model->hitungProduk();
		$config['per_page']=9;

		$config['full_tag_open']='<nav aria-label="Page navigation example"> <ul class="pagination  justify-content-center">';
		$config['full_tag_close']='</ul></nav>';

		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';

		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';

		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';

		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';

		$config['cur_tag_open']='<li class="page-item active"><a class="page-link text-dark bg-secondary" href="#" style="border-color : #9F9F9F;">';
		$config['cur_tag_close']='</a></li>';

		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';

		$config['attributes']=array('class'=>'page-link text-secondary');

		$this->pagination->initialize($config);


		$data['start']=$this->uri->segment(3);
		$this->db->order_by('id_produk','DESC');
		$data['produk']=$this->Model->getProduk($config['per_page'],$data['start']);

		$this->load->view('templates/header',$data);
		$this->load->view('product/index',$data);
		$this->load->view('templates/footer');
	}else{//ini untuk yang session search nya ada isi
		$data['title']='Catalogue ';
		$data['active']='Product';
		$data['produk']=$this->db->get('produk')->result_array();
		$data['jumlah_produk']=$this->Model->hitungProduk();

		if ($this->session->userdata('search')!=NULL) {//jadi akan ditampilkan dengan query like sesuai nama produk yang ada
			$keyword=$this->session->userdata('search');
			$this->db->like('nama',$keyword);
			$data['produk']=$this->db->get('produk')->result_array();
		}

		$this->load->view('templates/header',$data);
		$this->load->view('product/index',$data);
		$this->load->view('templates/footer');
		$this->session->unset_userdata('search');
	}
}
//ini untuk halaman filter harga
	public function filter(){
		if($this->session->userdata('username')!=NULL){
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}

		$min=$this->session->userdata('min');
		$max=$this->session->userdata('max');

		$data['min']=$min;
		$data['max']=$max;
//jadi datanya bakalan ditampilin sesuai dengan query between
		$query = "SELECT * FROM produk WHERE harga BETWEEN $min AND $max";

		$data['title']='Produk ';
		$data['active']='Product';
		$data['produk']=$this->db->get('produk')->result_array();
		$data['jumlah_produk']=$this->db->query($query)->num_rows();

		// if($this->session->userdata('username')!=NULL){
		// }

		$config['base_url']= 'http://localhost/cctvku/product/filter';
		$config['total_rows']=$this->db->query($query)->num_rows();
		$config['per_page']=9;

		$config['full_tag_open']='<nav aria-label="Page navigation example"> <ul class="pagination  justify-content-center">';
		$config['full_tag_close']='</ul></nav>';

		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';

		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';

		$config['next_link']='&raquo';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';

		$config['prev_link']='&laquo';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';

		$config['cur_tag_open']='<li class="page-item active"><a class="page-link text-dark bg-secondary" href="#" style="border-color : #9F9F9F;">';
		$config['cur_tag_close']='</a></li>';

		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';

		$config['attributes']=array('class'=>'page-link text-secondary');

		$this->pagination->initialize($config);


		$start=$this->uri->segment(4);
		if($start==NULL){
			$start=0;
		}
		$queryTampil= "SELECT * FROM produk WHERE harga BETWEEN $min AND $max ORDER BY harga ASC LIMIT $start, 9";
		$data['produk']=$this->db->query($queryTampil)->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('product/filter',$data);
		$this->load->view('templates/footer');
	}
//nah ini fungsi untuk eksekusi filter, jadi dari fungsi index diatas kalo semisal user filter harga bakal idlempar kesini, baru dilempar lagi ke fungsi filter
	public function filterBaru(){

//jadi kondisi percabangannya sesuai dengan input min nya ada apa nggak, input maxnya ada apa nggak, dan ada pembatas di nilai maxnya, 450.000 max nya kalo si user gak nginputin nilai max, kalo mau diganti tinggal ganti aja itu
		if($this->session->userdata('min') && $this->session->userdata('max')!=NULL){
			$this->session->unset_userdata('min');
			$this->session->unset_userdata('max');

			$min=$this->input->post('min');
			$max=$this->input->post('max');
			if($min==NULL&&$max==NULL){
				redirect('product');
			}elseif ($min==NULL&&$max!=NULL) {
				$data=[
				'min'=>1,
				'max'=>$max
			];
			$this->session->set_userdata($data);
			redirect('product/filter');
			}elseif ($min!=NULL&&$max==NULL) {
				$data=[
				'min'=>$min,
				'max'=>450000
			];
			$this->session->set_userdata($data);
			redirect('product/filter');
			}else{
				$data=[
				'min'=>$min,
				'max'=>$max
			];

			$this->session->set_userdata($data);
			redirect('product/filter');
			}

		}else{
			$min=$this->input->post('min');
			$max=$this->input->post('max');
			if($min==NULL&&$max==NULL){
				redirect('product');
			}elseif ($min==NULL&&$max!=NULL) {
				$data=[
				'min'=>1,
				'max'=>$max
			];
			$this->session->set_userdata($data);
			redirect('product/filter');
			}elseif ($min!=NULL&&$max==NULL) {
				$data=[
				'min'=>$min,
				'max'=>450000
			];
			$this->session->set_userdata($data);
			redirect('product/filter');
			}else{
				$data=[
				'min'=>$min,
				'max'=>$max
			];

			$this->session->set_userdata($data);
			redirect('product/filter');
			}
		}
	}
//fungsi untuk nampilin halaman detail produk
	public function detailProduk($id){
		if($this->session->userdata('username')!=NULL){
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}
		//jadi data si produk bakal di tarik sesuai dengan id yang tercantum di url
		$data['title']='Product ';
		$data['active']='Product';
		$data['dproduk']=$this->db->get_where('produk',['id_produk'=>$id])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('product/detailproduct',$data);
		$this->load->view('templates/footer');

	}
}
