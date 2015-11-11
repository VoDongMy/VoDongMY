<?php
class contact extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->config('config_contact');
        $this->lang_active = $this->session->data['lang'];
        $this->lang_id = $this->language->lang_id();
        $this->lang_url = $this->language->lang_url();
        //$this->load->language('contact',$this->lang_active);
        $this->load->model('contact_model','contact');
        $this->pre_message = "";
    }
    
    function index(){
        $data['title'] = lang('lienhe');
        $data['rs'] = $this->contact->get_contact();
        $data['val'] = $this->contact->get_l_contact($this->lang_id);
        $this->form_validation->set_rules('vdata[fullname]','Họ tên','required');
        $this->form_validation->set_rules('vdata[email]','Email','required');
        $this->form_validation->set_rules('vdata[title]','Tiêu đề','required');
        $this->form_validation->set_rules('vdata[content]','Nội dung','required');
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            $vdata = $this->request->post['vdata'];
            $vdata['datesend'] = time();
            if($this->db->insert('contact',$vdata)){
                $send = $data['rs']->send_mail;
                if($send == 1){
                    $this->load->helper('mail');
                    $to = $data['rs']->email;
					
                    $name = $vdata['fullname'];
                    $form = $vdata['email'];
                    $subject = $vdata['title'];
                    $message = "<h3>Nội dung liên hệ:</h3></br>";
                    $message .= $vdata['content'];
                    sendmail($name,$form,$to,$subject,$message);
                }
                $this->session->set_flashdata('message',lang('guithanhcong'));
                redirect(uri_string());
            }else{
                $this->pre_message = lang('guikhongthanhcong');
            }
        }
        $data['message']   = $this->pre_message;
        $this->load->templates('index',$data);
    }
    
    function map_jada(){
        $this->load->library('gmap');
        $this->gmap->width = '700px';
        $this->gmap->height = '350px';
        $this->gmap->GoogleMapAPI(); 
        $this->gmap->setMapType('map'); 
        $name = $this->config->item('contact_name');
        $address = $this->config->item('contact_address');
        $phone = $this->config->item('contact_phone');
        $email = $this->config->item('contact_email');
        $this->gmap->addMarkerByAddress($address,$name,"<b>".$name."</b><br />".$address."<br />Điện thoại: ".$phone." <br />Email: ".$email);
        $data['headerjs'] = $this->gmap->getHeaderJS();
        $data['headermap'] = $this->gmap->getMapJS();
        $data['onload'] = $this->gmap->printOnLoad();
        $data['map'] = $this->gmap->printMap();
        $data['sidebar'] = $this->gmap->printSidebar();
        $data['message']   = $this->pre_message;
        $this->load->templates('map',$data,'pop');
    }
}
