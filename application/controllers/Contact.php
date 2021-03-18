<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}

	public function index(){

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',
			['required' => 'Tolong masukkan email anda!', 'valid_email' => 'Tolong masukkan email yang valid!']
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Tolong masukkan nama anda!']);
		$this->form_validation->set_rules('subjek', 'Subjek', 'required|trim', ['required' => 'Tolong subjek email anda!']);
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', ['required' => 'Tolong pesan anda!']);

		if ($this->form_validation->run()==false) {
			$data['active']='Contact';
			$this->load->view('templates/header',$data);
			$this->load->view('contact/index',$data);
			$this->load->view('templates/footer');
		}else{
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$subjek = $this->input->post('subjek');
			$pesan = $this->input->post('pesan');

			$response = false;
            $mail = new PHPMailer();
                   
            
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host     = 'tls://smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
            $mail->SMTPAuth = true;
            $mail->Username = 'adinayacctv@gmail.com'; // user email
            $mail->Password = 'adinaya1234'; // password email
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 587;
            
            //$mail->From = $email; //email pengirim
			//$mail->FromName = $nama; //nama pengirim

			$mail->setFrom($email, 'User Help Adinaya CCTV'); // user email
			$mail->addReplyTo($email, $nama); //user email
            
                    // Add a recipient
            $mail->addAddress('adinayacctv@gmail.com'); //email tujuan pengiriman email
            
                    // Email subject
            $mail->Subject = $subjek; //subject email
            
                    // Set email format to HTML
            $mail->isHTML(true);
            
                    // Email body content
            $mailContent = '<p>'.$pesan.'</p>'; // isi email
            $mail->Body = $mailContent;
            
                    // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
	            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Email anda sudah terkirim!<br>Email balasan dari kami akan dikirim ke email anda.</div>');
				echo "<script>window.location.assign('contact')</script>";
            }

		}
	}

}