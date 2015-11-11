<?php
class hoidap extends vnit{
    protected $_templates;
    function __construct(){
        parent::__construct();
//        $this->load->config('config_hoidap');
        $this->load->model('hoidap_model','hoidap');
        $this->language = $this->lang->get_lang();
        $this->lang_default = $this->lang->lang_default();
    }
    function index(){
        $data['title'] = 'Liên hệ';
        $data['save'] = true;       
        $data['rs'] = $this->hoidap->get_contact();
        $data['list'] = $this->hoidap->get_contact_des();
        foreach($this->language as $lang):
            $this->form_validation->set_rules('vdata[title]['.$lang->lang_id.']','Tên liên hệ: '.$lang->lang_name,'required');
            $this->form_validation->set_rules('vdata[address]['.$lang->lang_id.']','Địa chỉ: '.$lang->lang_name,'required');
        endforeach;
        $this->form_validation->set_rules('vdata[phone]','Điện thoại','required');
        if($this->form_validation->run() == FALSE){
            $this->pre_message = validation_errors();
        }else{
            /*
            if($_FILES["userfile"]["size"] > 0){
                $config['upload_path'] = ROOT.'data/';
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
                        $ext = 'jpg';
                    }
                    $filenames = $result['raw_name'].'.'.$ext;
                    $idata['images'] = $filenames;

                } 
            }
            */
             $vdata = $this->request->post['vdata'];
             $idata['phone'] = $vdata['phone'];
             $idata['hotline'] = $vdata['hotline'];
             $idata['fax'] = $vdata['fax'];
             $idata['email'] = $vdata['email'];
             $idata['website'] = $vdata['website'];
             $idata['send_mail'] = $vdata['send_mail'];
             $idata['lat'] = $vdata['lat'];
             $idata['lng'] = $vdata['lng'];

             if($this->db->update('contact_row',$idata,array('id'=>1))){
             $this->db->delete('contact_des',array('id'=>1));
             foreach($this->language as $lang):
                    $vdes['id'] = 1;
                    $vdes['lang_id'] = $lang->lang_id; 
                    $vdes['title'] = $vdata['title'][$lang->lang_id];               
                    $vdes['address'] = $vdata['address'][$lang->lang_id];
                    $vdes['intro'] = $vdata['intro'][$lang->lang_id];
                    $this->db->insert('contact_des',$vdes);
                endforeach;
             }
             $this->session->set_flashdata('message','Lưu thành công');
             redirect(uri_string());
        }
        $data['message'] = $this->pre_message;
        $this->_templates['page'] = 'index';
        $this->load->templates($this->_templates['page'],$data);
    }

      
      function listhoidap(){
          $data['title'] = 'Danh sách liên hệ';
          $data['delete'] = true;
          $field = $this->uri->segment(4);
          $order = $this->uri->segment(5);   
          if($field =='' && $order == ''){
              $field = 'id';
              $order = 'desc';
          }       
          $config['suffix'] = '/'.$field.'/'.$order;            
          $config['base_url'] = base_url().'hoidap/listhoidap/';  
          $config['total_rows']   =  $this->hoidap->get_num_hoidap();
          $data['num'] = $config['total_rows'];
          $config['per_page']  =   20;
          $config['uri_segment'] = 3; 
          $this->pagination->initialize($config);   
          $data['list'] =   $this->hoidap->get_all_hoidap($config['per_page'],segment(3,'int'));
          $data['pagination']    = $this->pagination->create_links(); 
          $this->_templates['page'] = 'list';
          //var_dump($data['list'] );
          $this->load->templates($this->_templates['page'],$data);
      }
      
      function edit(){
          $data['title'] = 'Trả lời câu hỏi online';
          $data['save'] = true;
          $data['apply'] = true;
          $data['cancel'] = 'hoidap/listhoidap';
          $id = segment(3,'int');
          $page = segment(4,'int');
          $data['rs'] = $this->db->row("SELECT * FROM hoidap WHERE id=".$id);
          $this->db->query("UPDATE hoidap SET is_read = 1 WHERE id=".$id);
          $this->form_validation->set_rules('content','Nội dung','required');
          if($this->form_validation->run() === FALSE){
              $this->pre_message = validation_errors();
          }else{
              $message = $this->request->post['content'];
              $respondent = $this->request->post['respondent'];
              if($this->db->query("UPDATE hoidap SET answer = $message WHERE id=".$id)){
                  
                 $this->pre_message = "Gửi E-mail không thành công";
              }else{
                  $sql="UPDATE hoidap SET answer = '$message', respondent = '$respondent' WHERE id=".$id;
                  $this->db->query($sql);
                $this->session->set_flashdata('message','Lưu thành công');
                $option =  $this->request->post['option'];
                if($option == 'save'){
                   $url = 'hoidap/listhoidap/'.$page;
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
      
      // Xoa 1 ban ghi
      function del(){
          $id = segment(3,'int');
          $page = segment(4,'int');
             if($this->db->delete('hoidap', array('id'=>$id)))
                $this->session->set_flashdata('message','Đã xóa thành công');
            else $this->session->set_flashdata('message','Xóa không thành công');
          redirect('hoidap/listhoidap/'.$page);
      }
      // Xoa nhieu ban ghi
      function dels(){
            if(!empty($_POST['ar_id']))
            {
                $page = (int)$this->request->post['page'];
                $ar_id = $this->request->post['ar_id'];
                for($i = 0; $i < sizeof($ar_id); $i ++) {
                    if ($ar_id[$i]){
                        if($this->db->delete('hoidap', array('id'=>$ar_id[$i])))
                        $this->session->set_flashdata('message','Đã xóa thành công');
                        else $this->session->set_flashdata('error','Xóa không thành công');
                    }
                }
            }
            redirect('hoidap/listhoidap/'.$page);
      }      
  }
