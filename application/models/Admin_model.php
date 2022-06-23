<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $_table = "admin";

    public $id_admin;
    public $nama;
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username'],
            
            ['field' => 'password',
            'label' => 'Password']			
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_admin" => $id])->row();
    }

    public function save()
    {

        $post = $this->input->post();
        $this->id_admin = $this->db->from("admin")->count_all_results()+1;
		$this->nama = $post["nama"];
        $this->username = $post["username"];
		$this->password = $post["password"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_admin = $post["id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
		$this->password = $post["password"];
        return $this->db->update($this->_table, $this, array('id_admin' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_admin" => $id));
    }
    public function Tambah_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }
}