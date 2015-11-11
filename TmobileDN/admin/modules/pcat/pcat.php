<?php
class pcat extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('pcat_model','pcat');
        $this->pre_message = "";
        $this->load->helper('vimg');
    }

    /******************************Main cat************************************/
    function maincat(){
        $data['title'] = "Danh sách danh mục chính";
        $this->cache_menu();
        $data['add'] = 'pcat/addmaincat';
        $data['list'] = $this->pcat->get_all_maincat();
        $this->load->templates('maincat',$data);
    }
    
    function addmaincat(){
        $data['title'] = "Thêm mới danh mục chính";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'pcat/maincat';
        $data['list'] = $this->pcat->get_all_maincat();
        $this->form_validation->set_rules('vdata[name]','Danh mục','required');
        $this->form_validation->set_rules('vdata[ordering]','Sắp xếp','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            
            $vdata = $this->request->post['vdata'];
            $vdata['slugcat'] = vnit_change_title($vdata['name']);
            $vdata['is_home'] = $this->request->post['is_home'];
            $vdata['is_menu'] = $this->request->post['is_menu'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/pcat/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  $data['slug'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $vdata['icon'] = $result['file_name'];  
                    
                }                    
            }
            if($this->db->insert('pcat',$vdata)){
                $catid = $this->db->insert_id();
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'pcat/maincat';
                }else{
                    $url = 'pcat/editmaincat/'.$catid;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('addmaincat',$data);
    }
    
    function editmaincat(){
        $data['title'] = "Cập nhật danh mục chính";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'pcat/maincat';
        $id = $this->uri->segment(3);
        $data['list'] = $this->pcat->get_all_maincat();
        $data['rs'] = $this->db->row("SELECT * FROM pcat WHERE catid = $id");
        $this->form_validation->set_rules('vdata[name]','Danh mục','required');
        $this->form_validation->set_rules('vdata[ordering]','Sắp xếp','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            $catid = $this->request->post['catid'];
            $vdata = $this->request->post['vdata'];
            $vdata['slugcat'] = vnit_change_title($vdata['name']);
            $vdata['is_home'] = $this->request->post['is_home'];
            $vdata['is_menu'] = $this->request->post['is_menu'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/pcat/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  $vdata['slugcat'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $vdata['icon'] = $result['file_name'];  
                    
                }                    
            }
            if($this->db->update('pcat',$vdata,array('catid'=>$catid))){
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'pcat/maincat';
                }else{
                    $url = 'pcat/editmaincat/'.$catid;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('editmaincat',$data);
    }
    
    function save_order_maincat(){
        $id = $this->request->post['id'];
        for($i = 0; $i < sizeof($id); $i++){
            $vdata['ordering'] = $this->request->post['order_'.$id[$i]];
            $this->db->update('pcat',$vdata,array('catid'=>$id[$i]));
        }
    }
    
    function delmaincat(){
        $id = segment(3,'int');
        $total = $this->pcat->total_subcat($id);
        if($total > 0){
            $this->session->set_flashdata('message','Không thể xóa. Vẫn tồn tại danh mục con');
        }else{
            if($this->db->delete('pcat',array('catid'=>$id))){
                $this->session->set_flashdata('message','Xóa thành công');    
            }else{
                $this->session->set_flashdata('message','Xóa không thành công');
            }
        }
        redirect('pcat/maincat');
    }
    
    
    /*******************************Sub cat****************************************/
    
    function ds(){
        $id = $this->uri->segment(3);
        $row = $this->db->row("SElECT name FROM pcat WHERE catid = $id");
        $data['catid'] = $id;
        $data['title'] = "Danh mục thuộc: ".$row->name;
        $data['delete']  = true;
        $data['add'] = 'pcat/add/'.$id;
        $data['list'] = $this->pcat->get_list_cat($id);
        $this->load->templates('ds',$data);
    }
    
    function add(){
        $catid = $this->uri->segment(3);
        $maincat = $catid;
        $row = $this->db->row("SElECT name FROM pcat WHERE catid = $catid");
        $data['catid'] = $catid;
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] ='pcat/ds/'.$catid;
        $data['title'] = "Thêm danh mục trong: ".$row->name;
        $data['list'] = $this->pcat->get_all_maincat();
        $this->form_validation->set_rules('vdata[name]','Danh mục','required');
        $this->form_validation->set_rules('vdata[ordering]','Sắp xếp','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            
            $vdata = $this->request->post['vdata'];
            $vdata['slugcat'] = vnit_change_title($vdata['name']);
            $vdata['is_home'] = $this->request->post['is_home'];
            $vdata['is_menu'] = $this->request->post['is_menu'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/tam/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  $data['slug'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $vdata['icon'] = $result['file_name'];  
                    vnit_resize_image(ROOT.'data/tam/'.$vdata['icon'],ROOT.'data/pcat/150/'.$vdata['icon'],150,150,true);
                    vnit_resize_image(ROOT.'data/tam/'.$vdata['icon'],ROOT.'data/pcat/80/'.$vdata['icon'],80,80, true);
                    unlink(ROOT.'data/tam/'.$vdata['icon']);
                }                    
            }
            if($this->db->insert('pcat',$vdata)){
                $catid = $this->db->insert_id();
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'pcat/ds/'.$maincat;
                }else{
                    $url = 'pcat/edit/'.$catid;
                }
                redirect($url);
            }
        } 
        $data['message']  = $this->pre_message;
        $this->load->templates('add',$data);
    }
    
    function edit(){
        $catid = $this->uri->segment(3);
        $maincat = $catid;
        $row = $this->db->row("SElECT name FROM pcat WHERE catid = $catid");
        $id = $this->uri->segment(4);
        $data['catid'] = $catid;
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] ='pcat/ds/'.$catid;
        $data['title'] = "Thêm danh mục trong: ".$row->name;
        $data['list'] = $this->pcat->get_all_maincat();
        $data['rs'] = $this->db->row("SELECT * FROM pcat WHERE catid = $id");
        $this->form_validation->set_rules('vdata[name]','Danh mục','required');
        $this->form_validation->set_rules('vdata[ordering]','Sắp xếp','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            $catid = $this->request->post['catid'];
            $vdata = $this->request->post['vdata'];
            $vdata['slugcat'] = vnit_change_title($vdata['name']);
            $vdata['is_home'] = $this->request->post['is_home'];
            $vdata['is_menu'] = $this->request->post['is_menu'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/tam/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  $data['slug'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $vdata['icon'] = $result['file_name'];  
                    vnit_resize_image(ROOT.'data/tam/'.$vdata['icon'],ROOT.'data/pcat/150/'.$vdata['icon'],150,150,true);
                    vnit_resize_image(ROOT.'data/tam/'.$vdata['icon'],ROOT.'data/pcat/80/'.$vdata['icon'],80,80, true);
                    unlink(ROOT.'data/tam/'.$vdata['icon']);
                }                    
            }
            if($this->db->update('pcat',$vdata,array('catid'=>$catid))){
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'pcat/ds/'.$maincat;
                }else{
                    $url = 'pcat/edit/'.$catid;
                }
                redirect($url);
            }
        } 
        $data['message']  = $this->pre_message; 
        $this->load->templates('edit',$data);
    }
    
    function del(){
        $id = segment(4,'int');
        $catid = segment(3,'int');
        $total = $this->pcat->total_subcat($id);
        if($total > 0){
            $this->session->set_flashdata("message",'Không thể xóa. Còn tồn tại danh mục con');
        }else{
            $total_product1 = $this->pcat->total_product_cat2($id);
            $total_product2 = $this->pcat->total_product_cat3($id);
            if($total_product1 > 0 || $total_product2 > 0){
                $this->session->set_flashdata('message','Không thể xóa. Còn tồn tại sản phẩm trong danh mục này');
            }else{
                if($this->db->delete('pcat',array('catid'=>$id))){
                    $this->session->set_flashdata('message','Xóa thành công');
                }else{
                    $this->session->set_fashdata('message','Xóa không thành công');
                }
            }
        }
        redirect('pcat/ds/'.$catid);
    }
    
    /********************Write Menu********************************/
    
    function cache_menu(){
        $this->load->helper('file');
        $list_maincat = $this->pcat->get_maincat_is_menu();

            foreach($list_maincat as $cat):            
            $list = $this->pcat->get_list_cat($cat->catid);

            $str ='<div class="submenu">';
            $str .= "<ul>\n";   
                    foreach($list as $rs):         
                    $link2 = base_url_site().'san-pham/c'.$rs->catid.'/'.$rs->slugcat.'.html';
                    $str .="<li>\n";
                        $str .="<a href=\"".$link2."\">".$rs->name."</a>\n";
                    $str .="</li>\n";
            endforeach;
            $str .= "</ul>";
            $str .= "<div class=\"botm\"></div>";
            $str .= "</div>";            
            write_file(ROOT.'site/config/config_menu_c'.$cat->catid.'.html', $str);
            endforeach;

        
    }
}
