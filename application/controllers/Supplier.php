<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("supplier_model");
        $this->load->model("nilai_model");
        $this->load->model("bobot_model");
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('supplier/index'); //site url
        $config['total_rows'] = $this->db->count_all('supplier'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();

        if ($this->input->get('keyword')) {
            $data['keyword'] = $this->input->get('keyword');
            /////////

            /////////

            $this->load->model('supplier_model');
            $data['supplier'] = $this->supplier_model->search($data['keyword']);
            $this->load->view('supplier/list', $data);
        } else {
            $data['supplier'] = $this->supplier_model->get_supplier_list($config["per_page"], $data['page']);
            $data['nilai_supplier'] = $this->supplier_model->join2table()->result();
            $this->load->view('supplier/list', $data);
        }
    }

    public function add()
    {
        # code...
        $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[supplier.nama]');
        $this->form_validation->set_rules('hp', 'hp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');


        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan!');
        if($this->form_validation->run()){
            $data_sup = $this->db->get('supplier')->result_array();
            if ($data_sup == null) {
                $id = 'SP000001';
            } else {
                $id_code = null;
                foreach ($data_sup as $rkm) {
                    $code =  substr($rkm['id_supplier'], 2);
                    if ($id_code == null) {
        
                        $id_code = $code;
                    } else {
                        if ($code > $id_code) {
                            $id_code = $code;
                        }
                    }
                }
                $id = 'SP' . str_pad($id_code + 1, 6, '0', STR_PAD_LEFT);
            }
            // $id = rand(0000,9999);
            $data = array(
                'id_supplier'=>$id,
                'id_admin'=>$this->input->post('id_admin'),
                'nama'=>$this->input->post('nama'),
                'alamat'=>$this->input->post('alamat'),
                'hp'=>$this->input->post('hp'),
            );
            $masuk = $this->Admin_model->Tambah_data($data,'supplier');
            if($masuk){
                $month = date('m');
                if($month <=6){
                    $periode = 1;
                }elseif($month >= 7){
                    $periode = 2;
                }
                $data_nilai = $this->db->get('nilai')->result_array();
            if ($data_nilai == null) {
                $id_nilai = 'NI000001';
            } else {
                $id_code_nilai = null;
                foreach ($data_nilai as $ni) {
                    $ni_code =  substr($ni['id_nilai'], 2);
                    if ($id_code_nilai == null) {
        
                        $id_code_nilai = $ni_code;
                    } else {
                        if ($ni_code > $id_code_nilai) {
                            $id_code_nilai = $ni_code;
                        }
                    }
                }
                $id_nilai = 'NI' . str_pad($id_code_nilai + 1, 6, '0', STR_PAD_LEFT);
            }
                // $id_nilai = rand(0000,9999);
                $data_nilai = array(
                    'id_nilai'=>$id_nilai,
                    'id_supplier'=>$id,
                    'tahun'=>date('Y'),
                    'periode'=>$periode
                );
                $this->Admin_model->Tambah_data($data_nilai,'nilai');
            }
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('supplier/add');


        }else{
            $this->load->view("supplier/add");

        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('supplier');

        $supplier = $this->supplier_model;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["supplier"] = $supplier->getById($id);
        if (!$data["supplier"]) show_404();

        $this->load->view("supplier/edit", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->supplier_model->delete($id)) {
            redirect(site_url('supplier'));
        }
    }
}
