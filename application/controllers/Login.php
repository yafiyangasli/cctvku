<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
//fungsi untuk nampilin halaman awal login
	public function index()
	{
		$data['active']='LOGIN';
		$this->form_validation->set_rules('id','Username or Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		if($this->form_validation->run()==false){
		$data['title']='Login ';

		$this->load->view('templates/header',$data);
		$this->load->view('login/index',$data);
		$this->load->view('templates/footer');
		}else{
			$this->login();
		}
	}
//fungsi untuk proses login
	public function login(){
		$id=$this->input->post('id');
		$password=$this->input->post('password');

		$user=$this->db->get_where('user',['username'=>$id])->row_array();
		$email=$this->db->get_where('user',['email'=>$id])->row_array();
		//apabila user tersedia maka akan di set userdata sesuai dengan data yang ada di database, role id 1 akan masuk sebagai admin dan role id 2 sebagai user
		if($user){//login dengan username
				if(password_verify($password, $user['password'])){//password yang dimasukkin bakal di hash dulu baru disusesuain sama di db
					$data=[
						'username'=>$user['username'],
						'nama'=>$user['nama'],
						'role_id'=>$user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id']==1){
						redirect('admin');
					}else{
					redirect('home');
				}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('login');
				}
		}if($email){//login dengan email
				if(password_verify($password, $email['password'])){
					$data=[
						'username'=>$email['username'],
						'nama'=>$email['nama'],
						'role_id'=>$email['role_id']
					];
					$this->session->set_userdata($data);
					if($email['role_id']==1){
						redirect('admin');
					}else{
					redirect('home');
				}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('login');
				}
		}else{//kalo id/pass salah bakal nampilin message
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username or Email is not registered!</div>');
			redirect('login');
		}
	}
//fungsi untuk logout, logout dengan unset userdata yang udah disimpen tadi
	public function logout(){
		$this->session->unset_userdata('username');
		redirect('home');
	}
//fungsi untuk halaman register
	public function register(){
		$data['active']='LOGIN';

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
			'is_unique' => 'This username has already registered!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered!']
		);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]',[
			'min_length'=>'Password to short'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',['matches'=>'Password dont match']);

		if($this->form_validation->run()==false){
		$data['title']='Registration ';
		$this->load->view('templates/header',$data);
		$this->load->view('login/register');
		$this->load->view('templates/footer');
		}else{
			$data=[
				'username'=>htmlspecialchars($this->input->post('username',true)),//html special chars ini biasanya digunakan untuk atribut dengan prioritas tinggi
				'email'=>htmlspecialchars($this->input->post('email',true)),
				'password'=>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),//password yang diinputin bakal di enkripsi dengan metode hashing baru dimasukkin ke db
				'role_id'=>2
			];
			
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-light" role="alert">Your registration was successful</div>');
			redirect('login');			
		}	
	}
}
