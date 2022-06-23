<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("nilai_model");
		$this->load->model("supplier_model");
		$this->load->model("bobot_model");
	}
	function index()
	{
		$data["supplier"] = $this->supplier_model->getAll();
		/*
		if(isset($post["tahun"])&&isset($post["periode"])){
			$tahun=$this->input->post('tahun');
			$periode=$this->input->post('periode');
			$data["nilai"] = $this->nilai_model->getByTahunPeriode($tahun,$periode);
		}else{
			$data["nilai"] = $this->nilai_model->getAll();
		}
		*/
		$data["nilai"] = $this->nilai_model->getAll();
		$data["bobot"] = $this->bobot_model->getAll();
		$data['nilai_supplier'] = $this->supplier_model->join2table()->result();
		$this->load->view('wp', $data);
	}

	public function cetak_hasil_rekomendasi($tahun, $periode)
	{
		$this->load->library('dompdf_gen');

		$data['ttahun'] = $tahun;
		$data['tperiode'] = $periode;
		$data["supplier"] = $this->supplier_model->getAll();
		$data["nilai"] = $this->nilai_model->getAll();
		$data["bobot"] = $this->bobot_model->getAll();
		$data['nilai_supplier'] = $this->supplier_model->join2table()->result();
		$this->load->view('cetak_hasil_rekomendasi', $data);

		$paper_size 	= 'A4';
		$orientation 	= 'landscape';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Cetak_hasil_rekomendasi.pdf", array('Attachment' => 0));
	}
}
