<?php
class khachhang_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_khachhang($limit, $offset){
        $sql = "
            SELECT 
                k.*, d.*
            FROM
                khachhang as k, khachhang_des as d
            WHERE k.id = d.id
            AND d.lang_id = ".$this->lang_default;

        $sql .=" ORDER BY k.id DESC LIMIT $limit OFFSET $offset";
        return $this->db->result($sql);
    }
    
    function get_num_khachhang(){
        $sql = "
            SELECT 
                k.*, d.*
            FROM
                khachhang as k, khachhang_des as d
            WHERE k.id = d.id
            AND d.lang_id = ".$this->lang_default;
        return $this->db->num_rows($sql);
    }
    

    function item_local($local_id){
        return $this->db->row("SELECT * FROM khachhang WHERE id = $local_id");
    }
    
    function get_des_local($local_id){
        $sql = "
            SELECT 
                l.*, d.*
            FROM 
                language as l, khachhang_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = $local_id
            ORDER BY l.lang_default DESC
        ";
        return $this->db->result($sql);
    }
    
    /*******Upload****/
    function get_all_img_tam(){
        $session_id = $this->session->sessionid();
        return $this->db->result("SELECT * FROM tam1 WHERE session_id = '$session_id' ORDER BY time ASC");
    }
    
    function get_all_img($id){
        return $this->db->result("SELECT * FROM khachhang_img WHERE id = $id ORDER BY img_id ASC");
    }    
}
