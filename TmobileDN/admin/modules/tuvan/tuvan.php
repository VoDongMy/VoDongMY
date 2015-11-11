<?php
class tuvan extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('tuvan_model','tuvan');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
    }
    
    function dscat(){
        $data['title'] = "Danh mục câu hỏi";
        $data['add'] = 'tuvan/addcat';
        $data['list'] = $this->tuvan->get_all_cat();
        $this->load->templates('dscat',$data);
    }
    
    function addcat(){
        $data['title'] = 'Thêm mới Danh mục câu hỏi';
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/dscat';
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[name1]['.$lang->lang_id.']','Danh mục1 '.$lang->lang_name,'required');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['ordering'] = $vdata['ordering'];
            if($this->db->insert('thcat',$idata)){
                $catid  = $this->db->insert_id();
                foreach($this->language as $val):
                    $vdes['catid'] = $catid;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['name1'] = $vdata['name1'][$val->lang_id];
                    $this->db->insert('thcat_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'tuvan/dscat';
                }else{
                    $url = 'tuvan/editcat/'.$catid;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('addcat',$data);
    }
    
    function editcat(){
        $catid = segment(3,'int');
        $data['title'] = 'Cập nhật Danh mục câu hỏi';
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/dscat';
        $data['rs'] = $this->tuvan->get_row_dm($catid);
        $data['list'] = $this->tuvan->get_list_row_dm($catid);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[name1]['.$lang->lang_id.']','Danh mục1 '.$lang->lang_name,'required');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['ordering'] = $vdata['ordering'];
            if($this->db->update('thcat',$idata,array('catid'=>$catid))){
                $this->db->delete('thcat_des',array('catid'=>$catid));
                foreach($this->language as $val):
                    $vdes['catid'] = $catid;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['name1'] = $vdata['name1'][$val->lang_id];
                    $this->db->insert('thcat_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'tuvan/dscat';
                }else{
                    $url = 'tuvan/editcat/'.$catid;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('editcat',$data);
    }
    
    function delcat(){
        $id = $this->uri->segment(3);
        if($this->db->delete('thcat',array('catid'=>$id))){
            $this->db->delete('thcat_des',array('catid'=>$id));
            $this->db->delete('th',array('catid'=>$id));
            $this->session->set_flashdata('message',"Xóa thành công");
        }else{
            $this->session->set_flashdata('message',"Xóa không thành công");
        }
        redirect('tuvan/dscat');
    }
    
    
    function ds(){
        $data['title'] = "Công dụng";
        $data['add'] = 'tuvan/add';
        $catid = segment(3,'int');
        $dscat = $this->tuvan->get_all_cat();
        $data['dscat'] = $dscat;
        $data['catid'] = ($catid != 0)?$catid:$dscat[0]->catid;
        $data['list'] = $this->tuvan->get_all_tuvan($data['catid']);
        $this->load->templates('ds',$data);
    }
    
    function add(){
        $data['title'] = "Thêm Công dụng";
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/ds';
        $data['dscat'] = $this->tuvan->get_all_cat();
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[ten]['.$lang->lang_id.']','Tiêu đề '.$lang->lang_name,'required');
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
                   $url = 'tuvan/ds/'.$vdata['catid'];
                }else{
                    $url = 'tuvan/edit/'.$id.'/'.$vdata['catid'];
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('add',$data);
    }
    
    
    function edit(){
        $id = segment(3,'int');
        $data['title'] = "Cập nhật Công dụng";
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/ds';
        $data['dscat'] = $this->tuvan->get_all_cat();
        $data['rs'] = $this->tuvan->get_row_tuvan($id);
        $data['list'] = $this->tuvan->get_list_row_tuvan($id);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[ten]['.$lang->lang_id.']','Tiêu đề '.$lang->lang_name,'required');
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
                   $url = 'tuvan/ds/'.$vdata['catid'];
                }else{
                    $url = 'tuvan/edit/'.$id.'/'.$vdata['catid'];
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('edit',$data);
    }
    
    function del(){
        $id = segment(3,'int');
        $catid = segment(4,'int');
        if($this->db->delete('th',array('id'=>$id))){
            $this->db->delete('th_des',array('id'=>$id));
            $msg = "Xóa thành công";
        }else{
            $msg = "Xóa không thành công";
        }
        $this->session->set_flashdata('message',$msg);
        redirect('tuvan/ds/'.$catid);
    }
}