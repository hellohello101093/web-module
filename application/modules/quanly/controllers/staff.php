<?php
class staff extends MY_Controller{
	public function __construct(){
		parent::__construct();
        $this->_data['now'] = 'Nhân Viên';
        $user_type_allows = array('administrator', 'manager');
        $user = $this->session->userdata('user');
        if(!$user || !in_array($user['user_type'], $user_type_allows)){
          redirect(base_url()."quanly");
        }
        $this->form_validation->CI =& $this;
        $this->_data['usergroups'] = $this->muser->getListUserGroup();
	}
	public function listall(){
        if(!isset($_GET['per_page'])){
            $start = 0 ;
        }else{
            $start=$_GET['per_page'];
        }
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/staff/listall?';
		//config phân trang
		$config['total_rows'] = $this->muser->numRowsByType('staff');
		$config['per_page'] = 8;
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
		$this->_data['template'] = 'quanly/staff/list_view';
		$this->_data['title'] = 'Trang Quản Lý User ';
		$this->_data['info'] = $this->muser->listAllByType($config['per_page'], $start, 'staff');
		$this->load->view("layout/quanly",$this->_data);
	}
	public function add(){
        $this->_data['action'] = strtolower(__FUNCTION__);
		if(isset($_POST['ok'])){
			$this->form_validation->set_rules("user_name","User Name","required|callback_check_user");
			$this->form_validation->set_rules("user_pass","Mật Khẩu","required");
			$this->form_validation->set_rules("user_email"," Địa chỉ email","required|valid_email|callback_check_email");
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
					'user_type' => 'staff',
					'status' => 1,
				);
				$this->muser->addUser($arr);
				$this->session->set_flashdata('ses_flash',"Thêm");
				redirect(base_url()."quanly/staff/listall");
			}
            $arr = array(
                'user_name' => $this->input->post('user_name'),
				'name' => $this->input->post('name'),
				'user_pass' => $this->input->post('user_pass'),
				'user_email' => $this->input->post('user_email'),
				'user_address' => $this->input->post('user_address'),
				'user_phone' => $this->input->post('user_phone'),
            );
            $this->_data['info'] = $arr;
		}
		$this->_data['template'] = 'quanly/staff/modify_view';
		$this->_data['title'] = 'Trang Thêm Nhân Viên';
		$this->load->view("layout/quanly",$this->_data);
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
	public function del($id){
		$this->muser->delUser($id);
		$this->session->set_flashdata('ses_flash',"Xóa");
		redirect(base_url()."quanly/staff/listall");
	}
	public function edit($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
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
                    'user_type' => 'staff',
                    'status' => 1,

                );
				$this->muser->editUserById($id,$arr);
				$this->session->set_flashdata('ses_flash',"Sửa");
				redirect(base_url()."quanly/staff/listall");
			}
		}
		$this->_data['info'] = $this->muser->getUserById($id);
		$this->_data['template'] = 'quanly/staff/modify_view';
		$this->_data['title'] = 'Trang Sửa Nhân Viên ';
		$this->load->view("layout/quanly",$this->_data);

	}

}