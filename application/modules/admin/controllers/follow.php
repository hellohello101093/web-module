<?phpclass follow extends MY_Controller{	public function __construct(){		parent::__construct();        $this->_data['now'] = 'Tin Tức';        $this->load->model('mfollow');        $this->load->model('mconfig');        $user = $this->session->userdata('user');        if(!$user || $user['user_type'] != 'administrator'){            redirect(base_url()."admin/login");        }        $this->form_validation->CI =& $this;	}	public function listall(){        if(!isset($_GET['per_page'])){            $start = 0 ;        }else{            $start=$_GET['per_page'];        }		$this->load->library('pagination');		$config['base_url'] = base_url().'admin/follow/listall?';		//config phân trang		$config['total_rows'] = $this->mfollow->numRows();		$config['per_page'] =15;		$config['uri_segment'] = 4;		$config['cur_tag_open'] = "<li><a><font color='black'>";		$config['cur_tag_close'] = '</font></a></li>';		$config['num_tag_open'] = '<li>';		$config['num_tag_close'] = '</li>';		$config['prev_link'] = 'Prev';		$config['prev_tag_open'] = '<li>';		$config['prev_tag_close'] = '</li>';		$config['next_link'] = 'Next';		$config['next_tag_open'] = '<li>';		$config['next_tag_close'] = '</li>';		$config['first_tag_open'] = '<li>';		$config['first_tag_close'] = '</li>';		$config['last_tag_open'] = '<li>';		$config['last_tag_close'] = '</li>';		$this->pagination->initialize($config);		$this->_data['pagination']=$this->pagination->create_links();		$this->_data['template'] = 'admin/follow/list_view';		$this->_data['title'] = 'Trang Quản Lý Danh Mục ';		$this->_data['info'] = $this->mfollow->listAll($config['per_page'],$start);		$this->load->view("layout/admin",$this->_data);	}	public function del($id){		$this->mfollow->del($id);		$this->session->set_flashdata('ses_flash',"Xóa");		redirect(base_url()."admin/follow/listall");	}}