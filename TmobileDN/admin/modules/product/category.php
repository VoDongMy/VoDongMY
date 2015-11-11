<?php
class category extends vnit{
    protected $_templates;
    function __construct(){
        parent::__construct();
        $this->load->model('category_model','category');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
        $this->write_route();
        $this->write_menu();
    }
    
    function index(){
        
        $data['title'] = 'Quản lý danh mục sản phẩm';
        $data['add'] = 'product/category/add';
        $data['delete'] = true;             
        $data['list'] =   $this->category->get_all_category();
        $this->_templates['page'] = 'category/index';
        $this->load->templates($this->_templates['page'],$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới danh mục";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'product/category';
        $data['listmain'] = $this->category->get_all_category();
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[name]['.$lang->lang_id.']','Tên danh mục Tuor '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[des]['.$lang->lang_id.']','','');
            $this->form_validation->set_rules('vdata[keyword]['.$lang->lang_id.']','','');
        endforeach;
        $this->form_validation->set_rules('vdata[cat_order]','','');
        $this->form_validation->set_rules('vdata[parent_id]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['ordering'] = $vdata['ordering'];
            $idata['published'] = $vdata['published'];
            $idata['parent_id'] = $vdata['parent_id'];
            if($this->db->insert('cat',$idata)){
                $cat_id  = $this->db->insert_id();
                foreach($this->language as $val):
                    $vdes['cat_id'] = $cat_id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['name'] = $vdata['name'][$val->lang_id];
                    $vdes['slug'] = vnit_change_title($vdata['name'][$val->lang_id]);
                    $vdes['des'] = $vdata['des'][$val->lang_id];
                    $vdes['keyword'] = $vdata['keyword'][$val->lang_id];
                    $this->db->insert('cat_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'product/category';
                }else{
                    $url = 'product/category/edit/'.$cat_id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'category/add';
        $this->load->templates($this->_templates['page'],$data);
    }
    
    function edit(){
        $data['title'] = 'Cập nhật danh mục';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'product/category';
        $id = segment(4,'int');
        $data['rs'] = $this->category->get_cat_by_id($id);
        $data['listmain'] = $this->category->get_all_category();
        $data['list'] = $this->category->get_category_by_lang($id);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[name]['.$lang->lang_id.']','Tên danh mục Tout '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[des]['.$lang->lang_id.']','','');
            $this->form_validation->set_rules('vdata[keyword]['.$lang->lang_id.']','','');
        endforeach;
        $this->form_validation->set_rules('vdata[ordering]','','');
        $this->form_validation->set_rules('vdata[parent_id]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/pcat/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['name'][1].' menu');  
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                if ( !$this->upload->do_upload()){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('message',$this->pre_message);
                    
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $idata['images'] = $result['file_name'];
                } 
            }
            if($_FILES["userfile1"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/pcat/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '10000';
                $config['file_name'] =  vnit_change_title($vdata['name'][1].' main');  
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                     
                if ( !$this->upload->do_upload('userfile1')){
                    $this->pre_message =  $this->upload->display_errors();
                    $this->session->set_flashdata('message',$this->pre_message);
                    
                    redirect(uri_string());
                }else{                         
                    $result =  $this->upload->data();
                    $idata['images_main'] = $result['file_name'];
                } 
            }
            $idata['cot'] = $vdata['cot'];
            $idata['ordering'] = $vdata['ordering'];
            $idata['published'] = $vdata['published'];
            $idata['parent_id'] = $vdata['parent_id'];
            if($this->db->update('cat',$idata,array('cat_id'=>$id))){
                $this->db->delete('cat_des',array('cat_id'=>$id)) ;
                foreach($this->language as $val):
                    $vdes['cat_id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['name'] = $vdata['name'][$val->lang_id];
                    $vdes['slug'] = vnit_change_title($vdata['name'][$val->lang_id]);
                    $vdes['des'] = $vdata['des'][$val->lang_id];
                    $vdes['keyword'] = $vdata['keyword'][$val->lang_id];
                    $this->db->insert('cat_des',$vdes);
                    
                    // Cap mat slugcat product_dess
                    $vp['slugcat'] = $vdes['slug'];
                    $this->db->update('product_des',$vp,array('main_id'=>$id,'lang_id'=>$val->lang_id));
                endforeach;
                
                //Update news
                //$vnews['cat_slug'] = $vdata['cat_slug'];
                //$this->db->update('news',$vnews,array('catid'=>$id));
                
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'product/category';
                }else{
                    $url = uri_string();
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'category/edit';
        $this->load->templates($this->_templates['page'],$data,'file');
    }
    
    function save_order(){
        $id = $_POST['id'];
        for($i = 0 ; $i< sizeof($id);$i++){
            $menu['ordering'] = $_POST['order_'.$id[$i]];
            $this->db->update('cat',$menu,array('cat_id'=>$id[$i]));
        }
    }

    // Xoa nhieu ban ghi
    function dels(){
        if(!empty($_POST['ar_id']))
        {
            $msg = "";
            $ar_id = $_POST['ar_id'];
            for($i = 0; $i < sizeof($ar_id); $i ++) {
                $catid = $ar_id[$i];
                if ($catid){
                    $total_cat = $this->category->get_num_cat($catid);
                    if($total_cat == 0){ // Cho phep xoa
                        // Kiem tra so luong bai viet trong chuyen muc
                        $total_news = $this->category->get_num_new($catid);
                        if($total_news == 0){ // Xóa bai viet
                            if($this->db->delete('cat',array('cat_id'=>$catid))){
                                $this->db->delete('cat_des',array('cat_id'=>$catid));
                                $msg .='<div>Chuyên mục: ID <b>'.$catid.'</b> xóa thành công</div>';
                            }else{
                                $msg .='<div>Chuyên mục: ID <b>'.$catid.'</b> không xóa thành công</div>';
                            }
                        }else{
                            $msg .='<div>Chuyên mục: ID <b>'.$catid.'</b> vẫn còn bài viết. Không thể xóa</div>';    
                        }
                    }else{
                        $msg .='<div>Chuyên mục: ID <b>'.$catid.'</b> vẫn còn chuyên mục con. Không thể xóa</div>';
                    }
                }
            }
        }
        $this->session->set_flashdata('message',$msg);
        redirect('product/category');
    }
    
    function write_route(){
        $str = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* File Router_Tour \n* Date: ".date('d/m/y H:i:s').".\n**/";
        $list = $this->category->get_list_cat(0);
        //$str .= "\n\$route['ve-may-bay'] = 'bay/index';";
        //$str .= "\n\$route['ve-may-bay/(:num)'] = 'bay/index/$1';";
        foreach($list as $rs):
            $list1 = $this->category->get_list_cat($rs->cat_id);
            $slug =  $rs->slug;
            $str .= "\n\$route['san-pham/".$slug."'] = 'product/cat';";
            $str .= "\n\$route['san-pham/".$slug."/(:num)'] = 'product/cat/$1';";
         
            foreach($list1 as $rs1):
                $slug1 = $rs1->slug;
                $str .= "\n\$route['san-pham/".$slug."/".$slug1."'] = 'product/cat1';";
                $str .= "\n\$route['san-pham/".$slug."/".$slug1."/(:num)'] = 'product/cat1/$1';";
            endforeach;
            
        endforeach;
        $str .= "\n\$route['san-pham/(:any)'] = 'product/detail/$1';";
        //$str .= "\n\$route['ve-may-bay/dat-ve'] = 'bay/book';";
        //$str .= "\n\$route['ve-may-bay/(:any)'] = 'bay/detail/$1';";
        
        $this->load->helper('file');
        write_file(ROOT.'site/config/router/router_product.php', $str);
    }
    
    function write_menu(){
        $str = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* File Menu \n* Date: ".date('d/m/y H:i:s').".\n**/";    
        $list = $this->category->get_list_cat(0);
        $ar_id = '';
        foreach($list as $rs):
            $ar_id .=$rs->cat_id.',';
        endforeach;
        $ar_id = trim($ar_id,',');
        $str .= "\n\$config['ar_menu'] = array($ar_id);";
        $this->load->helper('file');
        write_file(ROOT.'site/config/menu.php', $str);
    }
}
