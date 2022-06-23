<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("supplier_model");
		$this->load->model("users_model");
		$this->load->model("nilai_model");
		$this->load->model("admin_model");
		$this->load->model("bobot_model");
		
    }
	function index(){
		$data["users"] = $this->users_model->getAll();
		$data["supplier"] = $this->supplier_model->getAll();
		$data["bobot"] = $this->bobot_model->getAll();
		$data["admin"] = $this->admin_model->getAll();
		$this->load->view('dashboard',$data);
	}
}
