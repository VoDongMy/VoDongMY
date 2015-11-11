<?php
class contact_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_contact(){
        return $this->db->row("SELECT * FROM contact_row WHERE id = 1");
    }
    
    function get_l_contact($lang_id){
        $sql = "
            SELECT * FROM contact_des WHERE lang_id = $lang_id AND id = 1
        ";
        return $this->db->row($sql);
    }
}
