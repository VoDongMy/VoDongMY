<?php
class product extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('product_model','product');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
    }
    
    function ds(){
        $data['title'] = "Danh sách sản phẩm";
        $data['add'] = 'product/add';
        $cat_id = get_var('cat_id','int');
        $key_word = get_var('key');
        $field = (get_var('f'))?get_var('f'):'t.id';
        $order = (get_var('o'))?get_var('o'):'desc';
        $get = $this->request->get;
        $str = '';
        foreach($get as $val=>$keys){
            $str .= '&'.$val.'='.$keys;
        }
        $str = trim($str,'&');
        $str_get = (count($get))?'?'.$str:'';
        $data['cat_id'] = $cat_id;
        $data['keyword'] = $key_word;
        $data['dscat'] = $this->product->get_all_cat();
        $config['base_url'] = base_url().'product/ds';
        $config['suffix'] = '.html'.$str_get;
        $config['total_rows']   =  $this->product->get_num_product($key_word, $cat_id);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   10; 
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->product->get_all_product($config['per_page'],segment(3,'int'),$key_word, $cat_id, $field ,$order);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('product/ds',$data,'file');
    }
    
    function add(){
        $data['title'] = "Thêm mới sản phẩm";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'product/ds';
        $data['dscat'] = $this->product->get_all_cat();
        // Form validation
        //foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[title]['.$this->language[0]->lang_id.']','Tên sản phẩm '.$this->language[0]->lang_name,'required');
            $this->form_validation->set_rules('vdata[gioithieu]['.$this->language[0]->lang_id.']','thanhphan','');
        //endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/tam/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['title'][$this->lang_default]);  
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('message',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $filename = $result['file_name'];
                    $ext = end(explode('.',$filename));
                    if($ext == 'jpeg'){
                        $ext = 'png';
                    }
                    $filenames = $result['raw_name'].'.'.$ext;
                    $idata['images'] = $filenames;
                    $folder_tam = ROOT.'data/tam/'.$filename;
                    $folder_200 = ROOT.'data/product/200/'.$filename;
                    $folder_500 = ROOT.'data/product/500/'.$filename;
                    $this->load->helper('vimg');
					@copy($folder_tam,$folder_500);
                    vnit_resize_image($folder_500,$folder_200,200,200,true);
                    unlink($folder_tam);
                } 
            }
            $idata['cat_id'] = $vdata['cat_id'];
            $idata['is_new'] = (int)$vdata['is_new'];
            $idata['published'] = $vdata['published'];
            $idata['size'] = $vdata['size'];
            if($this->db->insert('product',$idata)){
                $id = $this->db->insert_id();
                for($i = 0; $i < sizeof($this->language); $i++){
                    $val1 = $this->language[0];
                    $val = $this->language[$i];
                    $cat = $this->product->get_slug_cat($vdata['cat_id'],$val->lang_id);
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['title'] = ($vdata['title'][$val->lang_id] != '')?$vdata['title'][$val->lang_id]:$vdata['title'][$val1->lang_id];
                    $vdes['main_id'] = $cat->cat_id;
                    $vdes['slugcat'] = $cat->slug;
                    $vdes['slug'] = vnit_change_title($vdes['title']);
                    $vdes['price'] = str_replace(',','',$vdata['price'][$val->lang_id]);
                    $vdes['gioithieu'] = ($vdata['gioithieu'][$val->lang_id] != '')?$vdata['gioithieu'][$val->lang_id]:$vdata['gioithieu'][$val1->lang_id];
                    $this->db->insert('product_des',$vdes);
                }
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                $otp = $this->request->post['otp'];
                if($option == 'save'){
                   $url = 'product/ds';
                }else{
                    $url = 'product/edit/'.$id;
                }
                redirect($url);
            }else{
                $this->pre_message = "Lưu không thành công";
            }
            
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('product/add',$data,'file');
    }
    
    function edit(){
        $id = segment(3,'int');
        $data['title'] = "Cập nhật sản phẩm";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'product/ds';
        $data['dscat'] = $this->product->get_all_cat();
        $data['rs'] = $this->db->row("SELECT * FROM product WHERE id = $id");
        $data['list'] = $this->product->get_product_($id);
        // Form validation
        //foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[title]['.$this->language[0]->lang_id.']','Tên sản phẩm '.$this->language[0]->lang_name,'required');
            $this->form_validation->set_rules('vdata[gioithieu]['.$this->language[0]->lang_id.']','thanhphan','');
        //endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/tam/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['title'][$this->lang_default]);  
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('message',$this->pre_message);
                    
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $filename = $result['file_name'];
                    $ext = end(explode('.',$filename));
                    if($ext == 'jpeg'){
                        $ext = 'png';
                    }
                    $filenames = $result['raw_name'].'.'.$ext;
                    $idata['images'] = $filenames;
                    
                    $folder_tam = ROOT.'data/tam/'.$filename;
                    $folder_200 = ROOT.'data/product/200/'.$filename;
                    $folder_500 = ROOT.'data/product/500/'.$filename;
                    $this->load->helper('vimg');
					@copy($folder_tam,$folder_500);
                    vnit_resize_image($folder_500,$folder_200,220,0,true);
                    unlink($folder_tam);
                } 
            }
            $idata['cat_id'] = $vdata['cat_id'];
            $idata['is_new'] = (int)$vdata['is_new'];
            $idata['published'] = $vdata['published'];
            $idata['size'] = $vdata['size'];
            if($this->db->update('product',$idata,array('id'=>$id))){
                $this->db->delete('product_des',array('id'=>$id));
                for($i = 0; $i < sizeof($this->language); $i++){
                    $val1 = $this->language[0];
                    $val = $this->language[$i];
                    $cat = $this->product->get_slug_cat($vdata['cat_id'],$val->lang_id);
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['title'] = ($vdata['title'][$val->lang_id] != '')?$vdata['title'][$val->lang_id]:$vdata['title'][$val1->lang_id];
                    $vdes['main_id'] = $cat->cat_id;
                    $vdes['slugcat'] = $cat->slug;
                    $vdes['slug'] = vnit_change_title($vdes['title']);
                    $vdes['price'] = str_replace(',','',$vdata['price'][$val->lang_id]);
                    $vdes['gioithieu'] = ($vdata['gioithieu'][$val->lang_id] != '')?$vdata['gioithieu'][$val->lang_id]:$vdata['gioithieu'][$val1->lang_id];
                    $this->db->insert('product_des',$vdes);
                }

                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                $otp = $this->request->post['otp'];
                if($option == 'save'){
                   $url = site_url('product/ds/'.$otp['page_']).'/?cat_id='.$otp['cat_id_'].'&key='.$otp['key_'];
                }else{
                    $url = site_url('product/edit/'.$id.'/'.$otp['page_']).'/?cat_id='.$otp['cat_id_'].'&key='.$otp['key_'];
                }
                redirect($url);
            }else{
                $this->pre_message = "Lưu không thành công";
            }
            
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('product/edit',$data,'file');
    }
    
    function del(){
        $id = segment(3,'int');
        $row = $this->db->row("SELECT images FROM product WHERE id = $id");
        $path = $row->images;
        if($this->db->delete('product',array('id'=>$id))){
            $this->db->delete('product_des',array('id'=>$id));
            $path_200 = ROOT.'data/product/200/'.$path;
            if(file_exists($path_200)){
                unlink($path_200);
            }
            $path_500 = ROOT.'data/product/500/'.$path;
            if(file_exists($path_500)){
                unlink($path_500);
            }
            $msg = "Xóa thành công";
        }else{
            $msg ="Xóa không thành công";
        }
        $this->session->set_flashdata('message',$msg);
        redirect('product/ds/'.(int)$this->uri->segment(4).'/?cat_id='.$this->request->post['cat_id'].'&key='.$this->request->post['key']);
    }
    
    function save_order(){
        $id = $_POST['id'];
        for($i = 0 ; $i< sizeof($id);$i++){
            $menu['ordering'] = $_POST['order_'.$id[$i]];
            $this->db->update('product',$menu,array('id'=>$id[$i]));
        }
    }
}
