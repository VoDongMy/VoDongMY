<?php
class category extends vnit{
    protected $_templates;
    function __construct(){
        parent::__construct();
        $this->load->model('category_model','category');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
    }
    
    function index(){
        
        $data['title'] = 'Quản lý Danh mục';
        $data['add'] = 'category/add';
        $data['delete'] = true;             
        $data['list'] =   $this->category->get_all_category();
        $this->_templates['page'] = 'index';
        $this->load->templates($this->_templates['page'],$data);
    }
    
    function add(){
        $data['title'] = "Thêm mới danh mục tin tức";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'category';
        $data['listmain'] = $this->category->get_all_category();
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[cat_name]['.$lang->lang_id.']','Danh mục '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[cat_des]['.$lang->lang_id.']','','');
            $this->form_validation->set_rules('vdata[cat_keyword]['.$lang->lang_id.']','','');
        endforeach;
        $this->form_validation->set_rules('vdata[cat_order]','','');
        $this->form_validation->set_rules('vdata[parent_id]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['cat_order'] = $vdata['cat_order'];
            $idata['published'] = $vdata['published'];
            $idata['parent_id'] = $vdata['parent_id'];
            if($this->db->insert('category',$idata)){
                $cat_id  = $this->db->insert_id();
                foreach($this->language as $val):
                    $vdes['cat_id'] = $cat_id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['cat_name'] = $vdata['cat_name'][$val->lang_id];
                    $vdes['cat_slug'] = vnit_change_title($vdata['cat_name'][$val->lang_id]);
                    $vdes['cat_des'] = $vdata['cat_des'][$val->lang_id];
                    $vdes['cat_keyword'] = $vdata['cat_keyword'][$val->lang_id];
                    $this->db->insert('category_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'category';
                }else{
                    $url = 'category/edit/'.$cat_id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'add';
        $this->load->templates($this->_templates['page'],$data);
    }
    
    function edit(){
        $data['title'] = 'Cập nhật danh mục tin tức';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'category';
        $id = segment(3,'int');
        $data['rs'] = $this->category->get_cat_by_id($id);
        $data['listmain'] = $this->category->get_all_category();
        $data['list'] = $this->category->get_category_by_lang($id);
        // Form validation
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[cat_name]['.$lang->lang_id.']','Danh mục '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[cat_des]['.$lang->lang_id.']','','');
            $this->form_validation->set_rules('vdata[cat_keyword]['.$lang->lang_id.']','','');
        endforeach;
        $this->form_validation->set_rules('vdata[cat_order]','','');
        $this->form_validation->set_rules('vdata[parent_id]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $idata['cat_order'] = $vdata['cat_order'];
            $idata['published'] = $vdata['published'];
            $idata['parent_id'] = $vdata['parent_id'];
            if($this->db->update('category',$idata,array('cat_id'=>$id))){
                foreach($this->language as $val):
                    $vdes['cat_name'] = $vdata['cat_name'][$val->lang_id];
                    $vdes['cat_slug'] = vnit_change_title($vdata['cat_name'][$val->lang_id]);
                    $vdes['cat_des'] = $vdata['cat_des'][$val->lang_id];
                    $vdes['cat_keyword'] = $vdata['cat_keyword'][$val->lang_id];
                    $this->db->update('category_des',$vdes,array('lang_id'=>$val->lang_id,'cat_id'=>$id));
                endforeach;
                
                //Update news
                //$vnews['cat_slug'] = $vdata['cat_slug'];
                //$this->db->update('news',$vnews,array('catid'=>$id));
                
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $_POST['option'];
                if($option == 'save'){
                   $url = 'category';
                }else{
                    $url = uri_string();
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'edit';
        $this->load->templates($this->_templates['page'],$data);
    }
    
    function save_order(){
        $id = $_POST['id'];
        for($i = 0 ; $i< sizeof($id);$i++){
            $menu['cat_order'] = $_POST['order_'.$id[$i]];
            $this->db->update('category',$menu,array('cat_id'=>$id[$i]));
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
                            if($this->db->delete('category',array('cat_id'=>$catid))){
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
        redirect('category');
    }
}
