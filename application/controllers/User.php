<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
//fungsi untuk masukkin produk ke tabel cart, overall hampir sama kayak yang lain
	public function addToCart($id){
		if($this->session->userdata('username')==NULL){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, login first.</div>');
			redirect('login');
		}else{
			$data['produk']=$this->db->get_where('produk',['id_produk'=>$id])->row_array();

			$username=$this->session->userdata('username');
			$id_produk=$id;
			$jumlah=$this->input->post('jumlah');
			$harga=$data['produk']['harga'];
			$berat=$data['produk']['berat'];

			if ($jumlah == 0) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, input quantity!</div>');
				redirect('catalogue/detailProduk/'.$id);
			}

			$data['cartuser']=$this->db->get_where('cart',[
				'username'=>$username,
				'id_produk'=>$id_produk
			])->row_array();

			$produk=$this->db->get_where('produk',['id_produk'=>$id_produk])->row_array();

			if($id_produk==$data['cartuser']['id_produk']){
				$jumlahBaru= $data['cartuser']['jumlah'] + $jumlah;

				$dataBaru=[
					'jumlah'=>$jumlahBaru
				];

				$this->db->where('id_cart',$data['cartuser']['id_cart']);
				$this->db->update('cart',$dataBaru);
				redirect('user/cart');

			}else{
				$data=[
					'username'=>$username,
					'id_produk'=>$id_produk,
					'jumlah'=>$jumlah,
					'harga'=>$harga,
					'berat'=>$berat
				];
				$this->db->insert('cart',$data);
				redirect('user/cart');
			}
		}
	}
//fungsi untuk tampilan cart
	public function cart()
	{
		if($this->session->userdata('username')!=NULL){
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}
		if ($this->session->userdata('username')==NULL) {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, login first.</div>');
			redirect('login');
		}
		$data['title']='My Cart ';
		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

		$data['active']='Cart';
		$data['produk']=$this->db->get('produk')->result_array();
		$data['cart']=$this->db->get_where('cart',['username'=>$this->session->userdata('username')])->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('user/cart',$data);
		$this->load->view('templates/footer');
	}

//fungsi untuk remove produk dari cart
	public function removeCart($id){
		$this->db->where('id_cart',$id);
		$this->db->delete('cart');
		redirect('user/cart');
	}
//fungsi untuk update jumlah item yang ada di cart
	public function updateCart($id){

		$jumlah=$this->input->post('jumlah');

		$data['cart']=$this->db->get_where('cart',['id_cart'=>$id])->row_array();

		$jumlahBaru=[
			'jumlah'=>$jumlah
		];

		$this->db->where('id_cart',$id);
		$this->db->update('cart',$jumlahBaru);
		redirect('user/cart');

	}
//fungsi untuk update jumlah barang yang bisa dibeli per itemnya cart ketika stok barang ternyata lebih sedikit karena udah berkurang karena aktifitas pembelian dari user lain, jadi nilai yang bisa dibeli bakalan di update di cart user tersebut
	public function updateCartStokKurang($id,$stokbaru){
		$data['cart']=$this->db->get_where('cart',['id_cart'=>$id])->row_array();

		$jumlahBaru=[
			'jumlah'=>$stokbaru
		];

		$this->db->where('id_cart',$id);
		$this->db->update('cart',$jumlahBaru);
		redirect('user/cart');
	}
//fungsi untuk tampilan checkout address
	public function checkout(){
		if ($this->session->userdata('username')==NULL) {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, login first.</div>');
			redirect('login');
		}
		if($this->session->userdata('username')!=NULL){
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));	
		}
	
		$data['title']='Checkout ';
		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

		$data['active']='Cart';
		$data['produk']=$this->db->get('produk')->result_array();
		$data['cart']=$this->db->get_where('cart',['username'=>$this->session->userdata('username')])->result_array();
		$data['provinsi']=$this->db->get_where('ongkir_propinsi',['propinsi1'=>"Lampung"])->result_array();

		if ($data['cart']==NULL) {
			redirect('user/cart');
		}

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('provinsi','Province','required|trim');

		if($this->form_validation->run()==false){	
			$this->load->view('templates/header',$data);
			$this->load->view('user/checkout',$data);
			$this->load->view('templates/footer');
		}else{
			$this->confirmCheckout();
		}
	}
