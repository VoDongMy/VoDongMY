<?php

class office extends vnit {

    protected $_templates;

    function __construct() {
        parent::__construct();
        $this->load->model('office_model', 'office');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
        $this->write_route();
    }

    function index() {

        $data['title'] = 'Quản lý Danh mục Cơ quan Tổ Chức';
        $data['add'] = 'office/add';
//        $data['delete'] = true;
        $data['list'] = $this->office->get_all_office();
        //var_dump($data['list']);
        $this->_templates['page'] = 'index';
        $this->load->templates($this->_templates['page'], $data);
    }

    function add() {
        $data['title'] = "Thêm mới danh mục Cơ Quan Tổ Chức";
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'category';
        $data['listmain'] = $this->office->get_all_office();
        // Form validation
        //foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[title]', 'Tên Cơ Quan Tổ Chức', 'required');
        $this->form_validation->set_rules('vdata[website]', 'Website', '');
        $this->form_validation->set_rules('vdata[address]', 'Địa chỉ', 'required');
        $this->form_validation->set_rules('vdata[phone_1]', 'Số điện thoại', '');

        //endforeach;
        $this->form_validation->set_rules('vdata[ordering]', '', '');
        $this->form_validation->set_rules('vdata[parent_id]', '', '');
        if ($this->form_validation->run() === FALSE) {
            $this->pre_message = validation_errors();
        } else {
            $vdata = $this->request->post['vdata'];
            if ($this->db->insert('office', $vdata)) {
                $id = $this->db->insert_id();
                $this->session->set_flashdata('message', 'Lưu thành công');
                $option = $_POST['option'];
                if ($option == 'save') {
                    $url = 'category';
                } else {
                    $url = 'office/edit/' . $id;
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'add';
        $this->load->templates($this->_templates['page'], $data);
    }

    function edit() {
        $data['title'] = 'Cập nhật danh mục Cơ Quan Tổ Chức';
        $data['save'] = true;
        $data['apply'] = true;
        $data['cancel'] = 'category';
        $id = segment(3, 'int');

        $data['rs'] = $this->office->get_office_id($id);
        $data['listmain'] = $this->office->get_all_office();
        $data['list'] = $this->office->get_office_id($id);
        // var_dump( $data['list'] );
        // Form validation
        //foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[title]', 'Tên Cơ Quan Tổ Chức', 'required');
        $this->form_validation->set_rules('vdata[website]', 'Website', '');
        $this->form_validation->set_rules('vdata[address]', 'Địa chỉ', 'required');
        $this->form_validation->set_rules('vdata[phone_1]', 'Số điện thoại', '');

        //endforeach;
        $this->form_validation->set_rules('vdata[ordering]', '', '');
        $this->form_validation->set_rules('vdata[parent_id]', '', '');
        if ($this->form_validation->run() === FALSE) {
            $this->pre_message = validation_errors();
        } else {
            $vdata = $this->request->post['vdata'];
//            var_dump($vdata);
//                        exit();
            if ($this->db->update('office', $vdata, array('id' => $id))) {
                //$this->db->delete('category_des', array('cat_id' => $id));, array('cat_id' => $id)
                $this->session->set_flashdata('message', 'Lưu thành công');
                $option = $_POST['option'];
                if ($option == 'save') {
                    $url = 'office';
                } else {
                    $url = uri_string();
                }
                redirect($url);
            }
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'edit';
        $this->load->templates($this->_templates['page'], $data);
    }

   function save_order(){
        $id = $_POST['id'];
        for($i = 0 ; $i< sizeof($id);$i++){
            $menu['ordering'] = $_POST['order_'.$id[$i]];
            $this->db->update('office',$menu,array('id'=>$id[$i]));
        }
    }

    // Xoa nhieu ban ghi
    function dels() {
        if (!empty($_POST['id'])) {
            $msg = "";
            $id = $_POST['id'];
            for ($i = 0; $i < sizeof($id); $i ++) {
                $id_office = $id[$i];
                if ($id_office) {
                    $total_cat = $this->office->get_num_office($id_office);
                    if ($total_cat == 0) { // Cho phep xoa
                        // Kiem tra so luong bai viet trong chuyen muc
                        $total_news = $this->office->get_num_contacts($id_office);
                        if ($total_news == 0) { // Xóa bai viet
                            if ($this->db->delete('category', array('cat_id' => $catid))) {
                                $this->db->delete('category_des', array('cat_id' => $catid));
                                $msg .='<div>Chuyên mục: ID <b>' . $catid . '</b> xóa thành công</div>';
                            } else {
                                $msg .='<div>Chuyên mục: ID <b>' . $catid . '</b> không xóa thành công</div>';
                            }
                        } else {
                            $msg .='<div>Chuyên mục: ID <b>' . $catid . '</b> vẫn còn bài viết. Không thể xóa</div>';
                        }
                    } else {
                        $msg .='<div>Chuyên mục: ID <b>' . $catid . '</b> vẫn còn chuyên mục con. Không thể xóa</div>';
                    }
                }
            }
        }
        $this->session->set_flashdata('message', $msg);
        redirect('office');
    }
    
    function del(){
        $msg = '';
        $id = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        $get = $this->request->get;
        $str = '';
        //var_dump($id);
        foreach($get as $val=>$keys){
            $str .= '&'.$val.'='.$keys;
        }
        $str = trim($str,'&');
        $str_get = (count($get))?'?'.$str:'';
        if($page != ''){
            $url ='office/'.$page.'/'.$str_get; 
        }else{
            $url ='office/'.$str_get; 
        }
        
        if($this->db->delete('office',array('id'=>$id))){
            //$this->db->delete('contacts',array('id'=>$id));
            $msg .="<p>Xóa bài viết ID <b>".$id."</b> thành công</p>";
        }else{
            $msg .="</p>Xóa bài viết ID <b>".$id."</b> không thành công</p>";
        }
      
        $this->session->set_flashdata('message',$msg);
        
            
        redirect($url);
    }

    function write_route() {
        $str = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* File Router_Contacts \n* Date: " . date('d/m/y H:i:s') . ".\n**/";
        foreach ($this->language as $row):
            $list = $this->office->get_list_cat_cache(0, $row->lang_id);
            /* $str .= "\n\$route['tin-tuc'] = 'news/index';";
              $str .= "\n\$route['tin-tuc/(:num)'] = 'news/index/$1';"; */

            foreach ($list as $rs):
                $list1 = $this->office->get_list_cat_cache($rs->cat_id, $row->lang_id);
                $slug = $rs->cat_slug;

                foreach ($list1 as $rs1):
                    $slug1 = $rs1->cat_slug;
                    $str .= "\n\$route['" . $slug . "/" . $slug1 . "'] = 'news/cat';";
                    $str .= "\n\$route['" . $slug . "/" . $slug1 . "/(:num)'] = 'news/cat/$1';";
                endforeach;
                $str .= "\n\$route['" . $slug . "'] = 'news/index';";
                $str .= "\n\$route['" . $slug . "/(:num)'] = 'news/index/$1';";
                $str .= "\n\$route['" . $slug . "/(:any)'] = 'news/detail/$1';";
            endforeach;
        endforeach;
        $this->load->helper('file');
        write_file(ROOT . 'site/config/router/router_tintuc.php', $str);
    }

}
