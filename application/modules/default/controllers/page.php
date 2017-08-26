<?php
class Page extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($code){
        $this->_data['page'] = $this->mpage->getByCode($code);
        $this->_data['title'] = $this->_data['page']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['page']['keyword'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['page']['desc'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='gioi-thieu';
        $this->_data['slider_box'] = 'slider/slider_other';
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('desktop/components/header',$this->_data);
                $this->load->view('page/index',$this->_data);
                $this->load->view('desktop/components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/page/index');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('desktop/components/header',$this->_data);
        $this->load->view('page/index',$this->_data);
        $this->load->view('desktop/components/footer');
	}
    public function banggia(){
        $this->_data['page'] = $this->mpage->getByCode('banggia');
        $this->_data['title'] = $this->_data['page']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['page']['keyword'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['page']['desc'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='bang-gia';
        $this->_data['slider_box'] = 'slider/slider_other';
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('desktop/components/header',$this->_data);
                $this->load->view('page/index',$this->_data);
                $this->load->view('desktop/components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/page/banggia');
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('desktop/components/header',$this->_data);
        $this->load->view('page/banggia',$this->_data);
        $this->load->view('desktop/components/footer');
	}
 }