<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('form_validation');
	}
//fungsi untuk halaman awal admin
	public function index()
	{
		$data['title']='Belum Dikonfirmasi';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array(); //load data user yang aktif sekarang
		$data['bukti']=$this->db->get_where('bukti',['is_processed'=>0])->result_array(); //load data di tabel bukti

		$this->load->view('templates/admin/header',$data);//$data didalem view ini maksudnya untuk ngirim data yang ada didalem array data ke layer view
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/admin/footer');
	}
//fungsi untuk tampilan detail transaksi
	public function detailTrans($id){
		$data['title']='Detail Transaksi';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['buktijumlah']=$this->db->get('bukti')->result_array();
		$data['bukti']=$this->Model->getDataTrans($id); //$this->Model->(fungsi) gunanya untuk manggil fungsi yang ada di model
		$data['produk']=$this->db->get('produk')->result_array(); //manggil data produk di tabel produk
		$id_checkout=$data['bukti']['id_checkout']; //nyimpen data id checkout yang ada di array data['bukti'] kedalam variabel id checkout, hal ini berlaku juga pada pemanggilan kayak begini di variabel yang lain
		$data['checkout']=$this->db->get_where('checkout',['id_checkout'=>$id_checkout])->row_array(); //manggil ada yang ada tabel checkout dengan kondisi, hal ini sama aja dengan query 'SELECT * FROM checkout WHERE id_checkout = $id_checkout', perbedaan row_array dengan result_array adalah kalo row array itu dia ngambil data pertama yang diambil dari db sedangkan kalo result array itu ngambil semua data yang diambil
		$data['order']=$this->db->get_where('orderan',['id_checkout'=>$data['bukti']['id_checkout']])->result_array();
	
		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/detailtrans',$data);
		$this->load->view('templates/admin/footer');	
	}
//fungsi untuk confirm payment
	public function confirmPayment($id){
		$data['konfirmasi']=$this->db->get_where('bukti',['id_bukti'=>$id])->row_array();
		$data['order']=$this->db->get_where('orderan',['id_checkout'=>$data['konfirmasi']['id_checkout']])->result_array();

		$id_checkout=$data['konfirmasi']['id_checkout'];
		
		$queryConfirm="UPDATE `bukti` SET `is_processed` = '1' WHERE `bukti`.`id_bukti` = $id"; //jadi disini ketika pembayaran user udah didapatkan dan diconfirm sama admin, field is_processed si user yang ada di tabel bukti bakal berubah dari 0 jadi 1, gunanya untuk pembeda bahwa barang si produk lagi diproses
		$queryConfirmCheckout="UPDATE `checkout` SET `is_upload` = '1' WHERE `checkout`.`id_checkout` = $id_checkout"; //konsepnya sama kayak diatas, field is upload di tabel checkout diubah jadi 1 untuk pembeda bahwa siuser udah upload bukti transfer
		$this->db->query($queryConfirm);//$this->db->query gunanya untuk eksekusi query yang kita buat sendiri
		$this->db->query($queryConfirmCheckout);
		
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Transaksi dikonfirmasi!</div>'); //set_flashdata ini gunanya untuk nyimpen session tapi sekali pake, kalo disini dia dipake untuk ngasih message bahwa transaction has been confirmed dan ini bakal ditampilin di view
		redirect('admin/unprocessedOrder'); //redirect ke fungsi unprocessedOrder di controllers admin, konsepnya sama pada semua redirect
	}
//fungsi untuk cancel payment
	public function cancelPayment($id){
		$data['konfirmasi']=$this->db->get_where('bukti',['id_bukti'=>$id])->row_array();
		$data['order']=$this->db->get_where('orderan',['id_checkout'=>$data['konfirmasi']['id_checkout']])->result_array();

		$id_checkout=$data['konfirmasi']['id_checkout'];

		$queryConfirm="UPDATE `bukti` SET `is_processed` = '2' WHERE `bukti`.`id_bukti` = $id";//disini is proses sama is upload diubah ke 2 sebagai pembukti bahwa paymentnya dicancel sama admin karena bermasalah
		$queryConfirmCheckout="UPDATE `checkout` SET `is_upload` = '2' WHERE `checkout`.`id_checkout` = $id_checkout";
		$this->db->query($queryConfirm);
		$this->db->query($queryConfirmCheckout);
		
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Transaksi dibatalkan!</div>');
		redirect('admin/canceledOrder');
	}
