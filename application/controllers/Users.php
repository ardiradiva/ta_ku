<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
		if($this->input->get('keyword')){
			$data['keyword'] = $this->input->get('keyword');
			$this->load->model('users_model');
			$data['users'] = $this->users_model->search($data['keyword']);
			$this->load->view('users/list', $data);
		}
		else{
			$data["users"] = $this->users_model->getAll();
			$this->load->view("users/list", $data);
		}
    }

    public function add()
    {
        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());
		$validation->set_rules('nama','nama','required|min_length[5]|max_length[25]|is_unique[users.nama]');
		$validation->set_rules('username','username','required|min_length[5]|max_length[25]|is_unique[users.username]');

        if ($validation->run()) {
            $users->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("users/add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('users');

        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["users"] = $users->getById($id);
        if (!$data["users"]) show_404();

        $this->load->view("users/edit", $data);
    }


    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->users_model->delete($id)) {
            redirect(site_url('users'));
        }
    }
}
