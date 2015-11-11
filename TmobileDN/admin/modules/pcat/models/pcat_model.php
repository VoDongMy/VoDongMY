<?php
class pcat_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_maincat(){
        return $this->db->result("SELECT catid, name, ordering, is_home, is_menu, published FROM pcat WHERE parent_id = 0 ORDER BY ordering ASC");
    }
    
    function get_list_cat($parentid){
        return $this->db->result("SELECT catid, slugcat, parent_id, name, ordering, is_home, is_menu, published FROM pcat WHERE parent_id = $parentid ORDER BY ordering ASC");
    }
    
    function get_maincat_is_menu(){
        return $this->db->result("SELECT catid, name, slugcat, icon, is_menu FROM pcat WHERE parent_id = 0 AND published = 1 ORDER BY is_menu DESC , ordering ASC");
    }
    
    function get_maincat_is_menu_hide(){
        return $this->db->result("SELECT catid, name, slugcat, icon FROM pcat WHERE parent_id = 0 AND is_menu = 0 AND published = 1 ORDER BY ordering ASC");
    }    
    
    function itemcat($parentid = 0){
        return $this->db->result("SELECT catid, parent_id, name, slugcat FROM pcat WHERE parent_id = $parentid AND published = 1 ORDER BY ordering ASC");
    }
    
    function get_maincat_is_home(){
        return $this->db->result("SELECT catid, name, slugcat, icon FROM pcat WHERE parent_id = 0 AND is_home = 1 AND published = 1 ORDER BY ordering ASC");
    }
    
    function total_subcat($parent_id){
        return $this->db->num_rows("SELECT catid FROM pcat WHERE parent_id = $parent_id");
    }
    
    function total_product_cat2($catid){
        return $this->db->num_rows("SELECT productid FROM product WHERE catid2 = $catid");
    }
    
    function total_product_cat3($catid){
        return $this->db->num_rows("SELECT productid FROM product WHERE catid3 = $catid");
    } 
}
