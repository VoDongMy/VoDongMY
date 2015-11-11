<?php
class cpanel extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('admincp_model','admincp');
    }
    
    function index(){
        $data['title'] = "Bảng điều khiển";
        $this->load->templates('index',$data);
    }
}