//fungsi untuk delete payment
	public function deletePayment($id){
		$data['konfirmasi']=$this->db->get_where('bukti',['id_bukti'=>$id])->row_array();
		$data['order']=$this->db->get_where('orderan',['id_checkout'=>$data['konfirmasi']['id_checkout']])->result_array();
		$id_checkout=$data['konfirmasi']['id_checkout'];

		$this->db->where('id_bukti',$id); //$this->db->where ini digunain untuk save state query where
		$this->db->delete('bukti');//yang ini untuk jalanin query delete di db nya, jadi dua code ini sama aja kayak 'DELETE FROM bukti WHERE id_bukti = $id', konsepnya sama kayak yang codingannya begini

		$this->db->where('id_checkout',$id_checkout);
		$this->db->delete('checkout');

		foreach ($data['order'] as $order) {//foreach disini itu untuk nambahin lagi data stok yang udah dikurangin pas user checkout, jadi kan paymentnya didelete jadi stok yang udah dikurangin di db bakal diupdate ke semula sebelum user checkout
			$id_orderan=$order['id_orderan'];
			$id_produk=$order['id_produk'];
			$data['produk'] = $this->db->get_where('produk',['id_produk'=>$id_produk])->row_array();
			$jumlah=$order['jumlah'] + $data['produk']['stok'];
			
			$this->db->set('stok',$jumlah);//ini untuk ngejalanin query update, jadi di set dlu abis itu where state nya abis itu tabelnya apa yang mau diupdate
			$this->db->where('id_produk',$id_produk);
			$this->db->update('produk');
			$this->db->where('id_orderan',$id_orderan);
			$this->db->delete('orderan');
		}
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Transaksi dihapus!</div>');
		redirect('admin/canceledOrder');
	}
//ini fungsi untuk nampilin layer unprocessed order
	public function unprocessedOrder(){
		$data['title']='Belum diproses';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$this->db->order_by('id_bukti','ASC');
		$data['bukti']=$this->db->get_where('bukti',['is_processed'=>1])->result_array();

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/unprocessed_order',$data);
		$this->load->view('templates/admin/footer');
	}
//ini fungsi untuk nampilin layer canceled order
	public function canceledOrder(){
		$data['title']='Order dibatalkan';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['bukti']=$this->db->get_where('bukti',['is_processed'=>2])->result_array();

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/canceled',$data);
		$this->load->view('templates/admin/footer');
	}
//ini fungsi untuk konfirmasi bahwa order bakal diproses
	public function confirmProcessingOrder($id){
		$data['konfirmasi']=$this->db->get_where('bukti',['id_bukti'=>$id])->row_array();
		$data['order']=$this->db->get_where('orderan',['id_checkout'=>$data['konfirmasi']['id_checkout']])->result_array();
		if($this->input->post('resi')==NULL){//ini percabangan untuk deteksi kalo nomor resinya blom di input sama admin
			$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Masukkan nomor resi!</div>');
		redirect('admin/detailTrans/'.$id);
		}
		$resi=$this->input->post('resi');
		$queryConfirm="UPDATE `bukti` SET `is_processed` = '3' WHERE `bukti`.`id_bukti` = $id";
		$this->db->query($queryConfirm);
		$data['checkout']=$this->db->get_where('checkout',['id_checkout'=>$id])->row_array();

		$this->db->set('no_resi',$resi);//ini query untuk update nomor resi di tabel checkout
		$this->db->where('id_checkout',$data['konfirmasi']['id_checkout']);
		$this->db->update('checkout');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Order diproses!</div>');
		redirect('admin/processedOrder');
	}
