<?php
class nhomda_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_loai_da($lang_id, $id){
        $sql = "
            SELECT th.* , d.*
            FROM
                th as th, th_des as d
            WHERE th.id = d.id
            AND d.lang_id = $lang_id
            AND th.catid = $id

        ";
        return $this->db->result($sql);
    }
    
    function get_nhomda($id){
        $sql = "
            SELECT l.* , d.*
            FROM
                language as l, th_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = $id
            ORDER BY l.lang_default DESC
        "; 
        return $this->db->result($sql);
    }
}
