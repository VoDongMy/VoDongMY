<?php
class product extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('product_model','product');
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        $this->load->language('product',$this->lang_active);
        $this->pre_message = "";
    }
    
    function home(){
        $data['title'] = lang('sanpham');
        $data['dscat'] = $this->product->get_all_cat($this->lang_id);
        $this->load->templates('home',$data);
    }
    
    function index(){
        $data['title'] = lang('sanpham');
        $config['base_url'] = base_url().$this->lang_url.'san-pham';
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->product->get_num_product($this->lang_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   12;
        $config['uri_segment'] = 2; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->product->get_all_product($config['per_page'], segment(2,'int'), $this->lang_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('index',$data);
    }
    
    function cat(){
        $slug = $this->uri->segment(2);

        $catinfo = $this->product->get_cat_by_slug($this->lang_id, $slug);
        if(!$catinfo){
            redirect('san-pham');
        }
        $data['catinfo'] = $catinfo;
        $data['title'] = $catinfo->name;
        $config['base_url'] = base_url().$this->lang_url.'san-pham/'.$catinfo->slug;
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->product->get_num_product($this->lang_id, $catinfo->cat_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   12;
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->product->get_all_product($config['per_page'], segment(3,'int'), $this->lang_id, $catinfo->cat_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('cat',$data);
    }
    function cat1(){
        $slug = $this->uri->segment(3);
        $catinfo = $this->product->get_cat_by_slug($this->lang_id, $slug);
        if(!$catinfo){
            redirect('san-pham');
        } 

        $data['catinfo1'] = $catinfo;
        $data['catinfo'] = $this->product->get_cat_by_id($this->lang_id, $catinfo->parent_id);;
        $data['title'] = $catinfo->name;
        $config['base_url'] = base_url().$this->lang_url.$catinfo->slug;
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->product->get_num_product($this->lang_id, $catinfo->cat_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   12;
        $config['uri_segment'] = 4; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->product->get_all_product($config['per_page'], segment(4,'int'), $this->lang_id, $catinfo->cat_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('cat',$data);
    }
    
    function sanphammoi(){
        $data['title'] = lang('sanphammoi');
        $config['base_url'] = base_url().$this->lang_url.'co-gi-moi/san-pham-moi';
        $config['suffix'] = '.html';
        $config['total_rows']   =  $this->product->get_num_spmoi($this->lang_id, $catinfo->cat_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20;
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->product->get_all_spmoi($config['per_page'], segment(3,'int'), $this->lang_id);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('new',$data);
    }
    
    function detail(){
        $id = end(explode('-',$this->uri->segment(2)));
        $rs = $this->product->get_product($this->lang_id, $id);
        if(!$rs){
            //redirect('san-pham');
        }
        $data['rs'] = $rs;  
        $data['images'] = $rs->images;                                                         
        $data['catinfo'] = $this->product->get_cat_by_id($this->lang_id, $rs->cat_id);
        $data['title'] = $rs->title;
        $data['list'] = $this->product->sp_lienquan($id, $rs->cat_id, $this->lang_id);
        $this->load->templates('detail',$data);
    }
    
    function search(){
        $key = $this->request->get['keyword'];
        $data['title'] = lang('timkiem');
        $data['key'] = $key;
        $config['base_url'] = base_url().$this->lang_url.'san-pham/tim-kiem';
        $config['suffix'] = '.html?keyword='.$key;
        $config['total_rows']   =  $this->product->get_num_product_s($this->lang_id,$key);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20;
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->product->get_all_product_s($config['per_page'], segment(3,'int'), $this->lang_id,$key);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('search',$data);
    }

}
