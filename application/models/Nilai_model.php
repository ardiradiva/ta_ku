<?php defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    private $_table = "nilai";

    public $id_nilai;
    public $id_supplier;
    public $id_users;
    public $tahun;
    public $periode;
    public $rasa;
    public $aroma;
    public $warna;
    public $aksesibilitas;
    public $packaging;
    public $konsistensi;
    public $harga;
    public $fleksibilitas;
    public $garansi;
    public $jarak;
    public $lokasi;
    public $legalitas;
    public $manajerial;
    public $komunikasi;

    public function rules()
    {
        return [
            [
                'field' => 'id_supplier',
                'label' => 'ID Supplier',
                'rules' => 'numeric'
            ],

            [
                'field' => 'id_users',
                'label' => 'ID Users',
                'rules' => 'numeric'
            ],

            [
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'numeric'
            ],

            [
                'field' => 'periode',
                'label' => 'Periode',
                'rules' => 'numeric'
            ],

            [
                'field' => 'rasa',
                'label' => 'Rasa',
                'rules' => 'numeric'
            ],

            [
                'field' => 'aroma',
                'label' => 'Aroma',
                'rules' => 'numeric'
            ],

            [
                'field' => 'warna',
                'label' => 'Warna',
                'rules' => 'numeric'
            ],

            [
                'field' => 'aksesibilitas',
                'label' => 'Aksesibilitas',
                'rules' => 'numeric'
            ],

            [
                'field' => 'pacakaging',
                'label' => 'Packaging',
                'rules' => 'numeric'
            ],

            [
                'field' => 'konsistensi',
                'label' => 'Konsistensi',
                'rules' => 'numeric'
            ],

            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'numeric'
            ],

            [
                'field' => 'fleksibilitas',
                'label' => 'Fleksibilitas',
                'rules' => 'numeric'
            ],

            [
                'field' => 'garansi',
                'label' => 'Garansi',
                'rules' => 'numeric'
            ],

            [
                'field' => 'jarak',
                'label' => 'Jarak',
                'rules' => 'numeric'
            ],

            [
                'field' => 'lokasi',
                'label' => 'Lokasi',
                'rules' => 'numeric'
            ],

            [
                'field' => 'legalitas',
                'label' => 'Legalitas',
                'rules' => 'numeric'
            ],

            [
                'field' => 'manajerial',
                'label' => 'Manajerial',
                'rules' => 'numeric'
            ],

            [
                'field' => 'komunikasi',
                'label' => 'Komunikasi',
                'rules' => 'numeric'
            ]

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function Tambah_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    function get_nilai_list($limit, $start, $tahun = null, $periode = null)
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->join('nilai', 'nilai.id_supplier = supplier.id_supplier', 'inner');
        $this->db->limit($limit, $start);
        if ($tahun) {
            $this->db->where('tahun', $tahun);
        }
        if ($periode) {
            $this->db->where('periode', $periode);
        }
        return $this->db->get()->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_nilai" => $id])->row();
    }
    public function getByTahunPeriode($th, $pr)
    {
        return $this->db->get_where($this->_table, ["tahun" => $th, "periode" => $pr])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        //$this->nilai = $this->db->from("nilai")->count_all_results()+1;
        $this->id_nilai = mt_rand(1000, 9999);
        $this->id_supplier = $post["id_supplier"];
        $this->id_users = $post["id_users"];
        $this->tahun = $post["tahun"];
        $this->periode = $post["periode"];
        $this->rasa = $post["rasa"];
        $this->aroma = $post["aroma"];
        $this->warna = $post["warna"];
        $this->aksesibilitas = $post["aksesibilitas"];
        $this->packaging = $post["packaging"];
        $this->konsistensi = $post["konsistensi"];
        $this->harga = $post["harga"];
        $this->fleksibilitas = $post["fleksibilitas"];
        $this->garansi = $post["garansi"];
        $this->jarak = $post["jarak"];
        $this->lokasi = $post["lokasi"];
        $this->legalitas = $post["legalitas"];
        $this->manajerial = $post["manajerial"];
        $this->komunikasi = $post["komunikasi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_nilai = $post["id"];
        $this->id_users = $post["id_users"];
        $this->tahun = $post["tahun"];
        $this->periode = $post["periode"];
        $this->id_supplier = $post["id_supplier"];
        $this->rasa = $post["rasa"];
        $this->aroma = $post["aroma"];
        $this->warna = $post["warna"];
        $this->aksesibilitas = $post["aksesibilitas"];
        $this->packaging = $post["packaging"];
        $this->konsistensi = $post["konsistensi"];
        $this->harga = $post["harga"];
        $this->fleksibilitas = $post["fleksibilitas"];
        $this->garansi = $post["garansi"];
        $this->jarak = $post["jarak"];
        $this->lokasi = $post["lokasi"];
        $this->legalitas = $post["legalitas"];
        $this->manajerial = $post["manajerial"];
        $this->komunikasi = $post["komunikasi"];
        $this->status = 1;
        //INSERT INTO subs
        //////////
        // $qr = $this->db->query("SELECT * FROM nilai where id_supplier='" . $this->id_supplier . "' and tahun='" . $this->tahun . "' and periode='" . $this->periode . "'");
        // //echo $query->num_rows();
        // if ($qr->num_rows() > 0) {
        return $this->db->update($this->_table, $this, array('id_nilai' => $post['id']));
        // } else {
        //     $this->id_nilai = mt_rand(1000, 9999);
        //     return $this->db->insert($this->_table, $this);
        // }
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_nilai" => $id));
    }
    function join2table()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->join('nilai', 'nilai.id_supplier = supplier.id_supplier');
        $query = $this->db->get();
        return $query;
    }
    public function UpdateStatus($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function edit_data($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
}
