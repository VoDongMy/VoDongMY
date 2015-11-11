<?php
class news extends vnit{
    function __construct(){
        parent::__construct();
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        $this->load->language('news',$this->lang_active);
        $this->load->model('news_model','news');
    }
    
    function index(){
        $slug = $this->uri->segment(1);
        $catinfo = $this->news->get_catinfo_by_slug($this->lang_id, $slug);
        if(!$catinfo){
            redirect();
        }
        $data['catinfo'] = $catinfo;
        $data['title'] = $catinfo->cat_name;
        $config['base_url'] = base_url().$this->lang_url.$slug;
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->news->get_num_news($this->lang_id, $catinfo->cat_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   8; 
        $config['uri_segment'] = 2; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->news->get_all_news($config['per_page'],segment(2,'int'),$this->lang_id, $catinfo->cat_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('index',$data);
    }
    
    function cat(){
        $slug = $this->uri->segment(2);
        $catinfo = $this->news->get_catinfo_by_slug($this->lang_id, $slug);
        $data['title'] = lang('tintuc').': '.$catinfo->cat_name;
        $data['catinfo'] = $catinfo;
        $config['base_url'] = base_url().$this->lang_url.'tin-tuc/'.$slug;
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->news->get_num_news($this->lang_id, $catinfo->cat_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   8; 
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->news->get_all_news($config['per_page'],segment(3,'int'),$this->lang_id, $catinfo->cat_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('cat',$data);
    }
    
    function detail(){
        $id = end(explode('-',$this->uri->segment(2)));
        $rs = $this->db->row("SELECT * FROM news_des WHERE id = $id AND lang_id = ".$this->lang_id);
        $data['title'] = $rs->title. $rs->cat_id;
        $data['rs'] = $rs;
        $data['catinfo'] = $this->news->get_cat_by_id($this->lang_id, $rs->cat_id);
        $data['other'] = $this->news->get_tinlienquan($this->lang_id, $rs->id, $rs->cat_id);
        $this->load->templates('detail',$data); 
    }

    
}
