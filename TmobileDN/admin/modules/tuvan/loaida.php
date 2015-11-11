<?php
class loaida extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('tuvan_model','tuvan');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
    }
    
    function ds(){
        $data['title'] = "Loại da";
        $data['add'] = 'tuvan/loaida/add';
        $data['list'] = $this->tuvan->get_all_loaida();
        $this->load->templates('loaida/ds',$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới loại da";
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/loaida/ds';
        $data['dscat'] = $this->tuvan->get_loai_da(1,2);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[tenda]['.$lang->lang_id.']','Tên loại da '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[noidung]['.$lang->lang_id.']','','');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['th_id'] = $vdata['th_id'];
            if($this->db->insert('loaida',$idata)){
                $id_loaida  = $this->db->insert_id();
                foreach($this->language as $val):
                    $vdes['id_loaida'] = $id_loaida;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['tenda'] = $vdata['tenda'][$val->lang_id];
                    $vdes['noidung'] = $vdata['noidung'][$val->lang_id];
                    $this->db->insert('loaida_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'tuvan/loaida/ds';
                }else{
                    $url = 'tuvan/loaida/edit/'.$id_loaida;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('loaida/add',$data);
    }
    
    function edit(){
        $data['title'] = "Cập nhật loại da";
        $data['save'] = true;
        $data['apply'] = true;
        $data['back'] = 'tuvan/loaida/ds';
        $data['dscat'] = $this->tuvan->get_loai_da(1,2);
        $id_loaida = segment(4,'int');
        $data['rs'] = $this->tuvan->get_id_loaida($id_loaida);
        $data['list'] = $this->tuvan->get_loaida_lang($id_loaida);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[tenda]['.$lang->lang_id.']','Tên loại da '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[noidung]['.$lang->lang_id.']','','');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['th_id'] = $vdata['th_id'];
            if($this->db->update('loaida',$idata,array('id_loaida'=>$id_loaida))){
                $this->db->delete('loaida_des',array('id_loaida'=>$id_loaida));
                foreach($this->language as $val):
                    $vdes['id_loaida'] = $id_loaida;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['tenda'] = $vdata['tenda'][$val->lang_id];
                    $vdes['noidung'] = $vdata['noidung'][$val->lang_id];
                    $this->db->insert('loaida_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'tuvan/loaida/ds';
                }else{
                    $url = 'tuvan/loaida/edit/'.$id_loaida;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('loaida/edit',$data);
    }
    
    function del(){
        $id = segment(4,'int');
        if($this->db->delete('loaida',array('id_loaida'=>$id))){
            $this->db->delete('loaida_des',array('id_loaida'=>$id));
            $msg = "Xóa thành công";
        }else{
            $msg = "Xóa không thành công";
        }
        $this->session->set_flashdata('message',$msg);
        redirect('tuvan/loaida/ds');
    }
}
