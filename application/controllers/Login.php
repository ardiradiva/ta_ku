<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}
	function index(){
		$this->load->view('login');
	}
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array('username' => $username,'password' => md5($password));
		$cek = $this->login_model->cek_login("users",$where)->num_rows();
		// echo json_encode($cek);
		// exit;
		$datalogin = $this->login_model->cek_login("users",$where);
		if($cek > 0){
		
			$row = $datalogin->row();
			
			$data_session = array('nama' => $username,'level' => $username,'status' => 'login','id_users'=>$row->id_users);
			$this->session->set_userdata($data_session);
			redirect(base_url("dashboard"));
		}
		else{
			$cek = $this->login_model->cek_login("admin",$where)->num_rows();
			$datalogin = $this->login_model->cek_login("admin",$where);
			if($cek > 0){
				$row = $datalogin->row();
				$data_session = array('nama' => $username,'level' => $username,'status' => 'login','id_admin'=>$row->id_admin);
				$this->session->set_userdata($data_session);
				redirect(base_url("dashboard"));
			}
			else{
				echo "<script>alert('Username dan password salah !');self.location='".base_url("login")."'</script>";
			}
			//echo "<script>alert('Username dan password salah !');self.location='".base_url("login")."'</script>";
		}
		
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}