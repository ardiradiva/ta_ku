<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->bobot_model->delete($id)) {
            redirect(site_url('bobot'));
        }
    }
    public function updateBobot()
    {
        # code...
        $data_update = array(
            'rasa' => $this->input->post('rasa'),
            'aroma' => $this->input->post('aroma'),
            'warna' => $this->input->post('warna'),
            'aksesibilitas' => $this->input->post('aksesibilitas'),
            'packaging' => $this->input->post('packaging'),
            'konsistensi' => $this->input->post('konsistensi'),
            'harga' => $this->input->post('harga'),
            'fleksibilitas' => $this->input->post('fleksibilitas'),
            'garansi' => $this->input->post('garansi'),
            'jarak' => $this->input->post('jarak'),
            'lokasi' => $this->input->post('lokasi'),
            'legalitas' => $this->input->post('legalitas'),
            'manajerial' => $this->input->post('manajerial'),
            'komunikasi' => $this->input->post('komunikasi'),
            'id_admin' => $this->input->post('id_admin')


        );
        $where = array(
            'id_bobot' => $this->input->post('id')
        );

        $this->bobot_model->edit_data($where, $data_update, 'bobot');
        redirect('bobot/edit/' . $this->input->post('id'));
    }
}
