<?php
class slide extends vnit{
    function __construct(){
        parent::__construct();
    }
    
    function ds(){
        $data['title'] = "Slide Trang chủ";
        $data['add'] = 'slide/add';
        $data['list'] = $this->db->result("SELECT * FROM slider ORDER BY ordering ASC");
        $this->load->templates('index',$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới Slide";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'slide/ds';
        $this->pre_message = '';
        $this->form_validation->set_rules('vdata[name]','Tên Slide','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            $this->vcache->delcache(ROOT.'site/cache/slide/');
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/slide/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                }else{                    
                    $result =  $this->upload->data();     
                    $filename = $result['file_name'];
                    $vdata = $this->request->post['vdata'];
                    $vdata['path'] = $filename;
                    if($this->db->insert('slider',$vdata)){
                        $id = $this->db->insert_id();
                        $this->session->set_flashdata('message','Lưu thành công');
                        $option =  $_POST['option'];
                        if($option == 'save'){
                           $url = 'slide/ds';
                        }else{
                            $url = 'slide/edit/'.$id;
                        }
                        redirect($url);
                    }
                }                    
            }else{
                $this->pre_message = "Vui lòng chọn hình ảnh Slide để tải lên";
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('add',$data);
    }
    
    function edit(){
        $data['title'] = "Cập nhật Slide";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'slide/ds';
        $id = $this->uri->segment(3);
        $data['rs'] = $this->db->row("SELECT * FROM slider WHERE id = $id");
        $this->pre_message = '';
        $this->form_validation->set_rules('vdata[name]','Tên Slide','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            $this->vcache->delcache(ROOT.'site/cache/slide/');
            $vdata = $this->request->post['vdata'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/slide/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                }else{
                    $result =  $this->upload->data();                         
                    $filename = $result['file_name'];
                    $vdata['path'] = $filename;
                }
            } 
           
            
            if($this->db->update('slider',$vdata,array('id'=>$id))){
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'slide/ds';
                }else{
                    $url = 'slide/edit/'.$id;
                }
                redirect($url);
            }
                               
    
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('edit',$data);
    }
    
    function del(){
        $this->vcache->delcache(ROOT.'site/cache/slide/');
        $id = $this->uri->segment(3);
        $rs = $this->db->row("SELECT * FROM slider WHERE id = $id");
        $path = ROOT.'data/slide/'.$rs->path;
        if($this->db->delete('slider',array('id'=>$id))){
            if(file_exists($path)){
                unlink($path);
            }
            $msg = "Xóa thành công";
        }else{
            $msg = 'Xóa không thành công';
        }
        $this->session->set_flashdata('message',$msg);
        redirect('slide/ds');
    }
    
    function save(){
        $id = $this->request->post['id'];
        for($i = 0; $i < sizeof($id); $i++){
            $vdata['ordering'] = $this->request->post['order_'.$id[$i]];
            $this->db->update('slider',$vdata,array('id'=>$id[$i]));
        }
    }
}