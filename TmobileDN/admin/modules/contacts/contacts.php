<?php
class contacts extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('contacts_model','contacts');
        $this->load->helper('vimg');
      //  $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
       
    }
    
    function index(){
        $data['title'] = "Quản lý Danh Bạ";
        $data['delete'] = true;
        $data['add'] = 'contacts/add';
        $field = (get_var('field'))?get_var('field'):'id';
        $order = (get_var('order'))?get_var('order'):'desc';
        $key_word = $_GET['key'];
        $id_office = get_var('id','int');
        $data['key'] = $key_word;
        $data['id_office'] = $id_office;
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
        $data['listoffice'] = $this->contacts->get_all_office();
        $config['base_url'] = base_url().'contacts/'.$this->uri->segment(2).'/';
        $config['suffix'] = '.html'.$str_get;
        $config['total_rows']   =  $this->contacts->get_num_contacts($key_word, $id_office);
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20; 
        $config['uri_segment'] = 3; 
        $this->load->library('pagination');
        $this->pagination->initialize($config);   
        $data['list'] =   $this->contacts->get_all_contacts($config['per_page'],segment(3,'int'),$field, $order,$key_word, $id_office);
        //var_dump($data['list']);
        $data['pagination']    = $this->pagination->create_links();
        $this->load->templates('index',$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'contacts';
       $data['listoffice'] = $this->contacts->get_all_office();
        // Form validation
        $this->form_validation->set_rules('vdata[name]','Họ và Tên','required');
        $this->form_validation->set_rules('vdata[title]','Chức vụ / Chức danh','');
        $this->form_validation->set_rules('vdata[phone_1]','Số điện thoại','');
        $this->form_validation->set_rules('vdata[ordering]', '', '');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $vdata['created_by'] = $_SESSION['user_id'];
            $vdata['datesave'] = time();
            $idata['attr'] .= 'show_intro='.$attr['show_intro'];
            $idata['attr'] .= '&show_author='.$attr['show_author'];
            $idata['attr'] .= '&show_date='.$attr['show_date'];
            $idata['attr'] .= '&show_editdate='.$attr['show_editdate'];
            $idata['attr'] .= '&show_print='.$attr['show_print'];
            $idata['attr'] .= '&show_email='.$attr['show_email'];
            $idata['attr'] .= '&show_comment='.$attr['show_comment'];
            $idata['attr'] .= '&show_other='.$attr['show_other'];            
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/contacts/default/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['name'].$vdata['title']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $vdata['images'] = $result['file_name'];  
                    vnit_resize_image(ROOT.'data/contacts/default/'.$vdata['images'],ROOT.'data/contacts/80/'.$vdata['images'],80,0,false);
                    vnit_resize_image(ROOT.'data/contacts/default/'.$vdata['images'],ROOT.'data/contacts/200/'.$vdata['images'],200,0,false);
                    vnit_resize_image(ROOT.'data/contacts/default/'.$vdata['images'],ROOT.'data/contacts/300/'.$vdata['images'],300,0,false);
                }                    
            }
            
            if($this->db->insert('contacts',$vdata)){ 
                $id = $this->db->insert_id();                
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'contacts/';
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
        $data['title'] = 'Cập nhật';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'contacts/'.$this->uri->segment(4).'/'.$str_get;
        $id = segment(3,'int');
        $data['listoffice'] = $this->contacts->get_all_office();
        $data['rs'] = $this->contacts->get_info_contacts($id);
        $data['list'] = $this->contacts->get_contacts_by_id($id);      
        // Form validation

        $this->form_validation->set_rules('vdata[name]','Họ và Tên','required');
        $this->form_validation->set_rules('vdata[title]','Chức vụ / Chức danh','');
        $this->form_validation->set_rules('vdata[phone_1]','Số điện thoại','');
        $this->form_validation->set_rules('vdata[ordering]', '', '');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $vdata['created_by'] = $_SESSION['user_id'];
            $vdata['modified'] = time();
            $idata['attr'] .= 'show_intro='.$attr['show_intro'];
            $idata['attr'] .= '&show_author='.$attr['show_author'];
            $idata['attr'] .= '&show_date='.$attr['show_date'];
            $idata['attr'] .= '&show_editdate='.$attr['show_editdate'];
            $idata['attr'] .= '&show_print='.$attr['show_print'];
            $idata['attr'] .= '&show_email='.$attr['show_email'];
            $idata['attr'] .= '&show_comment='.$attr['show_comment'];
            $idata['attr'] .= '&show_other='.$attr['show_other'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/contacts/default/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['name'].'-'.$vdata['title']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                       
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('error',$this->pre_message);
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $vdata['images'] = $result['file_name'];  
                    vnit_resize_image(ROOT.'data/contacts/default/'.$vdata['images'],ROOT.'data/contacts/80/'.$vdata['images'],80,0,false);
                    vnit_resize_image(ROOT.'data/contacts/default/'.$vdata['images'],ROOT.'data/contacts/200/'.$vdata['images'],200,0,false);
                    vnit_resize_image(ROOT.'data/contacts/default/'.$vdata['images'],ROOT.'data/contacts/300/'.$vdata['images'],300,0,false);
                }                    
            }
            
            if($this->db->update('contacts',$vdata,array('id'=>$id))){
                //$this->db->delete('news_des',array('id'=>$id));
              
                $this->session->set_flashdata('message','Lưu thành công');               
                $option =  $_POST['option'];
                if($option == 'save'){
                    $url = 'contacts';
                    //.$this->uri->segment(4).'/'.$str_get;
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
        $id = $_POST['id'];
        $msg = "";
        for($i = 0; $i < sizeof($id); $i++){
            $id = $id[$i];
            $rs = $this->contacts->get_info_contacts($id);
            if($rs->images != ''){
                if(file_exists(ROOT.'data/contacts/80/'.$rs->images)){
                    unlink(ROOT.'data/contacts/80/'.$rs->images);
                }
                if(file_exists(ROOT.'data/contacts/200/'.$rs->images)){
                    unlink(ROOT.'data/contacts/200/'.$rs->images);
                }
                if(file_exists(ROOT.'data/contacts/300/'.$rs->images)){
                    unlink(ROOT.'data/contacts/300/'.$rs->images);
                }
                if(file_exists(ROOT.'data/contacts/default/'.$rs->images)){
                    unlink(ROOT.'data/contacts/default/'.$rs->images);
                }
            }
            if($this->db->delete('0905.189269',array('id'=>$id))){
                //$this->db->delete('news_des',array('id'=>$id));
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
            $url ='contacts/'.$page.'/'.$str_get; 
        }else{
            $url ='contacts/'.$str_get; 
        }
        $rs = $this->contacts->get_info_contacts($id);
        if($rs->images != ''){
            if(file_exists(ROOT.'data/contacts/80/'.$rs->images)){
                unlink(ROOT.'data/contacts/80/'.$rs->images);
            }
            if(file_exists(ROOT.'data/contacts/200/'.$rs->images)){
                unlink(ROOT.'data/contacts/200/'.$rs->images);
            }
            if(file_exists(ROOT.'data/contacts/300/'.$rs->images)){
                unlink(ROOT.'data/contacts/300/'.$rs->images);
            }
            if(file_exists(ROOT.'data/contacts/default/'.$rs->images)){
                unlink(ROOT.'data/contacts/default/'.$rs->images);
            }
        }
        if($this->db->delete('contacts',array('id'=>$id))){
            //$this->db->delete('contacts',array('id'=>$id));
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
            $list = $this->contacts->get_list_channel($cat);
            foreach($list as $rs):
            $ds .= '<option value="'.$rs->channel_id.'">'.$rs->channel_name.'</option>';
            endforeach;
        }
        $data['ds'] = $ds;
        echo json_encode($data);
    }

}
