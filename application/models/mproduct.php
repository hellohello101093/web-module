<?php
class mproduct extends CI_Model{
    protected $_table='products';
    public function __construct(){
        parent::__construct();
    }
    
    public function listAll($limit,$start,$s=''){
        $this->db->select('products.*');
        $this->db->like('products.name',$s);
        $this->db->or_like('products.code',$s);
        $this->db->limit($limit,$start);
        $this->db->order_by('products.created','desc');
        return $this->db->get($this->_table)->result_array();
    }
    
    public function getAll(){
        $this->db->select('products.*');
        return $this->db->get($this->_table)->result_array();
    }
    public function add($data){
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }

    public function del($id){
        $this->db->where('id',$id);
        $this->db->delete($this->_table);
    }
    public function numRows($s=''){
        $this->db->select('products.*');
        $this->db->like('products.name',$s);
        $this->db->or_like('products.code',$s);
        return $this->db->get($this->_table)->num_rows();
    }
    public function getById($id){
        $this->db->where("products.id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function getByCode($code){
        $this->db->where("products.code",$code);
        return $this->db->get($this->_table)->row_array();
    }
    public function editById($id,$data){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data);
    }
    // function kiểm tra tồn tại user
    public function checkCode($code){
        $this->db->where("code",$code);
        if($this->db->get($this->_table)->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }
    public function getReport($start, $end) {
        $this->db->where('created >= ', $start);
        $this->db->where('created <= ', $end);
        $this->db->order_by('created','desc');
        return $this->db->get($this->_table)->result_array();
    }
}