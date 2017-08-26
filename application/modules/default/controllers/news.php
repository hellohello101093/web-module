<?php
class News extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($start=0){
        $this->_data['title'] = 'Tin tức - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Tin tức - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Tin tức - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='tin-tuc';
        $this->_data['sliders'] = $this->mslider_tintuc->listAll();
        $this->_data['forder_slider'] = 'slider_tintuc';
        $limit = 8;
        $this->load->library('pagination');
        $config['base_url'] = base_url().'tin-tuc';
        //config phân trang
        $config['total_rows'] = $this->mduan->numRows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;
        $config['cur_tag_open'] = "<li class='active'><a>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->config->set_item('enable_query_strings', False);
        $this->pagination->initialize($config);
        $this->_data['pagination']=$this->pagination->create_links();
        $this->_data['data'] = $this->mduan->listAll($limit,$start);
        $this->_data['slider_box'] = 'slider/slider_other';
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('components/header',$this->_data);
                $this->load->view('news/index',$this->_data);
                $this->load->view('components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/news/index',$this->_data);
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('news/index',$this->_data);
        $this->load->view('components/footer');
	}
    
    public function detail($link){
        $this->_data['data'] = $this->mduan->getByLink($link);
        $this->_data['activeMenu'] ='tin-tuc';
        $this->_data['title'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = $this->_data['data']['title'].' - '.$this->mconfig->getByKey('page_description');
        $this->_data['others'] = $this->mduan->getOthers($this->_data['data']['id']);
        $this->_data['slider_box'] = 'slider/slider_other';
        $this->_data['sliders'] = $this->mslider_tintuc->listAll();
        $this->_data['forder_slider'] = 'slider_tintuc';
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('components/header',$this->_data);
                $this->load->view('news/detail',$this->_data);
                $this->load->view('components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/news/detail',$this->_data);
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('news/detail',$this->_data);
        $this->load->view('components/footer');
    }
    public function tags(){
        $tag = isset($_POST['tag']) ?  $_POST['tag']: '';
        $this->_data['title'] = 'Tin tức - '.$this->mconfig->getByKey('page_title');
        $this->_data['keyword'] = 'Tin tức - '.$this->mconfig->getByKey('page_keyword');
        $this->_data['description'] = 'Tin tức - '.$this->mconfig->getByKey('page_description');
        $this->_data['activeMenu'] ='tin-tuc';
        $this->_data['data'] = $this->mduan->getByTag($tag);
        $this->_data['tag_name'] = $tag;
        $this->_data['slider_box'] = 'slider/slider_other';
        $this->_data['sliders'] = $this->mslider_tintuc->listAll();
        $this->_data['forder_slider'] = 'slider_tintuc';
        if($this->agent->mobile()){
            $detect = new Mobile_Detect();
            if( $detect->isTablet() ){
                $this->load->view('components/header',$this->_data);
                $this->load->view('news/index',$this->_data);
                $this->load->view('components/footer');
                return;
            }
            $this->load->view('mobile/components/header',$this->_data);
            $this->load->view('mobile/news/index',$this->_data);
            $this->load->view('mobile/components/footer');
            return;
        }
        $this->load->view('components/header',$this->_data);
        $this->load->view('news/index',$this->_data);
        $this->load->view('components/footer');
    }
 }