<?php
class danhba_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_news($limit, $offset, $field, $order, $key = '', $cat = 0){
        $sql ="
            SELECT 
                n.id, n.cat_id, d.title, n.published
            FROM 
                news as n, news_des as d
            WHERE 
                n.id = d.id
            AND d.lang_id =".$this->lang_default;
        if($cat != 0){
            $ar = $this->get_ar_cat($cat);
            $sql .=' AND n.cat_id IN ('.implode(',',$ar).')';
        }
        if($key != ''){
            $sql .=" AND (d.title LIKE '%$key%' OR d.introtext LIKE  '%$key%' OR d.fulltext LIKE '%$key%')";
        }
        $sql .=" ORDER BY $field $order LIMIT $limit OFFSET $offset";
        return $this->db->result($sql);
    }
    
    function get_num_news($key = '', $cat = 0){
        $sql ="
            SELECT 
                n.id, n.cat_id, d.id
            FROM 
                news as n, news_des as d
            WHERE 
                n.id = d.id 
           AND d.lang_id =".$this->lang_default;
        if($cat != 0){
            $ar = $this->get_ar_cat($cat);
            $sql .=' AND n.cat_id IN ('.implode(',',$ar).')';
        }
        if($key != ''){
            $sql .=" AND (d.title LIKE '%$key%' OR d.introtext LIKE  '%$key%' OR d.fulltext LIKE '%$key%')";
        }
        return $this->db->num_rows($sql);
    }
    
    
    function get_all_category($parent_id = 0){
        $sql = "
            SELECT 
                c.*, d.*
            FROM 
                category as c, category_des as d
            WHERE c.cat_id = d.cat_id
            AND lang_id = ".$this->lang_default."
            AND parent_id = $parent_id
            ORDER BY c.cat_order ASC
            
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
    
    function get_ar_cat($catid){
        $ar = array($catid);
        $list = $this->get_all_category($catid);
        foreach($list as $rs):
            $list1 = $this->get_all_category($rs->cat_id);
            array_push($ar, $rs->cat_id);
            foreach($list1 as $rs1):
                array_push($ar, $rs1->cat_id);
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
    
    function get_info_new($id){
        return $this->db->row("SELECT * FROM news WHERE id = $id");
    }
    
    function get_news_by_id($id){
        $sql = "
            SELECT 
                l.*, d.*
            FROM
                language as l, news_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = $id
            ORDER BY l.lang_default DESC
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


