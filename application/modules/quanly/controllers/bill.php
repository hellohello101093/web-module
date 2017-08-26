<?php
class bill extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->_data['now'] = 'Xe';
        $this->load->model('mbills');
        $user_type_allows = array('administrator', 'manager', 'staff', 'member');
        $user = $this->session->userdata('user');
        if(!$user || !in_array($user['user_type'], $user_type_allows)){
          redirect(base_url()."quanly");
        }
        $this->form_validation->CI =& $this;
        $this->_gallery_url = base_url()."public/csv/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->_gallery_path = realpath(APPPATH. "../public/csv");
        $this->_gallery_bill_path = realpath(APPPATH. "../public/hoadon");
    }
    public function listall(){
        $user = $this->session->userdata('user');
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
        $config['base_url'] = base_url().'quanly/bill/listall?s='.$s;
        //config phân trang
        if ($user['user_type'] === 'member') {
            $config['total_rows'] = $this->mbills->numRowsByUser($s, $user['user_id']);
        } else {
           $config['total_rows'] = $this->mbills->numRows($s);   
        }
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
        $this->_data['template'] = 'quanly/bill/list_view';
        if ($user['user_type'] === 'member') {
            $this->_data['info'] = $this->mbills->listAllByUser($config['per_page'],$start,$s, $user['user_id']);
        } else {
           $this->_data['info'] = $this->mbills->listAll($config['per_page'],$start,$s);   
        }
        $this->load->view("layout/quanly",$this->_data);
    }
    
    private function createNotes() {
        $data = array();
        $dates = $this->input->post('date');
        $times = $this->input->post('time');
        $locations = $this->input->post('location');
        $texts = $this->input->post('text');
        for($i = 0; $i < count($dates); $i++) {
            $item = array(
                'date' => $dates[$i],
                'time' => $times[$i],
                'location' => $locations[$i],
                'text' => $texts[$i]
            );
            array_push($data, json_encode($item));
        }
        return $data;
    }
    
    public function add(){
        $user = $this->session->userdata('user');
        $this->_data['action'] = strtolower(__FUNCTION__);
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules("compose_number","Số Soạn Hàng","callback_check_code");
            $notes = $this->createNotes();
            if($this->form_validation->run()==TRUE){
                $status = $this->input->post('status');
                $product_deliveried = 0;
                $bill_delivered = 0;
                if ($status == 1) {
                    $product_deliveried = time();
                } else if ($status == 2) {
                    $bill_delivered = time();
                }
                $arr = array(
                    'compose_number' => $this->input->post('compose_number'),
                    'product_id' => $this->input->post('product_id'),
                    'customer_id' => $this->input->post('customer_id'),
                    'quantity' => $this->input->post('quantity'),
                    'total_votes' => $this->input->post('total_votes'),
                    'date_start' => $this->input->post('date_start'),
                    'date_end' => $this->input->post('date_end'),
                    'verhicle_id' => $this->input->post('verhicle_id'),
                    'product_delivered' => $product_deliveried,
                    'bill_delivered' => $bill_delivered,
                    'status' => $status,
                    'notes' => json_encode($notes),
                    'creator_id' => $user['user_id'],
                    'last_modified' => $user['user_id'],
                    'created' => time(),
                );
                $id = $this->mbills->add($arr);
                $this->uploadBill($id);
                $this->session->set_flashdata('ses_flash',"Thêm");
                redirect(base_url()."quanly/bill/listall");
            }
            $arr = array(
                'compose_number' => $this->input->post('compose_number'),
                'product_id' => $this->input->post('product_id'),
                'customer_id' => $this->input->post('customer_id'),
                'quantity' => $this->input->post('quantity'),
                'total_votes' => $this->input->post('total_votes'),
                'date_start' => $this->input->post('date_start'),
                'date_end' => $this->input->post('date_end'),
                'verhicle_id' => $this->input->post('verhicle_id'),
                'product_delivered' => $this->input->post('product_delivered'),
                'bill_delivered' => $this->input->post('bill_delivered'),
                'notes' => json_encode($notes),
            );
            $this->_data['info'] = $arr;
        }
        $this->_data['template'] = 'quanly/bill/modify_view';
        $this->_data['title'] = 'Trang Thêm  ';
        $this->load->view("layout/quanly",$this->_data);
    }
    
    public function check_code($code){
        if($this->mbills->checkCode($code)==false){
            $this->form_validation->set_message("check_code","Số Soạn Hàng đã được sử dụng.");
            return false;
        }else{
            return true;
        }
    }
    public function del($id){
        $info = $this->mbills->getById($id);
        if ($info['creator_id'] !== $user['user_id'] && $user['user_type'] !== 'administrator') {
            redirect(base_url()."quanly/bill/listall");
        }
        $this->mbills->del($id);
        $this->session->set_flashdata('ses_flash',"Xóa");
        redirect(base_url()."quanly/bill/listall");
    }
    public function dellist(){
        $info = $this->mbills->getById($id);
        if ($info['creator_id'] !== $user['user_id']) {
            redirect(base_url()."quanly/bill/listall");
        }
        foreach($_POST['del'] as $id){
            $this->mbills->del($id);
        }
        $this->session->set_flashdata('ses_flash',"Xóa");
        redirect(base_url()."quanly/bill/listall");
    }

    public function edit($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
        $this->_data['info'] = $this->mbills->getById($id);
        $user = $this->session->userdata('user');
        $info = $this->_data['info'];
        if ($info['creator_id'] !== $user['user_id'] && $user['user_type'] !== 'administrator') {
            redirect(base_url()."quanly/bill/listall");
        }
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules("compose_number","Số Soạn Hàng","required");
            if($info['compose_number']!= $this->input->post('compose_number')){
                $this->form_validation->set_rules("compose_number","Số Soạn Hàng","callback_check_code");
            }
            $notes = $this->createNotes();
            if($this->form_validation->run()==TRUE){
                $status = $this->input->post('status');
                $product_deliveried = $info['product_delivered'];
                $bill_delivered = $info['bill_delivered'];
                if ($status == 1) {
                    $product_deliveried = time();
                } else if ($status == 2) {
                    $bill_delivered = time();
                }
                $arr = array(
                    'compose_number' => $this->input->post('compose_number'),
                    'product_id' => $this->input->post('product_id'),
                    'customer_id' => $this->input->post('customer_id'),
                    'quantity' => $this->input->post('quantity'),
                    'total_votes' => $this->input->post('total_votes'),
                    'date_start' => $this->input->post('date_start'),
                    'date_end' => $this->input->post('date_end'),
                    'verhicle_id' => $this->input->post('verhicle_id'),
                    'product_delivered' => $product_deliveried,
                    'bill_delivered' => $bill_delivered,
                    'status' => $status,
                    'notes' => json_encode($notes),
                    'last_modified' => $user['user_id'],
                );
                $this->mbills->editById($id,$arr);
                $this->uploadBill($id);
                $this->session->set_flashdata('ses_flash',"Sửa");
                redirect(base_url()."quanly/bill/listall");
            }
        }
        $this->_data['template'] = 'quanly/bill/modify_view';
        $this->_data['title'] = 'Trang Sửa User ';
        $this->load->view("layout/quanly",$this->_data);

    }
    
    public function view($id){
        $this->_data['action'] = strtolower(__FUNCTION__);
        $this->_data['info'] = $this->mbills->getById($id);
        $user = $this->session->userdata('user');
        $info = $this->_data['info'];
        $this->_data['template'] = 'quanly/bill/read_view';
        $this->_data['title'] = 'Trang Sửa User ';
        $this->load->view("layout/quanly",$this->_data);

    }
    
    public function import() {
        $this->_data['action'] = strtolower(__FUNCTION__);
        $user = $this->session->userdata('user');
        if(isset($_POST['ok'])){
            $config = array('upload_path'   => $this->_gallery_path,
                'allowed_types' => 'csv',
                'max_size'      => '20000');
            $this->load->library("upload",$config);
            if($this->upload->do_upload("file")){
                $data = $this->upload->data();
                $file_name = $data['file_name'];
                $path = $this->_gallery_path.'/'.$file_name;
                $this->load->library('csvimport');
                $result = $this->csvimport->get_array($path, array('so_soan_hang', 'ma_hang_hoa', 'ma_khach_hang', 'so_luong', 'phieu_xuat_tong', 'ngay_van_chuyen', 'ngay_du_tinh_den', 'ma_xe'));
                foreach($result as $data) {
                    $check = $this->mbills->checkCode($data['so_soan_hang']);
                    if ($check) {
                        $arr = array(
                            'compose_number' => $data['so_soan_hang'],
                            'product_id' => $data['ma_hang_hoa'],
                            'customer_id' => $data['ma_khach_hang'],
                            'quantity' => $data['so_luong'],
                            'total_votes' => $data['phieu_xuat_tong'],
                            'date_start' => $data['ngay_van_chuyen'],
                            'date_end' => $data['ngay_du_tinh_den'],
                            'verhicle_id' => $data['ma_xe'],
                            'creator_id' => $user['user_id'],
                            'last_modified' => $user['user_id'],
                            'created' => time(),
                        );
                        $this->mbills->add($arr);   
                    }
                }
                $this->session->set_flashdata('ses_flash',"Thêm");
                redirect(base_url()."quanly/bill/listall");
            }            
        }
        $this->_data['template'] = 'quanly/bill/import';
        $this->_data['title'] = 'Trang Sửa User ';
        $this->load->view("layout/quanly",$this->_data);
    }
    
    private function uploadBill($id) {
        $config = array('upload_path'   => $this->_gallery_bill_path,
            'allowed_types' => 'png|jpg|pdf',
            'max_size'      => '20000');
        $this->load->library("upload",$config);
        if($this->upload->do_upload("bill")){
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            $arr = array(
                'bill' => $file_name
            );
            $this->mbills->editById($id, $arr);
        }  
    }
}