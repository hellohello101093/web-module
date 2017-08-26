<?php
class Index extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = $this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='home';
        $this->_data['slider_box'] = 'slider/slider_index';    
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('components/header',$this->_data);
                $this->load->view('index',$this->_data);
                $this->load->view('components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/index');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function follow() {
        $this->load->helper('email');
        $email = $_POST['email'];
        if (valid_email($email)) {
           $arr = array(
                'genre' => 'male',
                'email' => $email
            );
            $this->mfollow->add($arr);
            echo 'Đăng ký nhận thông tin thành công';   
        } else {
            echo 'Email sai định dạng';
        }
    }
 }