<?php
class khachhang extends vnit{
    function __construct(){
        parent::__construct();
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        $this->load->language('khachhang',$this->lang_active);
        $this->load->model('khachhang_model','khachhang');
    }
    
    function index(){
        $data['title'] =lang('khachhang');
        $config['base_url'] = base_url().$this->lang_url.'khach-hang';
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->khachhang->get_num_khachhang($this->lang_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   15; 
        $config['uri_segment'] = 2; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->khachhang->get_all_khachhang($config['per_page'], segment(2,'int'), $this->lang_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('index',$data);        
    }
    
    function detail(){
        $id = end(explode('-',$this->uri->segment(2)));
        $rs = $this->khachhang->get_id($id, $this->lang_id);
        $data['title'] = lang('khachhang').': '.$rs->name;
        $data['rs'] = $rs;
        $data['img'] = $this->khachhang->get_all_img($id);
        $data['ds'] = $this->khachhang->get_khachhang_khac($id, $this->lang_id);
        $this->load->templates('detail',$data);
    }
}
