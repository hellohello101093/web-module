<?php
class order extends MY_Controller{

    protected $_gallery_path = "";
    protected $_gallery_url = "";
	public function __construct(){
		parent::__construct();
        $this->_data['now'] = 'Báo Giá';
        $this->load->model('morder');
        $user = $this->session->userdata('user');
        if(!$user || $user['user_type'] != 'administrator'){
            if($user['user_type']=='nhanvien'){
                redirect(base_url()."admin/product/phieubanhang"); 
            }
            else
                redirect(base_url()."admin/login");
        }
        $this->form_validation->CI =& $this;
        //--------
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->_gallery_url = base_url()."public/order/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->_gallery_path = realpath(APPPATH. "../public/order");
	}
	public function listall(){
        if(!isset($_GET['per_page'])){
            $start = 0 ;
        }else{
            $start=$_GET['per_page'];
        }
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/order/listall?';
		//config phân trang
		$config['total_rows'] = $this->morder->numRows();
		$config['per_page'] = 15;
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
		$this->_data['template'] = 'admin/order/list_view';
		$this->_data['title'] = 'Trang Quản Lý Danh Mục ';
		$this->_data['info'] = $this->morder->listAll($config['per_page'],$start);
		$this->load->view("layout/admin",$this->_data);
	}
    
	public function detail($id = -1){
	   if($id == -1) {
	       redirect(base_url().'admin/order/listall');
	   }
        $this->_data['action'] = strtolower(__FUNCTION__);
		$this->_data['info'] = $this->morder->getById($id);
		$this->_data['template'] = 'admin/order/modify_view';
		$this->_data['title'] = 'Trang Thêm Thực Đơn ';
		$this->load->view("layout/admin",$this->_data);
	}

	public function del($id){
		$this->morder->del($id);
		$this->session->set_flashdata('ses_flash',"Xóa");
		redirect(base_url()."admin/order/listall");
	}
    public function changeStatus() {
        $data = array(
            'status' => $_POST['data']
        );
        $id = $_POST['id'];
        $this->morder->editById($id, $data);
    }
}