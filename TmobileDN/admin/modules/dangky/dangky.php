<?php
class dangky extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('dangky_model','dangky');
    }
    
    function ds(){
        $data['title'] = "Đăng ký Email";
        $config['base_url'] = base_url().'dangky/ds/';
        $config['suffix'] = '/'.$str;
        $config['total_rows']   =  $this->dangky->get_num_dangky();
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20; 
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->dangky->get_all_dangky($config['per_page'],segment(3,'int'));
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('ds',$data);
    }
    
    function detail(){
        $id = segment(3,'int');
        $page = segment(4,'int');
        $data['back'] = 'dangky/ds/'.$page;
        $data['title'] = "Chi tiết đăng ký";
        $data['rs'] = $this->db->row("SELECT * FROM dangky WHERE id = $id");
        $this->load->templates('detail',$data);
    }
    
    function del(){
        $id = segment(3,'int');
        $page = segment(4,'int');
        if($this->db->delete('dangky',array('id'=>$id))){
            $msg = "Xóa thành công";
        }else{
            $msg = "Xóa không thành công";
        }
        $this->session->set_flashdata('message',$msg);
        redirect('dangky/ds/'.$page);
    }
    
    function export(){
        $data['list'] = $this->dangky->get_all();
        $this->load->view('xuat',$data);
    }
}
