<?php
class tuvan extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('tuvan_model','tuvan');
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        $this->load->language('tuvan',$this->lang_active);
        $this->pre_message = "";
    }
    
    function index(){
        $data['title'] = "Tư vấn về da của tôi";
        $data['dscat'] = $this->tuvan->get_all_cat($this->lang_id);
        $this->load->templates('index',$data);
    }
    
    function ketqua(){
        $ar_id = $this->request->post['ar_id'];
        $ar_id = trim($ar_id,',');
        //$ar_id = '7,13,15,21,23,27,33,35,41';
        $data['ar_id'] = $ar_id;
        $data['dscat']  = $this->tuvan->get_all_cats($this->lang_id, $ar_id);
        $data['list']  = $this->tuvan->get_item_cat1($this->lang_id, $ar_id);
        $this->load->view('ketqua',$data);
    }
    
    function xemketqua(){
        $ar_id = $this->request->post['ar_id'];
        //$ar_id = '5,8,13,14,19,22,27,33,37,41';
        $data['row'] = $this->tuvan->timloaida($this->lang_id, $ar_id);
        $data['congdung'] = $this->tuvan->get_listcongdung($this->lang_id, $ar_id);
        $data['loaida'] = $this->tuvan->get_all_sanpham_loaida($this->lang_id, $data['row']->id_loaida);
        $this->load->view('xemketqua',$data);
    }
}