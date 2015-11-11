<?php
class sys_language extends vnit{
    function __construct(){
        parent::__construct();
        $this->pre_message = "";
        $this->load->language('date','vi');
        $this->load->language('sys_language','vi');
    }
    
    function index(){
        $data['title'] = "Quản lý ngôn ngữ";
        $data['add'] = 'sys_language/add';
        $data['list'] = $this->db->result("SELECT * FROM language ORDER BY lang_order ASC");
        $this->load->templates('index',$data);
    }
    
    function edit(){
        $id = segment(3,'int');
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'sys_language';
        $data['title'] = "Cập nhật ngôn ngữ";
        $data['rs'] = $this->db->row("SELECT * FROM language WHERE lang_id = $id");
        $this->form_validation->set_rules('vdata[lang_name]','Tên ngôn ngữ','required');
        $this->form_validation->set_rules('vdata[lang_icon]','Icon','required');
        $this->form_validation->set_rules('vdata[lang_dir]','Mã','required');
        $this->form_validation->set_rules('vdata[lang_order]','Sắp xếp','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = "";
        }else{
            $vdata = $this->request->post['vdata'];
            $vdata['lang_default'] = $this->request->post['lang_default'];
            $this->db->query("UPDATE language SET lang_default = 0");
            if($this->db->update('language',$vdata,array('lang_id'=>$id))){
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'sys_language';
                }else{
                    $url = 'sys_language/edit/'.$id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('edit',$data);
    }
    
    function add(){
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'sys_lang';
        $data['title'] = "Thêm mới ngôn ngữ";
        $this->form_validation->set_rules('vdata[lang_name]','Tên ngôn ngữ','required');
        $this->form_validation->set_rules('vdata[lang_icon]','Icon','required');
        $this->form_validation->set_rules('vdata[lang_dir]','Mã','required');
        $this->form_validation->set_rules('vdata[lang_order]','Sắp xếp','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = "";
        }else{
            $vdata = $this->request->post['vdata'];
            $vdata['lang_default'] = $this->request->post['lang_default'];
            if($vdata['lang_default'] == 1){
                $this->db->query("UPDATE language SET lang_default = 0");
            }
            if($this->db->insert('language',$vdata)){
                $id = $this->db->insert_id();
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'sys_language';
                }else{
                    $url = 'sys_language/edit/'.$id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('edit',$data);
    }
    
    function del(){
        $id = segment(3,'int');
        if($this->db->delete('language',array('lang_id'=>$id))){
            $this->session->set_flashdata('message','Xóa thành công');
        }else{
            $this->session->set_flashdata('message','Xóa không thành công');
        }
        redirect('sys_language');
    }
}