//fungsi untuk tampilan checkout yang udah ada delivery fee nya
	public function confirmCheckout(){
		if ($this->session->userdata('username')==NULL) {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, login first.</div>');
			redirect('login');
		}
		if($this->session->userdata('username')!=NULL){
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
		}

		$data['title']='Checkout ';
		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['active']='Cart';
		$data['produk']=$this->db->get('produk')->result_array();
		$data['nama'] = $this->input->post('name');//$this->input->post ini untuk narik data input yang dikirim dari layer view menggunakan method post
		$data['alamat'] = $this->input->post('address');
		$data['provinsi'] = $this->input->post('provinsi');
		$data['cart']=$this->db->get_where('cart',['username'=>$this->session->userdata('username')])->result_array();
		$data['ongkir']=$this->db->get_where('ongkir_propinsi',['propinsi1'=>"Lampung", 'propinsi2'=>$data['provinsi']])->row_array();
//code dibawah ini digunakan untuk ngitung total berat, total harga barang, total ongkir, dan total checkout nya
		$totalPesan=0;
	    $totalCheckout=0;
	    $jumlahPesan=0;
	    $totalBerat = 0;
	    $totalBeratCheckout = 0;
	    foreach($data['cart'] as $ct){
	        $hargaAwal= $ct['harga'];
	        $jumlahPesan= $ct['jumlah'];
	        $totalPesan = $hargaAwal * $jumlahPesan;
	        $totalCheckout = $totalCheckout + $totalPesan;
	    }

	    foreach ($data['cart'] as $ct) {
	    	$beratAwal = $ct['berat'];
	    	$jumlahPesan= $ct['jumlah'];
	        $totalBerat = $beratAwal * $jumlahPesan;
	        $totalBeratCheckout = $totalBeratCheckout + $totalBerat;	
	    }
	 	$data['totalCheckout'] = $totalCheckout;
	 	$data['totalBerat'] = $totalBeratCheckout;
	 	$data['jumlahPesan'] = $jumlahPesan;
	    $data['total'] = $totalCheckout + ($data['ongkir']['ongkir_jne'] * $totalBeratCheckout);
//sampe sini
		$this->load->view('templates/header',$data);
		$this->load->view('user/confirmcheckout',$data);
		$this->load->view('templates/footer');

	}
//fungsi ini dipake buat proses data checkout diatas, jadi di fungsi ini data diatas bakal dimasukkin kedalem database checkout
	public function prosesCheckout(){
		$username=$this->session->userdata('username');
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$province=$this->input->post('provinsi');
		$waktuNow=date('Y-m-d H:i:s');
        $deadline=date('Y-m-d H:i:s', strtotime('+24 hours') );

        $data['cart']=$this->db->get_where('cart',['username'=>$this->session->userdata('username')])->result_array();
		$data['ongkir']=$this->db->get_where('ongkir_propinsi',['propinsi1'=>"Lampung", 'propinsi2'=>$province])->row_array();

		$totalPesan=0;
	    $totalCheckout=0;
	    $jumlahPesan=0;
	    $totalBerat = 0;
	    $totalBeratCheckout = 0;
	    foreach($data['cart'] as $ct){
	        $hargaAwal= $ct['harga'];
	        $jumlahPesan= $ct['jumlah'];
	        $totalPesan = $hargaAwal * $jumlahPesan;
	        $totalCheckout = $totalCheckout + $totalPesan;
	    }

	    foreach ($data['cart'] as $ct) {
	    	$beratAwal = $ct['berat'];
	    	$jumlahPesan= $ct['jumlah'];
	        $totalBerat = $beratAwal * $jumlahPesan;
	        $totalBeratCheckout = $totalBeratCheckout + $totalBerat;	
	    }
	    $total = $totalCheckout + ($data['ongkir']['ongkir_jne'] * $totalBeratCheckout);
	    $waktuNow=date('Y-m-d H:i:s');
	    $deadline=date('Y-m-d H:i:s', strtotime('+24 hours'));

	    $dataCheckout = [
	    	'username' => $username,
	    	'nama' => $name,
	    	'address' => $address,
	    	'provinsi' => $province,
	    	'ongkir' => $data['ongkir']['ongkir_jne'],
	    	'total' => $total,
	    	'waktu' => $waktuNow,
	    	'deadline' => $deadline,
	    	'is_upload' => 0
	    ];

	    $this->db->insert('checkout',$dataCheckout);

	    $data['checkout']=$this->db->get_where('checkout',['username'=>$username, 'deadline'=>$deadline])->row_array();

//kode dibawah ini dipake untuk ngapus data yang ada dicart, jadi setelah checkout cartnya bakal dikosongin, dan data yang ditabel cart tadi bakal di transfer ke tabel order
	    $id_checkout=$data['checkout']['id_checkout'];
		$waktu=$data['checkout']['waktu'];
		foreach ($data['cart'] as $ct) {
			if($ct['username']==$data['checkout']['username']){
				$username=$this->session->userdata('username');
				$id_produk=$ct['id_produk'];
				$harga=$ct['harga'];
				$jumlah=$ct['jumlah'];
				$waktu=$data['checkout']['waktu'];

				$dataPushCart = [
					'id_checkout'=>$id_checkout,
					'username'=>$username,
					'id_produk'=>$id_produk,
					'jumlah'=>$jumlah,
					'harga'=>$harga,
					'waktu'=>$waktu
				];

				$this->db->insert('order',$dataPushCart);

				$this->db->where('username',$username);
				$this->db->delete('cart');
//sampe sini
				//code dibawah ini dipake buat ngurangin stok produk di tabel produk
				$selectStok="SELECT * FROM produk WHERE id_produk = $id_produk";
				$data['stokKurang']=$this->db->query($selectStok)->row_array();

				$stok=$data['stokKurang']['stok'];
				$kurangStok=$stok-$jumlah;
				
				$this->db->set('stok',$kurangStok);
				$this->db->where('id_produk',$id_produk);
				$this->db->update('produk');
				//sampe sini
			}
		}
		redirect('user/transaction');
	}
