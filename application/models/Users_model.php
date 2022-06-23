<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table = "users";

    public $id_users;
    public $nama;
    public $username;
    public $password;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->order_by('username', 'ASC');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_users" => $id])->row();
    }

    public function save()
    { $data = $this->db->get('users')->result_array();
        
        if ($data == null) {
        $id = 'US000001';
    } else {
        $id_code = null;
        foreach ($data as $rkm) {
            $code =  substr($rkm['id_users'], 2);
            if ($id_code == null) {

                $id_code = $code;
            } else {
                if ($code > $id_code) {
                    $id_code = $code;
                }
            }
        }
        $id = 'US' . str_pad($id_code + 1, 6, '0', STR_PAD_LEFT);
    }

        $post = $this->input->post();
        //$this->id_users = $this->db->from("users")->count_all_results()+1;
        $this->id_users = $id;
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = md5($post["password"]);
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_users = $post["id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        if ($post["password"]) {
            $this->password = md5($post["password"]);
        }
        return $this->db->update($this->_table, $this, array('id_users' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_users" => $id));
    }
	public function search($keyword)
	{
		if(!$keyword){return null;}
		$this->db->like('nama', $keyword);
		$this->db->or_like('username', $keyword);
		$query = $this->db->get($this->_table);
		return $query->result();
	}

}
