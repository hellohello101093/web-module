<?php
class verhicle extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->_data['now'] = 'Xe';
        $this->load->model('mverhicle');
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
        $config['base_url'] = base_url().'quanly/verhicle/listall?s='.$s;
        //config phân trang
        $config['total_rows'] = $this->mverhicle->numRows($s);
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
        $this->_data['template'] = 'quanly/verhicle/list_view';
        $this->_data['info'] = $this->mverhicle->listAll($config['per_page'],$start,$s);
        $this->load->view("layout/quanly",$this->_data);
    }
    
    public function add(){
        $this->_data['action'] = strtolower(__FUNCTION__);
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules("verhicle_number","Số Xe","callback_check_code");
            if($this->form_validation->run()==TRUE){
                $arr = array(
                    'driver_id' => $this->input->post('driver_id'),
                    'verhicle_number' => $this->input->post('verhicle_number'),
                    'rmoc_number' => $this->input->post('rmoc_number'),
                    'created' => time(),
                );
                $this->mverhicle->add($arr);
                $this->session->set_flashdata('ses_flash',"Thêm");
                redirect(base_url()."quanly/verhicle/listall");
            }
            $arr = array(
                'driver_id' => $this->input->post('driver_id'),
                'verhicle_number' => $this->input->post('verhicle_number'),
                'rmoc_number' => $this->input->post('rmoc_number'),
            );
            $this->_data['info'] = $arr;
        }
        $this->_data['template'] = 'quanly/verhicle/modify_view';
        $this->_data['title'] = 'Trang Thêm  ';
        $this->load->view("layout/quanly",$this->_data);
    }
    
    public function check_code($code){
        if($this->mverhicle->checkCode($code)==false){
            $this->form_validation->set_message("check_code","Số Xe đã được sử dụng .");
            return false;
        }else{
            return true;
        }
    }
    public function del($id){
        $this->mverhicle->del($id);
        $this->session->set_flashdata('ses_flash',"Xóa");
        redirect(base_url()."quanly/verhicle/listall");
    }
    public function dellist(){
        foreach($_POST['del'] as $id){
            $this->mverhicle->del($id);
        }
        $this->session->set_flashdata('ses_flash',"Xóa");
        redirect(base_url()."quanly/verhicle/listall");
    }

    public function edit($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
        $this->_data['info'] = $this->mverhicle->getById($id);
        $info = $this->_data['info'];
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules("name","Tên","required");
            if($info['code']!= $this->input->post('code')){
                $this->form_validation->set_rules("verhicle_number","Số Xe","callback_check_code");
            }
            if($this->form_validation->run()==TRUE){
                $arr = array(
                    'driver_id' => $this->input->post('driver_id'),
                    'verhicle_number' => $this->input->post('verhicle_number'),
                    'rmoc_number' => $this->input->post('rmoc_number'),
                );
                $this->mverhicle->editById($id,$arr);
                $this->session->set_flashdata('ses_flash',"Sửa");
                redirect(base_url()."quanly/verhicle/listall");
            }
        }
        $this->_data['template'] = 'quanly/verhicle/modify_view';
        $this->_data['title'] = 'Trang Sửa User ';
        $this->load->view("layout/quanly",$this->_data);

    }
}