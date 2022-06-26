<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bobot_model extends CI_Model
{
    private $_table = "bobot";

    public $id_bobot;
    public $id_admin;
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
                'field' => 'id_admin',
                'label' => 'ID Admin',
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

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bobot" => $id])->row();
    }

    public function save()
    {
        $data = $this->db->get('bobot')->result_array();
        if ($data == null) {
            $id = 'BT000001';
        } else {
            $id_code = null;
            foreach ($data as $rkm) {
                $code =  substr($rkm['id_bobot'], 2);
                if ($id_code == null) {

                    $id_code = $code;
                } else {
                    if ($code > $id_code) {
                        $id_code = $code;
                    }
                }
            }
            $id = 'BT' . str_pad($id_code + 1, 6, '0', STR_PAD_LEFT);
        }

        $post = $this->input->post();
        $this->id_bobot = $id;
        $this->bobot = $this->db->from("bobot")->count_all_results() + 1;
        $this->id_admin = $post["id_admin"];
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
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {

        $post = $this->input->post();

        // $this->id_bobot = $post["id"];
        $id = $this->input->post('id');
        $this->id_bobot = $id;
        $this->id_admin = $post["id_admin"];
        $this->rasa = $post["rasa"];
        var_dump($post['rasa']);
        die;
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
        $this->db->where('id_bobot', $id);
        return $this->db->update($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_bobot" => $id));
    }
    public function edit_data($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
}
