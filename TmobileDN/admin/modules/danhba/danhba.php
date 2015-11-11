<?php
class danhba extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('danhba_model','danhba');
        //$this->load->model('news_model','news');
        $this->load->helper('vimg');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
    }
    
    function ds(){
        $data['title'] = "Quản lý danh bạ";
        $data['delete'] = true;
        $data['add'] = 'danhba/add';
        $field = (get_var('field'))?get_var('field'):'id';
        $order = (get_var('order'))?get_var('order'):'desc';
        $key_word = $_GET['key'];
        $catid = get_var('catid','int');
        $data['key'] = $key_word;
        $data['catid'] = $catid;
        $data['field'] = $field;
        $data['order'] = $order;
        $data['page'] = get_var('page','int');
        $get = $this->request->get;
        $str = '';
        foreach($get as $val=>$keys){
            $str .= '&'.$val.'='.$keys;
        }
        $str = trim($str,'&');
        $str_get = (count($get))?'?'.$str:'';
        $data['listcategory'] = $this->danhba->get_all_category();
        $config['base_url'] = base_url().'danhba/'.$this->uri->segment(2).'/';
        $config['suffix'] = '.html'.$str_get;
        $config['total_rows']   =  $this->danhba->get_num_news($key_word, $catid);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20; 
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->danhba->get_all_news($config['per_page'],segment(3,'int'),$field, $order,$key_word, $catid);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('index',$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới bài viết";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'news/ds';
        $data['listcategory'] = $this->danhba->get_all_category();
        // Form validation
        //foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[title]['.$lang[0]->lang_id.']','Tiêu đề: '.$lang[0]->lang_name,'required');
        $this->form_validation->set_rules('vdata[fulltext]['.$lang[0]->lang_id.']','','');
        $this->form_validation->set_rules('vdata[introtext]['.$lang[0]->lang_id.']','','');
        //endforeach;
        $this->form_validation->set_rules('vdata[cat_id]','','');
        $this->form_validation->set_rules('vdata[published]','','');
        $this->form_validation->set_rules('vdata[metakey]','','');
        $this->form_validation->set_rules('vdata[metadesc]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $id = get_var('id','int');
            $vdata = $this->request->post['vdata'];
            $attr = $_POST['attr'];
            $idata['cat_id'] = $vdata['cat_id'];
            $idata['published'] = $vdata['published'];
            $idata['noibat'] = $this->request->post['noibat'];
            $idata['created_by'] = $_SESSION['user_id'];
            $idata['created'] = time();
            $idata['attr'] ='';
            $idata['attr'] .= 'show_intro='.$attr['show_intro'];
            $idata['attr'] .= '&show_author='.$attr['show_author'];
            $idata['attr'] .= '&show_date='.$attr['show_date'];
            $idata['attr'] .= '&show_editdate='.$attr['show_editdate'];
            $idata['attr'] .= '&show_print='.$attr['show_print'];
            $idata['attr'] .= '&show_email='.$attr['show_email'];
            $idata['attr'] .= '&show_comment='.$attr['show_comment'];
            $idata['attr'] .= '&show_other='.$attr['show_other'];
            
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/news/default/';
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
                    vnit_resize_image(ROOT.'data/news/default/'.$idata['images'],ROOT.'data/news/80/'.$idata['images'],80,0,false);
                    vnit_resize_image(ROOT.'data/news/default/'.$idata['images'],ROOT.'data/news/200/'.$idata['images'],200,0,false);
                    vnit_resize_image(ROOT.'data/news/default/'.$idata['images'],ROOT.'data/news/300/'.$idata['images'],300,0,false);
                }                    
            }
            
            if($this->db->insert('news',$idata)){ 
                $id = $this->db->insert_id();
                for($i = 0; $i < sizeof($this->language); $i++){
                    $val1 = $this->language[0];
                    $val = $this->language[$i];
                    $vdes['id'] = $id;
                    $vdes['cat_id'] = $idata['cat_id'];
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['title'] = ($vdata['title'][$val->lang_id] != '')?$vdata['title'][$val->lang_id]:$vdata['title'][$val1->lang_id];
                    $vdes['slug'] = vnit_change_title($vdes['title']);
                    $vdes['cat_slug'] = $this->danhba->get_cat_by_id($vdata['cat_id'],$val->lang_id)->cat_slug;
                    $vdes['main_slug'] = $this->danhba->main_cat_slug($vdata['cat_id'],$val->lang_id);
                    $vdes['main_id'] = $this->danhba->main_cat_id($vdata['cat_id'],$val->lang_id);
                    $vdes['introtext'] = ($vdata['introtext'][$val->lang_id] != '')?$vdata['introtext'][$val->lang_id]:$vdata['introtext'][$val1->lang_id];                       
                    $vdes['fulltext'] = ($vdata['fulltext'][$val->lang_id] != '')?$vdata['fulltext'][$val->lang_id]:$vdata['fulltext'][$val1->lang_id];
                    $this->db->insert('news_des',$vdes);
                }
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'news/ds';
                }else{
                    $url = 'news/edit/'.$id;
                }
                redirect($url);
            }
        }

        $data['message'] = $this->pre_message;
        $this->load->templates('add',$data);
    }
    
    function edit(){
        $get = $this->request->get;
        $str = '';
        foreach($get as $val=>$keys){
            $str .= '&'.$val.'='.$keys;
        }
        $str = trim($str,'&');
        $str_get = (count($get))?'?'.$str:'';
        $data['title'] = 'Cập nhật bài viết';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'news/ds/'.$this->uri->segment(4).'/'.$str_get;
        $id = segment(3,'int');
        $data['listcategory'] = $this->danhba->get_all_category();
        $data['rs'] = $this->danhba->get_info_new($id);
        $data['list'] = $this->danhba->get_news_by_id($id);
        $row = $this->db->row("SELECT * FROM category WHERE cat_id=".$data['rs']->catid);
        if($row->parent_id == 0){
            $cat = $row->cat_id;
        }else{
            $cat = $row->parent_id;
        }
        $data['channel'] = $this->danhba->get_list_channel($cat);        
        // Form validation
        foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[title]['.$lang->lang_id.']','Tiêu đề: '.$lang->lang_name,'required');
        $this->form_validation->set_rules('vdata[fulltext]['.$lang->lang_id.']','','');
        $this->form_validation->set_rules('vdata[introtext]['.$lang->lang_id.']','','');
        endforeach;
        $this->form_validation->set_rules('vdata[cat_id]','','');
        $this->form_validation->set_rules('vdata[published]','','');
        $this->form_validation->set_rules('vdata[metakey]','','');
        $this->form_validation->set_rules('vdata[metadesc]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $attr = $_POST['attr'];
            $idata['cat_id'] = $vdata['cat_id'];
            $idata['published'] = $vdata['published'];
            $idata['noibat'] = $this->request->post['noibat'];
            $idata['created_by'] = $_SESSION['user_id'];
            $idata['modified'] = time();
            $idata['attr'] ='';
            $idata['attr'] .= 'show_intro='.$attr['show_intro'];
            $idata['attr'] .= '&show_author='.$attr['show_author'];
            $idata['attr'] .= '&show_date='.$attr['show_date'];
            $idata['attr'] .= '&show_editdate='.$attr['show_editdate'];
            $idata['attr'] .= '&show_print='.$attr['show_print'];
            $idata['attr'] .= '&show_email='.$attr['show_email'];
            $idata['attr'] .= '&show_comment='.$attr['show_comment'];
            $idata['attr'] .= '&show_other='.$attr['show_other'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/news/default/';
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
                    vnit_resize_image(ROOT.'data/news/default/'.$idata['images'],ROOT.'data/news/80/'.$idata['images'],80,0,false);
                    vnit_resize_image(ROOT.'data/news/default/'.$idata['images'],ROOT.'data/news/200/'.$idata['images'],200,0,false);
                    vnit_resize_image(ROOT.'data/news/default/'.$idata['images'],ROOT.'data/news/300/'.$idata['images'],300,0,false);
                }                    
            }
            
            if($this->db->update('news',$idata,array('id'=>$id))){
                $this->db->delete('news_des',array('id'=>$id));
                for($i = 0; $i < sizeof($this->language); $i++){
                    $val1 = $this->language[0];
                    $val = $this->language[$i];
                    $vdes['id'] = $id;
                    $vdes['cat_id'] = $idata['cat_id'];
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['title'] = ($vdata['title'][$val->lang_id] != '')?$vdata['title'][$val->lang_id]:$vdata['title'][$val1->lang_id];
                    $vdes['slug'] = vnit_change_title($vdes['title']);
                    $vdes['cat_slug'] = $this->danhba->get_cat_by_id($vdata['cat_id'],$val->lang_id)->cat_slug;
                    $vdes['main_slug'] = $this->danhba->main_cat_slug($vdata['cat_id'],$val->lang_id);
                    $vdes['main_id'] = $this->danhba->main_cat_id($vdata['cat_id'],$val->lang_id);
                    $vdes['introtext'] = ($vdata['introtext'][$val->lang_id] != '')?$vdata['introtext'][$val->lang_id]:$vdata['introtext'][$val1->lang_id];                       
                    $vdes['fulltext'] = ($vdata['fulltext'][$val->lang_id] != '')?$vdata['fulltext'][$val->lang_id]:$vdata['fulltext'][$val1->lang_id];
                    $this->db->insert('news_des',$vdes);
                }
                $this->session->set_flashdata('message','Lưu thành công');               
                $option =  $_POST['option'];
                if($option == 'save'){
                    $url = 'news/ds/'.$this->uri->segment(4).'/'.$str_get;
                }else{
                    $url = uri_string();
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('edit',$data);
    }  
    
    
    function dels(){
        $ar_id = $_POST['ar_id'];
        $msg = "";
        for($i = 0; $i < sizeof($ar_id); $i++){
            $id = $ar_id[$i];
            $rs = $this->danhba->get_info_new($id);
            if($rs->images != ''){
                if(file_exists(ROOT.'data/news/80/'.$rs->images)){
                    unlink(ROOT.'data/news/80/'.$rs->images);
                }
                if(file_exists(ROOT.'data/news/200/'.$rs->images)){
                    unlink(ROOT.'data/news/200/'.$rs->images);
                }
                if(file_exists(ROOT.'data/news/300/'.$rs->images)){
                    unlink(ROOT.'data/news/300/'.$rs->images);
                }
                if(file_exists(ROOT.'data/news/default/'.$rs->images)){
                    unlink(ROOT.'data/news/default/'.$rs->images);
                }
            }
            if($this->db->delete('news',array('id'=>$id))){
                $this->db->delete('news_des',array('id'=>$id));
                $msg .="<p>Xóa bài viết ID <b>".$id."</b> thành công</p>";
            }else{
                $msg .="</p>Xóa bài viết ID <b>".$id."</b> không thành công</p>";
            }
        }
        $this->session->set_flashdata('message',$msg);
        redirect(get_post_page());
    }
    
    function del(){
        $msg = '';
        $id = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        $get = $this->request->get;
        $str = '';
        foreach($get as $val=>$keys){
            $str .= '&'.$val.'='.$keys;
        }
        $str = trim($str,'&');
        $str_get = (count($get))?'?'.$str:'';
        if($page != ''){
            $url ='news/ds/'.$page.'/'.$str_get; 
        }else{
            $url ='news/ds/'.$str_get; 
        }
        $rs = $this->danhba->get_info_new($id);
        if($rs->images != ''){
            if(file_exists(ROOT.'data/news/80/'.$rs->images)){
                unlink(ROOT.'data/news/80/'.$rs->images);
            }
            if(file_exists(ROOT.'data/news/200/'.$rs->images)){
                unlink(ROOT.'data/news/200/'.$rs->images);
            }
            if(file_exists(ROOT.'data/news/300/'.$rs->images)){
                unlink(ROOT.'data/news/300/'.$rs->images);
            }
            if(file_exists(ROOT.'data/news/default/'.$rs->images)){
                unlink(ROOT.'data/news/default/'.$rs->images);
            }
        }
        if($this->db->delete('news',array('id'=>$id))){
            $this->db->delete('news_des',array('id'=>$id));
            $msg .="<p>Xóa bài viết ID <b>".$id."</b> thành công</p>";
        }else{
            $msg .="</p>Xóa bài viết ID <b>".$id."</b> không thành công</p>";
        }
      
        $this->session->set_flashdata('message',$msg);
        
            
        redirect($url);
    }
    
    function get_channel(){
        $catid = $this->request->get['catid'];
        $row = $this->db->row("SELECT * FROM category WHERE cat_id=".$catid);
        $ds = '<option value="0">Chọn kênh tin</option>';
        if($catid != 0){
            if($row->parent_id == 0){
                $cat = $row->cat_id;
            }else{
                $cat = $row->parent_id;
            }
            $list = $this->danhba->get_list_channel($cat);
            foreach($list as $rs):
            $ds .= '<option value="'.$rs->channel_id.'">'.$rs->channel_name.'</option>';
            endforeach;
        }
        $data['ds'] = $ds;
        echo json_encode($data);
    }

}
