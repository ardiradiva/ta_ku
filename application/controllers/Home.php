<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("kejahatan_model");
    }
	function index(){
		$data["kejahatan"] = $this->kejahatan_model->getAll();
		$this->load->view('home',$data);
	}
}
