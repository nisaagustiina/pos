<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index(){
		check_already_login();
		$this->load->view('login');
	}

	public function proses(){
		$post = $this->input->post(null,TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
			$query = $this->user_m->login($post); ?>
			<link rel="stylesheet" href="<?= base_url()?>assets/bower_components/sweetalert2/sweetalert2.min.css">
			<script src="<?= base_url()?>assets/bower_components/sweetalert2/sweetalert2.min.js"></script>
			<style>
				body{
					font-family: "Helvetica Neue", Helvetica,Arial,sans-serif;
					font-size: 1.124em;
					font-weight: normal;
				}
			</style>
			<?php
			if($query->num_rows()>0){
				$row = $query->row();

				$params = array(
					'id_user' => $row->id_user,
					'level' => $row->level
				);
				$this->session->set_userdata($params); ?>
				 
				<body></body>
				<script>
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Login berhasil'
					}).then((result)=>{
						window.location='<?=site_url('dashboard')?>';
					})
				</script>
			<?php
			}else{ ?>
				<body></body>
				<script>
					Swal.fire({
						icon: 'error',
						title: 'Failure',
						text: 'Login Gagal, Username/Password Salah'
					}).then((result)=>{
						window.location='<?=site_url('auth')?>';
					})
				</script>
			<?php
			}
		}
	}

	public function logout(){
		$params = array('id_user','level');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}

