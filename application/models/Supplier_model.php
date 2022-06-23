<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    private $_table = "supplier";

    public $id_supplier;
    public $nama;
    public $alamat;
    public $hp;
	public $id_admin;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'hp',
            'label' => 'HP',
            'rules' => 'required'],
            
            ['field' => 'id_admin',
            'label' => 'ID Admin',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
	function get_supplier_list($limit, $start){
        $this->db->order_by('nama', 'ASC');
        return $this->db->get($this->_table, $limit, $start)->result();
    }
	
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_supplier" => $id])->row();
    }

    public function save()
    {

        $post = $this->input->post();
        //$this->id_supplier = $this->db->from("supplier")->count_all_results()+1;
		$this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
		$this->hp = $post["hp"];
		$this->id_admin = $post["id_admin"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_supplier = $post["id"];
		$this->id_admin = $post["id_admin"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
		$this->hp = $post["hp"];
		
        return $this->db->update($this->_table, $this, array('id_supplier' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_supplier" => $id));
    }
	function join2table(){
      $this->db->select('*');
      $this->db->from('supplier');
      $this->db->join('nilai','supplier.id_supplier = nilai.id_supplier');      
      $query = $this->db->get();
      return $query;
   }
   public function search($keyword)
	{
		if(!$keyword){return null;}
		$this->db->like('nama', $keyword);
		$this->db->or_like('alamat', $keyword);
		$query = $this->db->get($this->_table);
		return $query->result();
	}
}