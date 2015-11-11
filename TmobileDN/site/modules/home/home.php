<?php
class home extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('home_model','home');
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->load->language('home',$this->language->active());
    }
    
    function index(){
        $data['title'] = $this->config->item('site_name_'.$this->session->data['lang']);
        $data['about'] = $this->home->get_about($this->lang_id);
        $data['listsp'] = $this->home->get_sp_new($this->lang_id);
        $data['spnoibat'] = $this->home->get_sp_noibat($this->lang_id);
        $this->load->templates('index',$data);
    }
}