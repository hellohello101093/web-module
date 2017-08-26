<?php
class report extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->_data['now'] = 'Báo Cáo';
        $user_type_allows = array('administrator', 'manager', 'staff');
        $user = $this->session->userdata('user');
        if(!$user || !in_array($user['user_type'], $user_type_allows)){
          redirect(base_url()."quanly");
        }
        $this->form_validation->CI =& $this;
    }
    public function index() {
        $user = $this->session->userdata('user');
        $table = isset($_GET['table']) ? $_GET['table'] : '';
        $start = isset($_GET['start']) ? $_GET['start'] : '';
        $end = isset($_GET['end']) ? $_GET['end'] : '';
        if ($table === 'bill') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->_data['info'] = $this->mbills->getReport($start_time, $end_time);
            $this->_data['data_report'] = 'quanly/report/report_bill';   
        }
        if ($table === 'product') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->_data['info'] = $this->mproduct->getReport($start_time, $end_time);
            $this->_data['data_report'] = 'quanly/report/report_product';   
        }
        if ($table === 'driver') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->_data['info'] = $this->mdriver->getReport($start_time, $end_time);
            $this->_data['data_report'] = 'quanly/report/report_driver';   
        }
        if ($table === 'verhicle') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->_data['info'] = $this->mverhicle->getReport($start_time, $end_time);
            $this->_data['data_report'] = 'quanly/report/report_verhicle';   
        }
        $this->_data['table'] = $table;
        $this->_data['start'] = $start;
        $this->_data['end'] = $end;
        $this->_data['template'] = 'quanly/report/list_view';
        $this->load->view("layout/quanly",$this->_data);
    }
    public function export(){
        $table = isset($_GET['table']) ? $_GET['table'] : '';
        $start = isset($_GET['start']) ? $_GET['start'] : '';
        $end = isset($_GET['end']) ? $_GET['end'] : '';
        if ($table === 'bill') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->export_bills($start_time, $end_time);   
        }
        if ($table === 'product') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->export_product($start_time, $end_time);
        }
        if ($table === 'driver') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->export_driver($start_time, $end_time);   
        }
        if ($table === 'verhicle') {
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $this->export_verhicle($start_time, $end_time);   
        }
    }
    private function export_bills($start_time, $end_time) {
        $data = '';
        $title = '"ID","Số Soạn Hàng","Mã Hàng","Tên Hàng","Mã NPP","Tên NPP","Số Lượng","Phiếu Xuất Tổng","Xe Đi","Ngày Xuất","Nhận Hàng","Nhận Phiếu"'."\n";
        $result = $this->mbills->getReport($start_time, $end_time);
        $data.=$title;
        foreach($result as $r){
            $product = $this->mproduct->getByCode($r['product_id']);
            $verhicle = $this->mverhicle->getById($r['verhicle_id']);
            $data.='"'.$r['id'].'"';
            $data.=',"'.$r['compose_number'].'"';
            $data.=',"'.$product['code'].'"';
            $data.=',"'.$product['name'].'"';
            $data.=',"'.$product['supplier_code'].'"';
            $data.=',"'.$product['supplier_name'].'"';
            $data.=',"'.$r['quantity'].'"';
            $data.=',"'.$r['total_votes'].'"';
            $data.=',"'.$verhicle['verhicle_number'].'"';
            $data.=',"'.date('d-m-Y',$r['created']).'"';
            $data.=',"'.date('d-m-Y',$r['product_delivered']).'"';
            $data.=',"'.date('d-m-Y',$r['bill_delivered']).'"'."\n";
        }
        $this->load->helper('download');
        $csv = "\xEF\xBB\xBF".$data;
        force_download('bill_'.$start_time.'_'.$end_time.'.csv', $csv);
    }
    private function export_product($start_time, $end_time) {
        $data = '';
        $title = '"STT","Tên Hàng Hóa","Mã Hàng Hóa","Mã Nhà Phân Phối","Nhà Phân Phối","Ngày Nhập"'."\n";
        $result = $this->mproduct->getReport($start_time, $end_time);
        $data.=$title;
        $i = 1;
        foreach($result as $r){
            $data.='"'.$i.'"';
            $data.=',"'.$r['name'].'"';
            $data.=',"'.$r['code'].'"';
            $data.=',"'.$r['supplier_code'].'"';
            $data.=',"'.$r['supplier_name'].'"';
            $data.=',"'.date('d-m-Y',$r['created']).'"'."\n";
            $i++;
        }
        $this->load->helper('download');
        $csv = "\xEF\xBB\xBF".$data;
        force_download('product_'.$start_time.'_'.$end_time.'.csv', $csv);
    }
    private function export_driver($start_time, $end_time) {
        $data = '';
        $title = '"STT","Tên Tài Xế","Mã Bằng Lái","Điện Thoại","Địa Chỉ","Ngày Tạo"'."\n";
        $result = $this->mdriver->getReport($start_time, $end_time);
        $data.=$title;
        $i = 1;
        foreach($result as $r){
            $data.='"'.$i.'"';
            $data.=',"'.$r['name'].'"';
            $data.=',"'.$r['code'].'"';
            $data.=',"`'.$r['phone'].'`"';
            $data.=',"'.$r['address'].'"';
            $data.=',"'.date('d-m-Y',$r['created']).'"'."\n";
            $i++;
        }
        $this->load->helper('download');
        $csv = "\xEF\xBB\xBF".$data;
        force_download('driver_'.$start_time.'_'.$end_time.'.csv', $csv);
    }
    private function export_verhicle($start_time, $end_time) {
        $data = '';
        $title = '"STT","Tên Tài Xế","Số Xe","Số ReMoc","Ngày Nhập"'."\n";
        $result = $this->mverhicle->getReport($start_time, $end_time);
        $data.=$title;
        $i = 1;
        foreach($result as $r){
            $driver = $this->mdriver->getById($r['driver_id']);
            $data.='"'.$i.'"';
            $data.=',"'.$driver['name'].'"';
            $data.=',"'.$r['verhicle_number'].'"';
            $data.=',"'.$r['rmoc_number'].'"';
            $data.=',"'.date('d-m-Y',$r['created']).'"'."\n";
            $i++;
        }
        $this->load->helper('download');
        $csv = "\xEF\xBB\xBF".$data;
        force_download('verhicle_'.$start_time.'_'.$end_time.'.csv', $csv);
    }
}