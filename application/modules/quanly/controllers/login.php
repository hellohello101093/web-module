<?php
class Login extends MY_Controller
{
    var $data;
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        try {
            $user = $this->session->userdata('user');
            $user_type_allows = array('administrator', 'manager','staff', 'member');
            if(in_array($user['user_type'], $user_type_allows)){
                redirect(base_url().'quanly');
            }
            $input = $this->input->post();
            if(empty($input)){
                $this->data['url'] = $this->input->get('url');
                $this->load->view(strtolower(__CLASS__).'/login',$this->_data);
            } else {
                $this->form_validation->set_rules('username', 'Tên tài khoản', 'required|trim');
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|callback_validate_login['
                    .$input['username'].']');
                if($this->form_validation->run()== FALSE){
                    $this->session->set_flashdata('ses_getpass','Tên đăng nhập hoặc mật khẩu sai');
                    redirect(base_url().'quanly/login');
                } else {
                    $user = $this->muser->getUserByUserName2($input['username']);
                    $this->session->set_userdata('user',$user);
                    $_SESSION['ckfinder_admin'] = $user ;
                    if(in_array($user['user_type'], $user_type_allows)) {
                        redirect(base_url().'quanly/');
                    }else{
                        redirect(base_url());
                    }

                }
            }
        } catch (Exception $e) {
            echo $e->getMessage(); die();
        }
    }
    function validate_login($pwd,$uid){
        $this->load->model('muser');
        $user = $this->muser->checkLogin($uid,$pwd);
        if(!empty($user)){
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_login', 'Tài Khoản hoặc mật khẩu sai');
            return FALSE;
        }
    }
    function logout()
    {
        session_unset();
        if($this->session->userdata('user'))
        {
            $this->session->unset_userdata('user');
            redirect(base_url().'quanly/login');
        } else {
            redirect(base_url().'quanly/login');
        }
    }
}