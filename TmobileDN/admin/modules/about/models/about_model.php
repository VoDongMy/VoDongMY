<?php
class about_model extends model{
    function __construct(){
        parent::__construct();
    }
    function get_about(){
        $sql = "
            SELECT 
                l.*, a.* 
            FROM language as l, about as a
            WHERE l.lang_id = a.lang_id
            AND a.id = 1
            ORDER BY l.lang_default DESC
        ";
        return $this->db->result($sql);
    }
}