//ini fungsi untuk nampilin layer processed order
	public function processedOrder(){
		$data['title']='Order Diproses';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$this->db->order_by('id_bukti','DESC');
		$data['bukti']=$this->db->get_where('bukti',['is_processed'=>3])->result_array();

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/processed_order',$data);
		$this->load->view('templates/admin/footer');
	}

	public function downloadDataHarian(){
		$waktu = date('Y-m-d');
		$query1 = "SELECT * FROM orderan WHERE waktu LIKE '$waktu%'"; //manggi data dari database sesuai hari ini
		$data['download']=$this->db->query($query1)->result_array();
		$data['produk']=$this->db->get('produk')->result_array();
		$this->load->view('admin/downloadData',$data);
	}
//ini fungsi untuk nampilin layer newproduk
	public function newProduk(){
		$data['title']='Produk Terbaru';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
//kodingan ini itu untuk pagination di layer ini, ini codingan bawaan codeigniter jadi gak paham paham amat gapapa, konsep ini berlaku pada semua codingan pagination kek gini
		$config['base_url']= 'http://localhost/cctvku/admin/newProduk';
		$config['total_rows']=$this->db->get_where('produk',['is_new'=>1])->num_rows();
		$config['per_page']=5; // ini artinya per page nya mau nampilin berapa data

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

		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']='</a></li>';

		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';

		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);


		$data['start']=$this->uri->segment(3);
//sampe sini
		$data['produk']=$this->db->get_where('produk',['is_new'=>1],$config['per_page'],$data['start'])->result_array();// yang ini codingan untuk ngambil data dari db sesuai dengan ketentuan dari pagination yg dibuat

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/manageitems/newproduct',$data);
		$this->load->view('templates/admin/footer');
	}
//ini fungsi untuk ngubah produknya jadi produk baru
	public function addNewProduk($id){
		$this->Model->addToNewProduct($id);
		redirect('admin/newProduk');
	}
//ini fungsi untuk ngubah produk jadi bukan produk baru lagi
	public function hapusFromNewProduk($id){
		$this->Model->deleteFromNewProduct($id);
		redirect('admin/newProduk');
	}