//fungsi untuk tampilan transaction
	public function transaction(){
		if ($this->session->userdata('username')==NULL) {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, login first.</div>');
			redirect('auth');
		}

		if($this->session->userdata('username')!=NULL){
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
		}

		$data['title']='My Transaction ';
		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

		$data['active']='User';
		$this->db->order_by('waktu','DESC');
		$data['checkout']=$this->db->get_where('checkout',['username'=>$this->session->userdata('username')])->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('user/transaction',$data);
		$this->load->view('templates/footer');
	}
//fungsi untuk tampilan form upload bukti transfer
	public function transaction_form($id){
		if ($this->session->userdata('username')==NULL) {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please, login first.</div>');
			redirect('auth');
		}

		if($this->session->userdata('username')!=NULL){
			$data['jumlahCart'] = $this->Model->hitungCart($this->session->userdata('username'));
			$data['jumlahTrans'] = $this->Model->hitungTrans($this->session->userdata('username'));
		}

		$data['title']='Confirm Transaction ';
		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

		$data['active']='Transaction';
		$data['checkout']=$this->db->get_where('checkout',['id_checkout'=>$id])->row_array();
		$data['order']=$this->db->get_where('order',['id_checkout'=>$id])->result_array();
		$waktuNow=date('Y-m-d H:i:s');

		if($waktuNow>=$data['checkout']['deadline']){// jadi ketika deadline pembayaran terlewat, maka data checkout dan order sesuai dengan usernamenya akan di apus otomatis
		    $this->Model->hapusPembelian($data['checkout']['id_checkout']);
		    $this->Model->hapusOrderan($data['order']['id_checkout']);
		    $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Your transaction has been canceled, please confirm your transaction before the deadline!</div>');
		    redirect('user/transaction');
		}

		$this->form_validation->set_rules('namaAkun', 'Account Name', 'required|trim');
		$this->form_validation->set_rules('nomorAkun', 'Account Number', 'required|trim');
		$this->form_validation->set_rules('namaBank', 'Bank Transfer From', 'required|trim');
		$this->form_validation->set_rules('transferdate', 'Transfer Date', 'required|trim');

		if($this->form_validation->run()==false){
			$this->load->view('templates/header',$data);
			$this->load->view('user/transaction_form',$data);
			$this->load->view('templates/footer');
		}else{
			$tanggalTrans=$this->input->post('transferdate');
			$nama_image = $_FILES['image']['name'];
			$upload_image = str_replace(" ", "_", $nama_image);

			$config['allowed_types']='gif|jpg|png|jpeg|PNG|JPG|GIF|JPEG';
			$config['max_size']		='200048';
			$config['upload_path']	='./assets/images/buktitrans/';
			
			if($upload_image==NULL){
				$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Please upload Transfer Receipt!</div>');
				redirect('user/transaction_form/'.$id);
			}
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        	} else {
            $result = $this->upload->data();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        	}

			$data=[
				'id_checkout'=>$id,
				'username'=>$this->session->userdata('username'),
				'nama_akun'=>htmlspecialchars($this->input->post('namaAkun',true)),
				'nomor_akun'=>htmlspecialchars($this->input->post('nomorAkun',true)),
				'bank'=>htmlspecialchars($this->input->post('namaBank',true)),
				'total'=>$data['checkout']['total'],
				'tanggal_trans'=>$tanggalTrans,
				'bukti_trans'=>$upload_image
			];

			$this->db->insert('bukti',$data);
			$queryOrder="UPDATE `checkout` SET `is_upload` = '1' WHERE `checkout`.`id_checkout` = $id";
			$this->db->query($queryOrder);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your transaction has been received, please wait untill our team confirm your transaction.</div>');
			redirect('user/transaction');
		}
	}
}
