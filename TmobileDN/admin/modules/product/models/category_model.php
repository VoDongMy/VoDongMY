<?php
class category_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    public function get_all_category($parent_id = 0){
        $sql = "
            SELECT 
                c.*, d.*
            FROM 
                cat as c, cat_des as d
            WHERE c.cat_id = d.cat_id
            AND lang_id = ".$this->lang_default."
            AND parent_id = $parent_id
            ORDER BY c.ordering ASC
            
        ";
        return $this->db->result($sql);
    }
    
    public function get_cat_by_id($cat_id){
        return $this->db->row("SELECT * FROM cat WHERE cat_id = $cat_id");
    }
    
    function get_category_by_lang($cat_id){
        $sql = "
            SELECT 
                l.*, c.*
            FROM 
                language as l, cat_des as c
            WHERE l.lang_id = c.lang_id
            AND c.cat_id = $cat_id
            ORDER BY l.lang_default DESC
        ";
        return $this->db->result($sql);
    }
    
    function get_num_new($cat_id){
        return $this->db->num_rows("SELECT id FROM product WHERE cat_id = $cat_id");
    }
    
    function get_num_cat($catid){
        return $this->db->num_rows("SELECT cat_id FROM cat WHERE parent_id = $catid");
    }
    
    function get_list_cat($parent_id){
        $sql = "
            SELECT 
                c.*, d.*
            FROM
                cat as c, cat_des as d
            WHERE 
                c.cat_id = d.cat_id
            AND c.parent_id = $parent_id 
            AND published = 1
            ORDER BY c.ordering ASC
        ";
        return $this->db->result($sql);
        
    }

}
