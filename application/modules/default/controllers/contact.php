<?php
class Contact extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] = 'Liên hệ - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Liên hệ - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Liên hệ - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='lien-he';
        $this->_data['slider_box'] = 'slider/slider_other';
        $this->_data['sliders'] = $this->mslider_lienhe->listall();
        $this->_data['forder_slider'] = 'slider_lienhe';
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('desktop/components/header',$this->_data);
                $this->load->view('contact/index',$this->_data);
                $this->load->view('desktop/components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/contact/index',$this->_data);
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('desktop/components/header',$this->_data);
        $this->load->view('contact/index',$this->_data);
        $this->load->view('desktop/components/footer');
	}
    
    public function send() {
        $arr = array(
            'name'=>$_POST['name'],
            'address'=>$_POST['address'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'message'=>$_POST['message'],
            'created'=>time()
        );
        $this->mcontact->add($arr);
        $config = array(
            'protocol' => $this->mconfig->getByKey('protocol'),
            'smtp_host' => $this->mconfig->getByKey('smtp_host'),
            'smtp_port' => $this->mconfig->getByKey('smtp_port'),
            'smtp_user' => $this->mconfig->getByKey('smtp_user'),
            'smtp_pass' => $this->mconfig->getByKey('smtp_pass'),
        );
        $from = $this->mconfig->getByKey('smtp_user');
        $to = $this->mconfig->getByKey('mail_to_contact');
        $sub = $this->mconfig->getByKey('mail_contact');
        $mess = $this->load->view('mail/contact', $arr, TRUE);
        @$this->sendmail($config,$from,$to,$sub,$mess);
        echo 'Liên hệ hoàn tất, chúng tôi sẽ liên hệ lại bạn trong thời gian ngắn nhất';
    }
 }