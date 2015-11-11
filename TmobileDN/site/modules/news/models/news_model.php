<?php
class news_model extends model{
    function __construct(){
        parent::__construct();
    }
     function get_all_news($limit, $offset, $lang_id, $cat_id = 0){
        $sql ="
            SELECT 
                n.id, n.cat_id, d.title, d.introtext, d.main_slug, d.slug, n.images, n.published
            FROM 
                news as n, news_des as d
            WHERE 
                n.id = d.id
            AND d.lang_id =".$lang_id;
        if($cat_id != 0){
            $ar_id = $this->ar_cat($cat_id);
            $sql .=" AND n.cat_id IN (".implode(",",$ar_id).")";
        }
        $sql .=" ORDER BY n.id DESC LIMIT $limit OFFSET $offset";     

        return $this->db->result($sql);
    }
    
    function get_num_news($lang_id, $cat_id = 0){
        $sql ="
            SELECT 
                n.id, n.cat_id, d.id
            FROM 
                news as n, news_des as d
            WHERE 
                n.id = d.id 
           AND d.lang_id =".$lang_id;
        if($cat_id != 0){
            $ar_id = $this->ar_cat($cat_id);
            $sql .=" AND n.cat_id IN (".implode(",",$ar_id).")";
        }
        return $this->db->num_rows($sql);
    }
    
    function get_catinfo_by_slug($lang_id, $slug){
        $sql ="
            SELECT d.cat_name, d.cat_slug, c.parent_id, c.cat_id
            FROM  
                category as c, category_des as d
            WHERE c.cat_id = d.cat_id
            AND d.cat_slug = '$slug'
            AND d.lang_id = $lang_id
        ";
        return $this->db->row($sql);
    }
    
    function get_cat_by_id($lang_id, $cat_id){
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
    
     function get_tinlienquan( $lang_id, $id, $catid){
        $sql ="
            SELECT 
                n.id, n.cat_id, d.title, d.introtext, d.main_slug, d.slug, n.images, n.published
            FROM 
                news as n, news_des as d
            WHERE 
                n.id = d.id
            AND d.lang_id =".$lang_id;
            $sql .=" AND n.cat_id = $catid AND n.id != $id";
        $sql .=" ORDER BY n.id DESC LIMIT 10";
        return $this->db->result($sql);
    }
    function ar_cat($cat_id){
         $ar_id[] = $cat_id;
         $list = $this->db->result("SELECT * FROM category WHERE parent_id = $cat_id");
         foreach($list as $rs):
            $ar_id[] = $rs->cat_id;
         endforeach;
         return $ar_id;
    }
    
}
