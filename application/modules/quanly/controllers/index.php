<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends MY_Controller {

	public function __construct(){

		parent::__construct();
        $this->_data['now'] = '';
        $user_type_allows = array('administrator', 'manager','staff', 'member');
        $user = $this->session->userdata('user');
        if(!$user || !in_array($user['user_type'], $user_type_allows)){
          redirect(base_url()."quanly/login");
        }
        $this->form_validation->CI =& $this;
	}

	public function index() { 
        $user = $this->session->userdata('user');
        if($user['user_type'] === 'administrator' || $user['user_type'] === 'manager') {
            $this->_data['template'] = 'quanly/home/home_manager';   
        } else if ($user['user_type'] === 'staff') {
            $this->_data['template'] = 'quanly/home/home_staff';
        } else if ($user['user_type'] === 'member') {
            $this->_data['template'] = 'quanly/home/home_member';
        }
		$this->_data['title'] = 'Trang Quản Trị';
		$this->load->view("layout/quanly",$this->_data);

	}
}

