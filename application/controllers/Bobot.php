<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bobot_model");
		$this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["bobot"] = $this->bobot_model->getAll();
        $this->load->view("bobot/edit", $data);
    }

    public function add()
    {
        $bobot = $this->bobot_model;
        $validation = $this->form_validation;
        $validation->set_rules($bobot->rules());
        if ($validation->run()) {
            $bobot->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("bobot/add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('bobot');
       
        $bobot = $this->bobot_model;
        $validation = $this->form_validation;
        $validation->set_rules($bobot->rules());

        if ($validation->run()) {
            $bobot->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["bobot"] = $bobot->getById($id);
        if (!$data["bobot"]) show_404();
        
        $this->load->view("bobot/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->bobot_model->delete($id)) {
            redirect(site_url('bobot'));
        }
    }
}