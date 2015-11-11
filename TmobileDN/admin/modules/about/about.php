<?php
class about extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('about_model','about');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
    }
    
    function index(){
        $data['title'] = "Giới thiệu";
        $data['apply'] = true;
        $data['list'] = $this->about->get_about();
        $this->form_validation->set_rules('vdata[content]['.$this->language[0]->lang_id.']','Giới thiệu'.$this->language[0]->lang_name,'required');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            for($i = 0; $i < sizeof($this->language); $i++){
                $val1 = $this->language[0];
                $val = $this->language[$i];
                $vdes['small'] = ($vdata['small'][$val->lang_id] != '')?$vdata['small'][$val->lang_id]:$vdata['small'][$val1->lang_id];
                $vdes['content'] = ($vdata['content'][$val->lang_id] != '')?$vdata['content'][$val->lang_id]:$vdata['content'][$val1->lang_id];
                $this->db->update('about',$vdes,array('id'=>1,'lang_id'=>$val->lang_id));
            }
            $this->session->set_flashdata('message','Lưu thành công');
            redirect(uri_string());
        }
        $data['message']  = $this->pre_message;
        $this->load->templates('index',$data);
    }
}