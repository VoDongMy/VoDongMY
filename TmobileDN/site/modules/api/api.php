<?php
class api extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('api_model','api');
        $this->user_id = $this->session->data['user_id'];
    }
    
    function addcart(){
        $vdata['fullname']  = $this->request->post['fullname'];
        $vdata['email'] = $this->request->post['email'];
        $vdata['phone'] = $this->request->post['phone'];
        $vdata['productname'] = $this->request->post['productname'];
        if($this->db->insert('checkout',$vdata)){
            $data['error'] = 0;
            $data['msg'] = "Gửi thông tin đặt mua thành công.";
        }else{
            $data['error'] = 1;
            $data['msg'] = "Quá trình đặt mua không thành công. Vui lòng thử lại";
        }
        echo json_encode($data);
    }
    
    function lang(){
        $lang = $this->request->get['lang'];
        $this->language->change_language($lang);
        $link = $this->request->get['link'];
        $link_new = decode($link,'key_lang');

        $data['link'] =  ($link != '')?$link_new:'';
        echo json_encode($data);
    }
}
