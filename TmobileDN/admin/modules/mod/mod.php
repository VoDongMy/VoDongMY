<?php
class mod extends vnit{
    protected $_templates;
    function __construct() {
        parent::__construct();
        $this->load->model('mod_model','mod');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->pre_message = "";
        $this->load->helper('xml');
    }
    
    function index(){
        redirect('mod/ds');
    }
    
    function ds(){
        $data['title'] = 'Quản lý Module';
        $data['add'] = 'mod/readadd';
        $data['delete'] = true;
        $field = ($this->request->get['f'] != '')?$this->request->get['f']:'m-id';
        $order = ($this->request->get['o'] != '')?$this->request->get['o']:'desc';
        
        $config['suffix'] = '/'.$field.'/'.$order;          
        $config['base_url'] = base_url().'mod/ds/';  
        $config['total_rows']   =  $this->mod->get_num_modules();
        $data['num'] = $config['total_rows'];
        $config['per_page']  =   20;
        $config['uri_segment'] = 3; 
        $this->pagination->initialize($config);   
        $data['list'] =   $this->mod->get_all_modules($config['per_page'],segment(4,'int'),str_replace('-','.',$field),$order);
        $data['pagination']    = $this->pagination->create_links();        
        $this->_templates['page'] = 'index';
        $this->load->templates($this->_templates['page'],$data);
    }
    function readadd(){
        $data['title'] = 'Thêm mới Modules';
        $data['save'] = true;
        $data['cancel'] = 'cpmodules/listmodules';
        $handle = opendir(ROOT.'site/mod');
        if(!$handle){
            $this->session->set_flashdata('notice','Đường dẫn tới thư mục Modules không đúng');
        }
        $data['handle'] = $handle;
        // Form validation
        $this->form_validation->set_rules('modules_name','Tên Module','required');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            redirect('mod/add/?mod='.$this->request->post['modules_name']);
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'readmodules';
        $this->load->templates($this->_templates['page'],$data);
    }    
    function add(){
        $data['title'] = 'Thêm mới Modules';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'mod/ds';
        $modules = $this->request->get['mod'];
        $data['module'] = $modules;
        $data['xml'] = simplexml_load_file(ROOT.'site/mod/'.$modules.'/'.$modules.'.xml'); 
        $data['position'] = simplexml_load_file(ROOT.'site/templates/templates.xml'); 
        $data['css'] = $this->mod->get_css();
        // Form validation
        foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[title]['.$lang->lang_id.']','Tiêu đề: '.$lang->lang_name,'required');
        $this->form_validation->set_rules('vdata[content]['.$lang->lang_id.']','','');
        endforeach;
        // Form validation
        $this->form_validation->set_rules('show_title','Hiển thị tiêu đề','required');
        $this->form_validation->set_rules('vdata[position]','Vị trí hiển thị','required');
        $this->form_validation->set_rules('vdata[params]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $id = post_var('id','int');
            $vdata = $this->request->post['vdata'];
            $param = $this->request->post['param'];
            $html = '';
            if(is_array($param)){
                foreach($param as $v=>$k){
                    $html .='&'.$v.'='.$k;
                }
                $html .='&test=true';
            }else{
                $html .='test=true';
            }
            $idata['attr'] = trim($html,'&');
            $param = $this->request->post['param'];
            $idata['show_title'] = $this->request->post['show_title'];
            $idata['position'] = $vdata['position'];
            $idata['published'] = $this->request->post['published'];
            $idata['module'] = $vdata['module'];
            $idata['html'] = $vdata['html'];
            $idata['params'] = $vdata['params'];
            if($this->db->insert('modules',$idata)){
                $id  = $this->db->insert_id();
                foreach($this->language as $val):
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['title'] = $vdata['title'][$val->lang_id];
                    $vdes['content'] = $vdata['content'][$val->lang_id];
                    $this->db->insert('modules_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $this->request->post['option'];
                if($option == 'save'){
                    $url = 'mod/ds';
                }else{
                    $url = 'mod/edit/'.$id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'add';
        $this->load->templates($this->_templates['page'],$data);
    }
    
    function edit(){
        $id = $this->uri->segment(3);
        $data['title'] = 'Cập nhật Modules';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'mod/ds';        
        $data['rs'] = $this->mod->get_mod_by_id($id);
        $data['list'] = $this->mod->get_list_mod_by_lang($id);
        $data['xml'] = simplexml_load_file(ROOT.'site/mod/'.$data['rs']->module.'/'.$data['rs']->module.'.xml');
        $data['position'] = simplexml_load_file(ROOT.'site/templates/templates.xml');
        $data['css'] = $this->mod->get_css($data['rs']->params);
        // Form validation
        foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[title]['.$lang->lang_id.']','Tiêu đề: '.$lang->lang_name,'required');
        $this->form_validation->set_rules('vdata[content]['.$lang->lang_id.']','','');
        endforeach;
        // Form validation
        $this->form_validation->set_rules('show_title','Hiển thị tiêu đề','required');
        $this->form_validation->set_rules('vdata[position]','Vị trí hiển thị','required');
        $this->form_validation->set_rules('vdata[params]','','');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $id = post_var('id','int');
            $vdata = $this->request->post['vdata'];
            $param = $this->request->post['param'];
            $idata['show_title'] = $this->request->post['show_title'];
            $idata['position'] = $vdata['position'];
            $idata['published'] = $this->request->post['published'];
            $idata['module'] = $vdata['module'];
            $idata['html'] = $vdata['html'];
            $idata['params'] = $vdata['params'];
            $html = '';
            if(is_array($param)){
                foreach($param as $v=>$k){
                    $html .='&'.$v.'='.$k;
                }
                $html .='&test=true';
            }else{
                $html .='test=true';
            }
             
            $idata['attr'] = trim($html,'&');
            if($this->db->update('modules',$idata,array('id'=>$id))){
                $this->db->delete('modules_des',array('id'=>$id));
                foreach($this->language as $val):
                    $vdes['id'] = $id;
                    $vdes['lang_id'] = $val->lang_id;
                    $vdes['title'] = $vdata['title'][$val->lang_id];
                    $vdes['content'] = $vdata['content'][$val->lang_id];
                    $this->db->insert('modules_des',$vdes);
                endforeach;
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $this->request->post['option'];
                if($option == 'save'){
                   $url = 'mod/ds';
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

    // Xoa nhieu ban ghi
    function dels(){
        if(!empty($_POST['ar_id']))
        {
            $page = $this->request->post['page'];
            $ar_id = $this->request->post['ar_id'];
            for($i = 0; $i < sizeof($ar_id); $i ++) {
                if ($ar_id[$i]){
                    if($this->db->delete('modules', array('id'=>$ar_id[$i]))){
                        $this->db->delete('modules_des',array('id'=>$ar_id[$i]));
                        $this->session->set_flashdata('message','Đã xóa thành công');
                    }else{
                        $this->session->set_flashdata('error','Xóa không thành công');
                    }
                }
            }
        }
        redirect('mod/ds/'.$page);
    }
    function save_order(){
        $id = $this->request->post['id'];
        for($i = 0 ; $i< sizeof($id);$i++){
            $menu['ordering'] = $this->request->post['order_'.$id[$i]];
            $this->db->update('modules',$menu,array('id'=>$id[$i]));
        }
    }      
}
