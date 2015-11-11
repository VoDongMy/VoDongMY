<?php
class dangky_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_dangky($limit, $offset){
         $sql ="
            SELECT * FROM dangky ORDER BY id DESC LIMIT $limit OFFSET $offset
         ";
         return $this->db->result($sql);
    }
    
    function get_num_dangky(){
        return $this->db->num_rows("SELECT id FROM dangky");
    }
    
    function get_all(){
        return $this->db->result("SELECT * FROM dangky ORDER BY id DESC");
    }
}