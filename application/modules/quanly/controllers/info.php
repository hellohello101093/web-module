<?php
class info extends MY_Controller{
	public function __construct(){
		parent::__construct();
        $this->_data['now'] = 'Thành Viên';
		$this->load->model('muser');
        $user_type_allows = array('administrator', 'manager','staff', 'member');
        $user = $this->session->userdata('user');
        if(!$user || !in_array($user['user_type'], $user_type_allows)){
          redirect(base_url()."quanly/login");
        }
        $this->form_validation->CI =& $this;
        $this->_data['usergroups'] = $this->muser->getListUserGroup();
	}
	// hàm kiểm tra tồn tại username
	public function check_user($username){
		if($this->muser->checkUsername($username)==false){
			$this->form_validation->set_message("check_user","User Name đã được sử dụng .");
			return false;
		}else{
			return true;
		}
	}
    // hàm kiểm tra tồn tại email
    public function check_email($email){
        if($this->muser->checkEmail($email)==false){
            $this->form_validation->set_message("check_email","Email đã được sử dụng .");
            return false;
        }else{
            return true;
        }
    }
	public function index(){
        $this->_data['action'] = strtolower(__FUNCTION__);
        $user = $this->session->userdata('user');
        $id = $user['user_id'];
		if(isset($_POST['ok'])){
			$this->form_validation->set_rules("user_name","User Name","required");
			$this->form_validation->set_rules("user_pass","Mật Khẩu","required");
			$this->form_validation->set_rules("user_email"," Địa chỉ email","required|valid_email");
            $this->form_validation->set_rules('name','Họ và Tên', 'trim|required');
            $this->form_validation->set_rules('user_address','Địa Chỉ', 'trim|required');
            $this->form_validation->set_rules('user_phone','Điện Thoại', 'trim|required');

            if($this->form_validation->run()==TRUE){
				$arr = array(
                    'user_name' => $this->input->post('user_name'),
                    'name' => $this->input->post('name'),
                    'user_pass' => $this->input->post('user_pass'),
                    'user_email' => $this->input->post('user_email'),
                    'user_address' => $this->input->post('user_address'),
                    'user_phone' => $this->input->post('user_phone'),
                    'user_type' => $this->input->post('user_type'),
                    'status' => $this->input->post('status'),

                );
				$this->muser->editUserById($id,$arr);
				$this->session->set_flashdata('ses_flash',"Sửa");
				redirect(base_url()."quanly");
			}
		}
		$this->_data['info'] = $this->muser->getUserById($id);
		$this->_data['template'] = 'quanly/info/modify_view';
		$this->_data['title'] = 'Trang Sửa User ';
		$this->load->view("layout/quanly",$this->_data);

	}

}