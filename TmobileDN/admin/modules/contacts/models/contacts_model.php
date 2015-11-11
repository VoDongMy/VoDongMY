<?php
class contacts_model extends model{
    function __construct(){
        parent::__construct();
    }
    function get_all_news($limit, $offset, $field, $order, $key = '', $cat = 0){}
    function get_all_contacts($limit, $offset, $field, $ordering, $key = '', $id_office = 0){
        $sql ="
            SELECT 
                *
            FROM 
                contacts
                 
            ";
        if($id_office != 0){
            $ar = $this->get_ar_cat($id_office);
            $sql .=' WHERE id_office IN ('.implode(',',$ar).')';
        }
        if($key != ''){
            $sql .="title LIKE '%$key%' OR note LIKE  '%$key%' OR name LIKE '%$key%' OR address LIKE '%$key%' OR phone_1 LIKE '%$key%' OR phone_2 LIKE '%$key%' )";
        }
//        ORDER BY  $ordering 
        $sql .=" LIMIT $limit OFFSET $offset";
        
        return $this->db->result($sql);
    }
    
    function get_num_contacts($key = '', $id_office = 0){
        $sql ="
            SELECT 
                *
            FROM 
                contacts";
        if($id_office != 0){
            $ar = $this->get_ar_cat($id_office);
            $sql .=' WHERE id_office IN ('.implode(',',$ar).')';
        }
        if($key != ''){
            $sql .=" AND (title LIKE '%$key%' OR note LIKE  '%$key%' OR name LIKE '%$key%' OR address LIKE '%$key%' OR phone_1 LIKE '%$key%' OR phone_2 LIKE '%$key%' )";
        }
        //var_dump($sql);
        return $this->db->num_rows($sql);
    }
     public function get_office($id_office = 0){
        $sql = "
            SELECT 
                *
            FROM 
                office
            WHERE 
             id = $id_office
            ORDER BY ordering ASC
            
        ";
        return $this->db->row($sql);
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
    
    function main_cat_slug($cat_id, $lang_id){
         $row = $this->get_cat_by_id($cat_id, $lang_id);
         if($row){
             if($row->parent_id == 0){
                 return $row->cat_slug;
             }else{
                 $row1 = $this->get_cat_by_id($row->parent_id, $lang_id);
                 return $row1->cat_slug;
             }
         }else{
             return '';
         }
    }
    
    function main_cat_id($cat_id, $lang_id){
         $row = $this->get_cat_by_id($cat_id, $lang_id);
         if($row){
             if($row->parent_id == 0){
                 return $row->cat_id;
             }else{
                 $row1 = $this->get_cat_by_id($row->parent_id, $lang_id);
                 return $row1->cat_id;
             }
         }else{
             return '';
         }
    }
    
    function get_ar_cat($id){
        $ar = array($id);
        $list = $this->get_all_office($id);
        foreach($list as $rs):
            $list1 = $this->get_all_office($rs->id);
            array_push($ar, $rs->id);
            foreach($list1 as $rs1):
                array_push($ar, $rs1->id);
            endforeach;
        endforeach;
        return $ar;
    }
    
    function get_cat_by_id($cat_id, $lang_id){
        $sql ="
            SELECT d.cat_name, d.cat_slug, c.parent_id, c.cat_id
            FROM  
                category as c, category_des as d
            WHERE c.cat_id = d.cat_id
            AND c.cat_id = $cat_id
            AND d.lang_id = $lang_id
        ";
        return $this->db->row($sql);
    }
    
    function get_info_contacts($id){
        return $this->db->row("SELECT * FROM contacts WHERE id = $id");
    }
    
    function get_contacts_by_id($id){
        $sql = "
            SELECT * FROM contacts WHERE id = $id
            ";
        return $this->db->result($sql);
    }
    
    function get_list_channel($catid){
        return $this->db->result("SELECT * FROM channel WHERE cat_id = $catid ORDER BY channel_date DESC");
    }
    
    // Cache
    
    function get_list_maincat(){
         return $this->db->result("SELECT cat_id, cat_name, cat_slug FROM category WHERE parent_id = 0 AND published = 1 ORDER BY cat_order ASC");
    }
    
    function get_list_top($catid){
         $ar_id = $this->get_ar_cat($catid);
         $sql = "
            SELECT 
                id, catid, cat_slug, title, slug, introtext, images
            FROM 
                news
            WHERE published = 1
            AND catid IN (".implode(',',$ar_id).")
            ORDER BY id DESC LIMIT 9
         ";
         return $this->db->result($sql);
    }
    
    function get_tinmoi(){
         $sql = "
            SELECT 
                id, catid, cat_slug, title, slug, introtext, images
            FROM 
                news
            WHERE published = 1
            ORDER BY id DESC LIMIT 9
         ";
         return $this->db->result($sql); 
    }
    
    function get_noibat($limit = 4){
        return $this->db->result("SELECT id, catid, cat_slug, title, slug, introtext, images FROM news WHERE published = 1 AND noibat = 1 ORDER BY id DESC LIMIT $limit");
    }
    
    function get_docnhieu(){
        $time = time() - 6048000;
        return $this->db->result("SELECT id, title, slug, introtext FROM news WHERE published = 1 AND created < $time ORDER BY hits DESC LIMIT 5");
    }    
}


