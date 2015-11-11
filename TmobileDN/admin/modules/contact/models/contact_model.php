<?php
class contact_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_contact($limit, $offset){
        $sql = "
            SELECT 
                *
            FROM
                contact
            ORDER BY is_read ASC, contactid DESC
            LIMIT $limit OFFSET $offset
        ";
        return $this->db->result($sql);
    }
    
    function get_num_contact(){
        return $this->db->num_rows("SELECT contactid FROM contact ");
    }
    
    function get_contact(){
        return $this->db->row("SELECT * FROM contact_row WHERE id = 1");
    }
    
    function get_contact_des(){
        $sql = "
            SELECT
                l.*, d.*
            From 
                language as l, contact_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = 1
            ORDER BY lang_default DESC
        ";
        return $this->db->result($sql);
    }
}
