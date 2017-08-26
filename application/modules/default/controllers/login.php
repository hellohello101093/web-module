<?php
class Login extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Đăng nhập - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Đăng nhập - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Đăng nhập - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='home';
        $this->_data['slider_box'] = 'slider/slider_other';
        $this->load->view('desktop/components/header',$this->_data);
        $this->load->view('login/index',$this->_data);
        $this->load->view('desktop/components/footer');
	}
    
    public function validate(){
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $user = $this->muser->checkLogin($user_name, $password);
        if(count($user) != 0) {
            $userData = array(
                'user_id' => $user['user_id'],
                'name' => $user['name'],
                'user_email' => $user['user_email'],
                'user_name' => $user['user_name'],
                'user_phone' => $user['user_phone'],
                'user_address' => $user['user_address'],
                'loggedIn' => true
            );
            $this->session->set_userdata($userData);
            $this->session->set_userdata('user',$user);
            redirect(base_url().'quanly');
        } else {
            $this->session->set_flashdata('response','Tài khoản hoặc mật khẩu không đúng');
            redirect(base_url().'dang-nhap');
        }
    }
    
    public function facebook(){
		$user = $this->facebook->getUser();
        if ($user) {
            $user_fb = $this->facebook->api('/me/');
            if(count($this->muser->getUserByIdOther($user_fb['id']))==0){
                $data = array(
                    'id_other'=>$user_fb['id'],
                    'name'=> $user_fb['name']
                );
                $this->muser->addUser($data);   
            }
            $user = $this->muser->getUserByIdOther($user_fb['id']);
            $wishList = array();
            $newdata = array(
                'user_id' => $user['user_id'],
                'name' => $user_fb['name'],
                'user_email' => $user['user_email'],
                'user_address' => $user['user_address'],
                'loggedIn' => true,
                'wishList' => $wishList
            );
            $this->session->set_userdata($newdata);
            redirect();
        }
        else{
            redirect($this->facebook->getLoginUrl());
        }
        // $this->session->set_flashdata('response','This function is updating...');
        // redirect(base_url().'sign-in');

    }
    
    public function signup(){
        if(isset($_POST['signup'])) {
            $user_name = $this->input->post('user_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2');
            $name = $this->input->post('user_name');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $signUpData = array(
                'signUpEmail' => $email,
                'signUpPassword' => $password,
                'signUpPassword2' => $password2,
                'signUpName' => $name,
                'signUpAddress' => $address,
                'signUpUsername' => $user_name,
                'signUpPhone' => $phone,
            );
            $this->session->set_userdata($signUpData);
            if(!$this->muser->checkEmail($email)) {
                $this->session->set_flashdata('response','Email này đã được đăng ký!');
                redirect(base_url().'dang-ky');
            }
            if(!$this->muser->checkUsername($user_name)) {
                $this->session->set_flashdata('response','Username này đã được đăng ký!');
                redirect(base_url().'dang-ky');
            }
            if($password !== $password2) {
                $this->session->set_flashdata('response','Xác nhận mật khẩu không đúng');
                redirect(base_url().'dang-ky');
            }
            $data = array(
                'user_name' => $user_name,
                'user_pass' => $password,
                'name' => $name,
                'user_email' => $email,
                'user_type' => 'member',
                'user_gender' => '',
                'user_birthday' => '',
                'user_address' => $address,
                'user_phone' => $phone
            );
            $this->muser->addUser($data);
            $this->session->unset_userdata($signUpData);
            $this->session->set_flashdata('response','Đăng ký tài khoản thành công');
            redirect(base_url().'dang-nhap');
        }
        $this->_data['title'] = 'Đăng Ký - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Đăng Ký - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Đăng Ký - '.$this->mconfig->getByKey('page_description');
        $this->_data['slider_box'] = 'slider/slider_other';
        $this->load->view('desktop/components/header',$this->_data);
        $this->load->view('login/signup',$this->_data);
        $this->load->view('desktop/components/footer');
    }
    
    public function signout(){
        $this->session->sess_destroy();
        redirect();
    }
    public function forgot() {
        if (isset($_POST['forgot'])) {
            $email = $_POST['email'];
            if($email==''){
                $this->session->set_flashdata('response','Vui lòng điền đầy đủ các trường');
                redirect(base_url().'quen-mat-khau');
            }
            else{
                if(!$this->muser->checkEmail($email)){
                    $user = $this->muser->getByEmail($email);
                    $mk = uniqid();
                    $data = array(
                        'user_pass'=>$mk
                    );
                    $this->muser->editUserById($user['user_id'],$data);
                    $config = array(
                        'protocol' => $this->mconfig->getByKey('protocol'),
                        'smtp_host' => $this->mconfig->getByKey('smtp_host'),
                        'smtp_port' => $this->mconfig->getByKey('smtp_port'),
                        'smtp_user' => $this->mconfig->getByKey('smtp_user'),
                        'smtp_pass' => $this->mconfig->getByKey('smtp_pass'),
                    );
                    $from = $this->mconfig->getByKey('smtp_user');
                    $to = $email;
                    $sub= '[NGUYÊN PHÁT LOGISTICS] Reset password';
                    $mess= 'Mật khẩu mới của bạn là '.$mk;
                    @$this->sendmail($config,$from,$to,$sub,$mess);
                    $this->session->set_flashdata('response','Reset password thành công, vui lòng check mail để lấy password và đăng nhập lại');
                    redirect(base_url().'dang-nhap');
                }
                else{
                    $this->session->set_flashdata('response','Email không hợp lệ');
                    redirect(base_url().'quen-mat-khau');
                }
            }
        }
        $this->_data['title'] = 'Quên mật khẩu - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Quên mật khẩu - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Quên mật khẩu - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='home';
        $this->_data['slider_box'] = 'slider/slider_other';
        $this->load->view('desktop/components/header',$this->_data);
        $this->load->view('login/forgot',$this->_data);
        $this->load->view('desktop/components/footer');
    }
 }