<?php
class khachhang extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('khachhang_model','khachhang');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
        $this->load->helper('vimg');
    }
    
    function ds(){
        $data['title'] = "Khách hàng";
        $data['add'] = 'khachhang/add';
        $config['base_url'] = base_url().'khachhang/ds/';
        $config['suffix'] = '.html'.$str_get;
        $config['total_rows']   =  $this->khachhang->get_num_khachhang();
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20; 
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->khachhang->get_all_khachhang($config['per_page'],segment(3,'int'));
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('ds',$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới khách hàng";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'khachhang/ds';
        $data['img'] = $this->khachhang->get_all_img_tam();
        // Form validation
        //foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[name]['.$this->language[0]->lang_id.']','Tên khách hàng: '.$this->language[0]->lang_name,'required');
            $this->form_validation->set_rules('vdata[gioithieu]['.$this->language[0]->lang_id.']','','');
            
        //endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['published'] = 1;
            $idata['link'] = $vdata['link'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/tam/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['title'][$this->lang_default]);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $idata['images'] = $result['file_name']; 
                    
                    vnit_resize_image(ROOT.'data/tam/'.$idata['images'],ROOT.'data/logo/100/'.$idata['images'],100,100,true);
                    vnit_resize_image(ROOT.'data/tam/'.$idata['images'],ROOT.'data/logo/250/'.$idata['images'],250,250,true);
                }
                unlink(ROOT.'data/tam/'.$idata['images']);                    
            }
            if($this->db->insert('khachhang',$idata)){
                $id = $this->db->insert_id();
                foreach($this->language as $lang):
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $lang->lang_id; 
                    $vdes['name'] = $vdata['name'][$lang->lang_id];
                    $vdes['slug'] = vnit_change_title($vdata['name'][$lang->lang_id]);                
                    $vdes['gioithieu'] = $vdata['gioithieu'][$lang->lang_id];
                    $this->db->insert('khachhang_des',$vdes);
                endforeach;

                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'khachhang/ds';
                }else{
                    $url = 'khachhang/edit/'.$id;
                }
                redirect($url);
            }
        }   
        $data['message'] = $this->pre_message;
        $this->load->templates('add',$data,'file');
    }
    
    function edit(){
        $local_id = segment(3,'int');
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'khachhang/ds';
        $data['title'] = "Cập nhật khách hàng";
        $data['rs'] = $this->khachhang->item_local($local_id);
        $data['list'] = $this->khachhang->get_des_local($local_id);
        $data['img'] = $this->khachhang->get_all_img($local_id);
        // Form validation
        //foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[name]['.$this->language[0]->lang_id.']','Tên khách hàng: '.$this->language[0]->lang_name,'required');
            $this->form_validation->set_rules('vdata[gioithieu]['.$this->language[0]->lang_id.']','','');
        //endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['published'] = 1;
            $idata['link'] = $vdata['link'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/tam/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['title'][$this->lang_default]);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $idata['images'] = $result['file_name'];  
                    vnit_resize_image(ROOT.'data/tam/'.$idata['images'],ROOT.'data/logo/100/'.$idata['images'],100,100,true);
                    vnit_resize_image(ROOT.'data/tam/'.$idata['images'],ROOT.'data/logo/250/'.$idata['images'],250,250,true);
                    unlink(ROOT.'data/tam/'.$idata['images']);
                }                    
            }
            if($this->db->update('khachhang',$idata,array('id'=>$local_id))){
                $this->db->delete('khachhang_des',array('id'=>$local_id));
                foreach($this->language as $lang):
                    $vdes['id'] = $local_id;
                    $vdes['lang_id'] = $lang->lang_id; 
                    $vdes['name'] = $vdata['name'][$lang->lang_id];                
                    $vdes['slug'] = vnit_change_title($vdata['name'][$lang->lang_id]);
                    $vdes['gioithieu'] = $vdata['gioithieu'][$lang->lang_id];
                    $this->db->insert('khachhang_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'khachhang/ds';
                }else{
                    $url = 'khachhang/edit/'.$local_id;
                }
                redirect($url);
            }
        }   
        $data['message'] = $this->pre_message; 
        $this->load->templates('edit',$data,'file');
    }
    
    function del(){
        $id = segment(3,'int');
        $page = segment(4,'int');
        $rs = $this->db->row("SELECT images FROM khachhang WHERE id = $id");
        $img = $rs->images;
        if($this->db->delete('khachhang',array('id'=>$id))){
            $this->db->delete('khachhang_des',array('id'=>$id));
            $this->db->delete('khachhang_img',array('id'=>$id));
            if(file_exists(ROOT.'data/khachhang/100/'.$img)){
                unlink(ROOT.'data/khachhang/100/'.$img);
            }
            if(file_exists(ROOT.'data/khachhang/250/'.$img)){
                unlink(ROOT.'data/khachhang/250/'.$img);
            }
            $msg = "Xóa thành công";
        }else{
            $msg = "Xóa không thành công";
        }
        $this->session->set_flashdata('message',$msg);
        redirect('khachhang/ds/'.$page);
    }         
    
    // Tai anh moi len
    function uploader(){
        $session_id = $this->uri->segment(3);
        $dir = ROOT.'data/tam/';
        $dir_admin = 'data/tam/';
        $size=$_FILES['Filedata']['size'];
        if($size>204857600)
        {
                $data['error'] = 1;
                $data['msg'] = "File quá lớn. Không thể tải lên";
        }            
        $filename = stripslashes($_FILES['Filedata']['name']);
        $i = strrpos($filename,".");
        if (!$i) { return ""; }
        $l = strlen($filename) - $i;
        $extension = substr($filename,$i+1,$l);                 
        $extension = strtolower($extension); 
        $file_name = str_replace($extension,'',$filename);
        $file_name = vnit_change_title($file_name);
        $filename = $dir.$file_name.'-'.time().'.'.$extension;
        $file_ext = $file_name.'-'.time().'.'.$extension;
        if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $filename)) {
            $vdata['session_id'] = $session_id;
            $vdata['path'] = $file_ext;
            $vdata['time'] = time();
            $this->db->insert('tam1',$vdata);
            $data['id'] = $this->db->insert_id();
            $data['error'] = 0;
            $data['filename'] = $file_ext;
            $data['msg'] = "Tải file lên thành công";
        } else {
            $data['error'] = 1;
            $data['msg'] = "Tải file lên không thành công";
        }
        echo json_encode($data);
    }
    
    function del_img_tam(){
        $img_id = $this->request->post['id'];
        $rs = $this->db->row("SELECT * FROM tam1 WHERE id = $img_id");
        $path = $rs->path;
        if($this->db->delete('tam1',array('id'=>$img_id))){
            unlink(ROOT.'data/tam/'.$path);
        }
    }
    
   // Tai anh cap nhat
    function uploader_edit(){
        $id = $this->uri->segment(3);
        $dir = ROOT.'data/tam/';
        $dir_admin = 'data/tam/';
        $size=$_FILES['Filedata']['size'];
        if($size>204857600)
        {
                $data['error'] = 1;
                $data['msg'] = "File quá lớn. Không thể tải lên";
        }            
        $filename = stripslashes($_FILES['Filedata']['name']);
        $i = strrpos($filename,".");
        if (!$i) { return ""; }
        $l = strlen($filename) - $i;
        $extension = substr($filename,$i+1,$l);                 
        $extension = strtolower($extension); 
        $file_name = str_replace($extension,'',$filename);
        $file_name = vnit_change_title($file_name);
        $filename = $dir.$file_name.'-'.time().'.'.$extension;
        $file_ext = $file_name.'-'.time().'.'.$extension;
        if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $filename)) {
            $vdata['id'] = $id;
            $vdata['path'] = $file_ext;
            $this->db->insert('khachhang_img',$vdata);
            $this->load->helper('vimg');
            $folder_tam = ROOT.'data/tam/'.$file_ext;
            $folder_150 = ROOT.'data/khachhang/150/'.$file_ext;
            $folder_500 = ROOT.'data/khachhang/500/'.$file_ext;
            $this->load->helper('vimg');
            vnit_resize_image($folder_tam,$folder_150,150,0,false);
            vnit_resize_image($folder_tam,$folder_500,500,0,false);
            
            $data['id'] = $this->db->insert_id();
            $data['error'] = 0;
            $data['filename'] = $file_ext;
            $data['msg'] = "Tải file lên thành công";
        } else {
            $data['error'] = 1;
            $data['msg'] = "Tải file lên không thành công";
        }
        echo json_encode($data);
    }
    
    function del_img(){
        $img_id = $this->request->post['id'];
        $rs = $this->db->row("SELECT * FROM khachhang_img WHERE img_id = $img_id");
        $path = $rs->path;
        if($this->db->delete('khachhang_img',array('img_id'=>$img_id))){
            unlink(ROOT.'data/khachhang/150/'.$path);
            unlink(ROOT.'data/khachhang/500/'.$path);
        }
    }
}
