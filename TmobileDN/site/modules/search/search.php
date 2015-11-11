<?php
class search extends vnit{
    function __construct(){
        parent::__construct();
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        $this->load->language('search',$this->lang_active);
        $this->load->model('search_model','search');
    }
    
    function index(){
        $data['title'] = lang('timkiem');
        $this->load->templates('index',$data);
    }
    
    function result(){
        $s = $this->request->get['keyword'];
        $key = str_replace('+',' ',$s);
        $data['key'] = $key;
        $data['title'] = lang('s.timkiem').': '.$key;
        $config['base_url'] = base_url().$this->lang_url.'tim-kiem';
        $config['suffix'] = '.html?keyword='.$s;
        $config['total_rows']   =  $this->search->get_num_product($this->lang_id, $key);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20; 
        $config['uri_segment'] = 2; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->search->get_all_product($config['per_page'], segment(2,'int'), $this->lang_id, $key);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('result',$data);        
    }

}