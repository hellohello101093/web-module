<?php
class driver extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->_data['now'] = 'Tài Xế';
        $this->load->model('mdriver');
        $user_type_allows = array('administrator', 'manager');
        $user = $this->session->userdata('user');
        if(!$user || !in_array($user['user_type'], $user_type_allows)){
          redirect(base_url()."quanly");
        }
        $this->form_validation->CI =& $this;
    }
    public function listall(){
        if(!isset($_GET['per_page'])){
            $start = 0 ;
        }else{
            $start=$_GET['per_page'];
        }
        if(!isset($_GET['s'])){
            $s = '' ;
        }else{
            $s=$_GET['s'];
        }
        $this->_data['s'] = $s;
        $this->load->library('pagination');
        $config['base_url'] = base_url().'quanly/driver/listall?s='.$s;
        //config phân trang
        $config['total_rows'] = $this->mdriver->numRows($s);
        $config['per_page'] =15;
        $config['uri_segment'] = 4;
        $config['cur_tag_open'] = "<li><a><font color='black'>";
        $config['cur_tag_close'] = '</font></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $this->_data['pagination']=$this->pagination->create_links();
        $this->_data['template'] = 'quanly/driver/list_view';
        $this->_data['info'] = $this->mdriver->listAll($config['per_page'],$start,$s);
        $this->load->view("layout/quanly",$this->_data);
    }
    
    public function add(){
        $this->_data['action'] = strtolower(__FUNCTION__);
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules("code","Mã Bằng Lái","callback_check_code");
            if($this->form_validation->run()==TRUE){
                $arr = array(
                    'name' => $this->input->post('name'),
                    'code' => $this->input->post('code'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'created' => time(),
                );
                $this->mdriver->add($arr);
                $this->session->set_flashdata('ses_flash',"Thêm");
                redirect(base_url()."quanly/driver/listall");
            }
            $arr = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
            );
            $this->_data['info'] = $arr;
        }
        $this->_data['template'] = 'quanly/driver/modify_view';
        $this->_data['title'] = 'Trang Thêm  ';
        $this->load->view("layout/quanly",$this->_data);
    }
    
    public function check_code($code){
        if($this->mdriver->checkCode($code)==false){
            $this->form_validation->set_message("check_code","Mã bằng lái đã được sử dụng .");
            return false;
        }else{
            return true;
        }
    }
    public function del($id){
        $this->mdriver->del($id);
        $this->session->set_flashdata('ses_flash',"Xóa");
        redirect(base_url()."quanly/driver/listall");
    }
    public function dellist(){
        foreach($_POST['del'] as $id){
            $this->mdriver->del($id);
        }
        $this->session->set_flashdata('ses_flash',"Xóa");
        redirect(base_url()."quanly/driver/listall");
    }

    public function edit($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
        $this->_data['info'] = $this->mdriver->getById($id);
        $info = $this->_data['info'];
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules("name","Tên","required");
            if($info['code']!= $this->input->post('code')){
                $this->form_validation->set_rules("code","Mã Bằng Lái","callback_check_code");
            }
            if($this->form_validation->run()==TRUE){
                $arr = array(
                    'name' => $this->input->post('name'),
                    'code' => $this->input->post('code'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                );
                $this->mdriver->editById($id,$arr);
                $this->session->set_flashdata('ses_flash',"Sửa");
                redirect(base_url()."quanly/driver/listall");
            }
        }
        $this->_data['template'] = 'quanly/driver/modify_view';
        $this->_data['title'] = 'Trang Sửa User ';
        $this->load->view("layout/quanly",$this->_data);

    }
}