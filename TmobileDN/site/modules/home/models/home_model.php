<?php
class home_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_about($lang_id){
        return $this->db->row("SELECT small FROM about WHERE id = 1 AND lang_id = $lang_id");
    }
    
    function get_sp_new($lang_id){
        $sql = "
            SELECT *
            FROM product as p, product_des as d
            WHERE p.id = d.id
            AND d.lang_id = $lang_id
            AND p.published = 1
            ORDER BY p.id DESC LIMIT 12
        ";
        return $this->db->result($sql);
    }
    
    function get_sp_noibat($lang_id){
        $sql = "
            SELECT *
            FROM product as p, product_des as d
            WHERE p.id = d.id
            AND d.lang_id = $lang_id
            AND p.published = 1
            
            ORDER BY p.id DESC LIMIT 8
        ";
        return $this->db->result($sql);
    }
}
