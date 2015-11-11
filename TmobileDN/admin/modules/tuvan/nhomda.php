<?php
class nhomda extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('nhomda_model','nhomda');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
    }
    
    function ds(){
        $data['title'] = "Nhóm da";
        $data['add'] = 'tuvan/nhomda/add';
        $data['list'] = $this->nhomda->get_loai_da(1,2);
        $this->load->templates('nhomda/index',$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới nhóm da";
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/nhomda/ds';
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[ten]['.$lang->lang_id.']','Tên nhóm da '.$lang->lang_name,'required');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['catid'] = $vdata['catid'];
            if($this->db->insert('th',$idata)){
                $id  = $this->db->insert_id();
                foreach($this->language as $val):
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['ten'] = $vdata['ten'][$val->lang_id];
                    $this->db->insert('th_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'tuvan/nhomda/ds';
                }else{
                    $url = 'tuvan/nhomda/edit/'.$id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('nhomda/add',$data);
    }
    
    function edit(){
        $data['title'] = "Cập nhật nhóm da";
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/nhomda/ds';
        $id = segment(4,'int');
        $data['rs'] = $this->db->row("SELECT * FROM th_des WHERE id = $id");
        $data['list'] = $this->nhomda->get_nhomda($id);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[ten]['.$lang->lang_id.']','Nhóm da da '.$lang->lang_name,'required');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['catid'] = $vdata['catid'];
            if($this->db->update('th',$idata,array('id'=>$id))){
                $this->db->delete('th_des',array('id'=>$id));
                foreach($this->language as $val):
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['ten'] = $vdata['ten'][$val->lang_id];
                    $this->db->insert('th_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'tuvan/nhomda/ds';
                }else{
                    $url = 'tuvan/nhomda/edit/'.$id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('nhomda/edit',$data);
    }
    
    function del(){
        $id = segment(4,'int');
        if($this->db->delete('th',array('id'=>$id))){
            $this->db->delete('th_des',array('id'=>$id));
            $msg = "Xóa thành công";
        }else{
            $msg = "Xóa không thành công";
        }
        $this->session->set_flashdata('message',$msg);
        redirect('tuvan/nhomda/ds');
    }
}
