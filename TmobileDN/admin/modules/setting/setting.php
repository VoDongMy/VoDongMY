<?php
class setting extends vnit{
    function __construct(){
        parent::__construct();
        $this->load->model('setting_model','setting');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
    }
    
    function site(){
        $this->load->config('config_site');
        $data['title'] = "Cấu hình Website";
        $data['apply'] = true;
        $this->form_validation->set_rules('site_email','Email hệ thống','required');
        foreach($this->language as $lang):
        $this->form_validation->set_rules('vdata[site_name_'.$lang->lang_dir.']','Tên website','required');
        
        $this->form_validation->set_rules('vdata[site_close_msg_'.$lang->lang_dir.']','Nội dung đóng website','required');
        $this->form_validation->set_rules('vdata[site_des_'.$lang->lang_dir.']','Miêu tả','required');
        $this->form_validation->set_rules('vdata[site_keyword_'.$lang->lang_dir.']','Từ khóa','required');
        endforeach;
        if($this->form_validation->run() === FALSE){
            $this->pre_message = validation_errors();
        }else{
            
            $site_close = $this->request->post['site_close'];
   
            $site_email = $this->request->post['site_email'];
            $site_hotline = $this->request->post['site_hotline'];
            
            $vdata = $this->request->post['vdata'];
            $site_name_vi = $vdata['site_name_vi'];
            $site_email_vi = $site_email;
            $site_message_close_vi = $vdata['site_close_msg_vi'];
            $site_des_vi = $vdata['site_des_vi'];
            $site_keyword_vi = $vdata['site_keyword_vi'];
            
            $site_name_en = $vdata['site_name_en'];
            $site_email_en = $site_email;
            $site_message_close_en = $vdata['site_close_msg_en'];
            $site_des_en = $vdata['site_des_en'];
            $site_keyword_en = $vdata['site_keyword_en'];
            
            $str = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* File Config_site \n* Date: ".date('d/m/y H:i:s').".\n**/";
            $str .= "\n\$config['site_name_vi'] = '$site_name_vi';";  
            $str .= "\n\$config['site_email_vi'] = '$site_email_vi';";  
            $str .= "\n\$config['site_hotline_vi'] = '$site_hotline';";
            $str .= "\n\$config['site_close_vi'] = $site_close;";  
            $str .= "\n\$config['site_close_msg_vi'] = '$site_message_close_vi';";  
            $str .= "\n\$config['site_des_vi'] = '$site_des_vi';";  
            $str .= "\n\$config['site_keyword_vi'] = '$site_keyword_vi';"; 
            $str .= "\n\n/* End of file config_site*/";
            
            $str1 = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* File Config_site \n* Date: ".date('d/m/y H:i:s').".\n**/";
            $str1 .= "\n\$config['site_name_en'] = '$site_name_en';";  
            $str1 .= "\n\$config['site_email_en'] = '$site_email_en';";
            $str1 .= "\n\$config['site_hotline_en'] = '$site_hotline';";  
            $str1 .= "\n\$config['site_close_en'] = $site_close;";  
            $str1 .= "\n\$config['site_close_msg_en'] = '$site_message_close_en';";  
            $str1 .= "\n\$config['site_des_en'] = '$site_des_en';";  
            $str1 .= "\n\$config['site_keyword_en'] = '$site_keyword_en';"; 
            $str1 .= "\n\n/* End of file config_site*/";
            
            $this->load->helper('file');
            if(write_file(ROOT.'site/config/cache/vi/config_site.php', $str)){
                write_file(ROOT.'site/config/cache/en/config_site.php', $str1);
                $this->session->set_flashdata('message','Lưu thành công');
                redirect('setting/site') ;     
            }else{
                $this->pre_message =" Lưu không thành công";
            }
        }
        $data['message'] = $this->pre_message;
        $this->load->templates('site',$data);
    }
    
    function seo(){
        $this->load->config('config_seo');
        $data['title'] = "Seo Code";
        $data['save'] = true;
        $data['cf_yahoo'] = $this->config->item('cf_yahoo');
        $data['cf_alexa'] = $this->config->item('cf_alexa');
        $data['cf_google_webmaster'] = $this->config->item('cf_google_webmaster');
        $data['cf_google_analytics'] = $this->config->item('cf_google_analytics');
        $this->form_validation->set_rules('seocode','seocode','required');
        $this->form_validation->set_rules('cf_yahoo','Tên website','');
        $this->form_validation->set_rules('cf_alexa','Đóng website','');
        $this->form_validation->set_rules('cf_google_webmaster','Thông báo đóng website','');
        $this->form_validation->set_rules('cf_google_analytics','Miêu tả','');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            $str = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n* File config_seo \n* Date: ".date('d/m/y H:i:s').".\n**/";
            $cf_yahoo = $this->request->post['cf_yahoo'];
            $cf_alexa = $this->request->post['cf_alexa'];
            $cf_google_webmaster = $this->request->post['cf_google_webmaster'];
            $cf_google_analytics = $this->request->post['cf_google_analytics'];
            $str .= "\n\$config['cf_yahoo'] = '$cf_yahoo';";  
            $str .= "\n\$config['cf_alexa'] = '$cf_alexa';";  
            $str .= "\n\$config['cf_google_webmaster'] = '$cf_google_webmaster';";  
            $str .= "\n\$config['cf_google_analytics'] = '$cf_google_analytics';";  
            
            $str .= "\n\n/* End of file config_seo*/";   
            $this->load->helper('file');
            write_file(APPPATH.'config/config_seo.php', $str);    
            $this->session->set_flashdata('message','Lưu thành công');
            redirect('setting/seo') ;     
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'seo';
        $this->load->templates($this->_templates['page'],$data);
    }
}
