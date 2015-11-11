<?php
class contacts_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    public function get_all_office($parent_id = 0){
        $sql = "
            SELECT 
                *
            FROM 
                office
            WHERE 
             parent_id = $parent_id
            ORDER BY ordering ASC
            
        ";
        return $this->db->result($sql);
    }
    
    public function get_office_id($id){
        return $this->db->row("SELECT * FROM office WHERE id = $id ORDER BY ordering ASC");
    }
    
    function get_category_by_lang($cat_id){
        $sql = "
            SELECT 
                l.*, c.*
            FROM 
                language as l, category_des as c
            WHERE l.lang_id = c.lang_id
            AND c.cat_id = $cat_id
            ORDER BY l.lang_default DESC
        ";
        return $this->db->result($sql);
    }
    
    function get_num_new($cat_id){
        return $this->db->num_rows("SELECT id FROM news WHERE catid = $cat_id");
    }
    
    function get_num_cat($catid){
        return $this->db->num_rows("SELECT cat_id FROM category WHERE parent_id = $catid");
    }
    
    function get_list_cat(){
        $sql = "
            SELECT 
                c.*, d.*
            FROM 
                category as c, category_des as d
            WHERE c.cat_id = d.cat_id
            AND lang_id = ".$this->lang_default."
            AND parent_id = 0
            ORDER BY c.cat_order ASC
        ";
        return $this->db->result($sql);
    }
    
    function get_list_cat_cache($parent_id = 0, $lang_id){
        $sql = "
            SELECT 
                c.*, d.*
            FROM 
                category as c, category_des as d
            WHERE c.cat_id = d.cat_id
            AND c.parent_id = $parent_id
            AND d.lang_id = $lang_id
            ORDER BY c.cat_order ASC
        ";
        return $this->db->result($sql);
    }
    
  


}
