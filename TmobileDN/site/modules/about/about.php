<?php
class about extends vnit{
    function __construct(){
        parent::__construct();
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        $this->load->language('about',$this->lang_active);
        $this->load->model('about_model','about');
        $this->pre_message = "";
    }
    function index(){
        $data['title'] = lang('gioithieu');
        $data['rs'] = $this->db->row("SELECT * FROM about WHERE lang_id =".$this->lang_id);
        $this->load->templates('index',$data);
    }
    
    function dangky(){
        $data['title'] = "Đăng ký Email";
        $this->form_validation->set_rules('firstname','','required');
        $this->form_validation->set_rules('lastname','','required');
        $this->form_validation->set_rules('email','email','required|callback__kiemtraemail');
        $this->form_validation->set_rules('re_email','','required');
        $this->form_validation->set_rules('address1','','');
        $this->form_validation->set_rules('address2','','');
        $this->form_validation->set_rules('city','','');
        $this->form_validation->set_rules('country','','');
        $this->form_validation->set_rules('mobile','','');
        $this->form_validation->set_rules('read_s','','');
        $this->form_validation->set_rules('check_mail','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata['ho'] = $this->request->post['firstname'];
            $vdata['ten'] = $this->request->post['lastname'];
            $vdata['email'] = $this->request->post['email'];
            $vdata['address1'] = $this->request->post['address1'];
            $vdata['address2'] = $this->request->post['address2'];
            $vdata['city'] = $this->request->post['city'];
            $vdata['country'] = $this->request->post['country'];
            $vdata['mobile'] = $this->request->post['mobile'];
            if($this->db->insert('dangky',$vdata)){
                $this->session->set_flashdata('message',lang('dangky_thanhcong'));
                redirect(uri_string());
            }else{
                $this->pre_message = lang('dangky_khong_thanhcong');
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('dangky',$data);
    }
    
    function _kiemtraemail($email){
        $sql  = "SELECT email FROM dangky WHERE email = '$email'";
        $row = $this->db->row($sql);
        if($row){
            $this->form_validation->set_message('_kiemtraemail', lang('email_dadangky')); 
            return false;
        }else{
            return true;
        }
    }
    
    function chinhsach(){
        $data['title'] = lang('chinhsachbaomat');
        $data['rs'] = $this->about->get_item_news($this->lang_id, 1);
        $this->load->templates('chinhsach',$data);
    }
    
    function dieukien(){
        $data['title'] = lang('dieukien_dieukhoan');
        $data['rs'] = $this->about->get_item_news($this->lang_id, 2);
        $this->load->templates('chinhsach',$data);
    }
}
