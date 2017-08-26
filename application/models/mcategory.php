<?php
class mcategory extends CI_Model{
    protected $_table='category';
    public function __construct(){
        parent::__construct();
    }
    public function listAll(){
        $this->db->select('*');
        $this->db->order_by('sort');
        $this->db->order_by('id','asc');
        return $this->db->get($this->_table)->result_array();
    }

    public function add($data){
        $this->db->insert($this->_table,$data);
    }

    public function del($id){
        $this->db->where('id',$id);
        $this->db->delete($this->_table);
    }
    public function numRows(){
        return $this->db->get($this->_table)->num_rows();
    }
    public function getById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function getByLink($link){
        $this->db->where("link",$link);
        return $this->db->get($this->_table)->row_array();
    }

    public function editById($id,$data){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data);
    }


}