//fungsi untuk nampilin layer manage product
	public function manageproduct(){
		$data['title']='Kelola Produk';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

		$config['base_url']= 'http://localhost/cctvku/admin/manageproduct';
		$config['total_rows']=$this->db->get('produk')->num_rows();
		$config['per_page']=5;

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

		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']='</a></li>';

		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';

		$config['attributes']=array('class'=>'page-link');

		$this->pagination->initialize($config);


		$data['start']=$this->uri->segment(3);
		$this->db->order_by('id_produk','DESC');
		$data['produk']=$this->Model->getProduk($config['per_page'],$data['start']);

		$this->form_validation->set_rules('id_produk', 'ID Produk','is_unique|trim');
		$this->form_validation->set_rules('produk', 'Nama Produk','required|trim');
		$this->form_validation->set_rules('harga', 'Harga Produk','required|numeric');
		$this->form_validation->set_rules('berat', 'Berat Produk','required|numeric');
		$this->form_validation->set_rules('stok', 'Stok Produk','required|trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk','required|trim');

		if($this->form_validation->run()==false){
		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/manageitems/manageproduct',$data);
		$this->load->view('templates/admin/footer');
		}else{//percabangan ini digunain untuk nginput produk baru
//ini codingan untuk inputan berupa gambar
			$nama_image = $_FILES['image']['name'];//untuk nyimpen nama dari gambarnya
			$upload_image = str_replace(" ", "_", $nama_image);// nah ini untuk misahin nama gambarnya dari karakter _ dan spasi

			$config['allowed_types']='gif|jpg|png|jpeg|PNG|JPG|GIF|JPEG';
			$config['max_size']		='20000000';
			$config['upload_path']	='./assets/images/cctv/';

			if($upload_image==NULL){
				$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">Tolong masukkan gambar produk!</div>');
				redirect('admin/manageproduct');
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
//nah sampe sini codingan gambarnya
			$data = [
				'id_produk' => $this->input->post('id_produk'),
				'nama' => $this->input->post('produk'),
				'harga' => $this->input->post('harga'),
				'gambar' => $upload_image,
				'deskripsi' => $this->input->post('deskripsi'),
				'berat' => $this->input->post('berat'),
				'stok' => $this->input->post('stok'),
				'is_new'=>1
			]; // data detail dari produk yang bakal dimasukkin ke database

			$this->db->insert('produk',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Produk baru ditambahkan!</div>');
			redirect('admin/manageproduct');
		}
	}
//fungsi untuk nampilin layer edit produk
	public function editProduk($id){
		$data['title']='Edit Produk';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['produk']=$this->Model->getDataProdukById($id);
//ini from validation dipake untuk membuat notif apabila ada form yang gak diinputin atau pengimputannya gak sesuai dengan format yang udah ditentuin, ini berlaku sama semua form validation set rules yang lain
		$this->form_validation->set_rules('id_produk', 'ID Produk');
		$this->form_validation->set_rules('produk', 'Nama Produk','required|trim');
		$this->form_validation->set_rules('harga', 'Harga Produk','required|numeric');
		$this->form_validation->set_rules('berat', 'Berat Produk','required|numeric');
		$this->form_validation->set_rules('stok', 'Stok Produk','required|trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk','required|trim');

		if($this->form_validation->run()==false){// percabangan ini digunain untuk apabila rules yang udah ditentuin diatas dilanggar maka akan ditampilkan lagi layer sebelumnya dan akan menampilkan notif sesuai dengan rules tersebut
		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/manageitems/editproduct',$data);
		$this->load->view('templates/admin/footer');
		}else{

			$nama_image = $_FILES['image']['name'];
			$upload_image = str_replace(" ", "_", $nama_image);

			$config['allowed_types']='gif|jpg|png|jpeg|PNG|JPG|GIF|JPEG';
			$config['max_size']		='200048';
			$config['upload_path']	='./assets/images/cctv/';

			if($nama_image == NULL){//ini percabangan ketika gak ngubah gambar
				$data = [
					'id_produk' => $this->input->post('id_produk'),
					'nama' => $this->input->post('produk'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'berat' => $this->input->post('berat'),
					'stok' => $this->input->post('stok')
				];
				$this->db->where('id_produk',$id);
				$this->db->update('produk',$data);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Produk diperbarui!</div>');
				redirect('admin/manageproduct');
			}else{//ini ketika gambarnya di edit
				$this->load->library('upload',$config);

				if($this->upload->do_upload('image')){
					$old_image = $data['produk']['gambar'];
					if($old_image != 'plain.png'){
					unlink(FCPATH . 'assets/images/cctv/'.$old_image);
				}
					$new_image = $this->upload->data('file_name');
				}else{
					echo $this->upload->display_errors();
				}
				$data = [
					'id_produk' => $this->input->post('id_produk'),
					'nama' => $this->input->post('produk'),
					'harga' => $this->input->post('harga'),
					'gambar' => $upload_image,
					'deskripsi' => $this->input->post('deskripsi'),
					'berat' => $this->input->post('berat'),
					'stok' => $this->input->post('stok')
				];
				$this->db->where('id_produk',$id);
				$this->db->update('produk',$data);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Produk diperbarui!</div>');
				redirect('admin/manageproduct');
			}

		}
	}
//fungsi untuk apus produk
	public function hapusProduk($id){
		$data['produk']=$this->db->get_where('produk',['id_produk'=>$id])->row_array();
		$old_image = $data['produk']['gambar'];
		if($old_image != 'plain.png'){// ini percabangan ketika si gambar yang mau diapus namanya bukan plain.png
			unlink(FCPATH . 'assets/images/cctv/'.$old_image);//ketika terpenuhi maka gambar akan dihapus sesuai dengan path yang sudah sediakan
		}
		$this->Model->hapusProduk($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus produk!</div>');
		redirect('admin/manageproduct');
	}
//fungsi untuk menampilkan halaman detail produk
	public function detailProduk($id){
		$data['title']='Detail Produk';

		$data['user']=$this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();
		$data['produk']=$this->Model->getDataProdukById($id);

		$this->load->view('templates/admin/header',$data);
		$this->load->view('templates/admin/sidebar',$data);
		$this->load->view('templates/admin/topbar',$data);
		$this->load->view('admin/manageitems/detailproduct',$data);
		$this->load->view('templates/admin/footer');
	}


}
