<?php
class product_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_product($limit, $offset, $key = '', $catid = 0, $field, $order){
        if($catid != 0){
            $ar = $this->ar_cat($catid);
        }
        $sql = "
            SELECT 
                t.*, d.*
            FROM 
                product as t, product_des as d
            WHERE t.id = d.id
            AND d.lang_id = ".$this->lang_default;
        if($key != ''){
            $sql .=" AND d.title LIKE '%$key%'";
        }
        if($catid != 0){
            $sql .=' AND t.cat_id IN ('.implode(',',$ar).')';
        }
        $sql .= " ORDER BY $field $order LIMIT $limit OFFSET $offset";
        return $this->db->result($sql);
    }
    
    function get_num_product($key = '', $catid = 0){
        if($catid != 0){
            $ar = $this->ar_cat($catid);
        }
        $sql = "
            SELECT 
                t.id, d.id
            FROM 
                product as t, product_des as d
            WHERE t.id = d.id
            AND d.lang_id = ".$this->lang_default."
        ";
        if($key != ''){
            $sql .=" AND (d.title LIKE '%$key%')";
        }
        if($catid != 0){
            $sql .=' AND t.cat_id IN ('.implode(',',$ar).')';
        }
        return $this->db->num_rows($sql);
    }
    
    function get_all_cat($parent_id = 0){
        $sql = "
            SELECT 
                c.cat_id, c.parent_id, d.name, d.slug
            FROM
                cat as c, cat_des as d
            WHERE c.cat_id = d.cat_id
            AND d.lang_id = ".$this->lang_default;
        $sql .=" AND parent_id = $parent_id";
        $sql .=" ORDER BY c.ordering ASC";
        return $this->db->result($sql);
        
    }
    function get_item_cat($cat_id){
        $sql = "
            SELECT 
                c.cat_id, c.parent_id, d.name, d.slug
            FROM
                cat as c, cat_des as d
            WHERE c.cat_id = d.cat_id
            AND d.lang_id = ".$this->lang_default;
        $sql .=" AND c.cat_id = $cat_id";
        return $this->db->row($sql);
    }
    function get_product_($id){
        $sql = "
            SELECT 
                l.*, d.* 
            FROM language as l, product_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = $id
            ORDER BY l.lang_default DESC
        ";
        return $this->db->result($sql);
    }
    
    function get_slug_cat($id, $lang_id){
        $val = $this->get_cat_by_id($id);
        if($val->parent_id == 0){
            $catid = $id;
        }else{
            $catid = $val->parent_id;
        }
        return $this->db->row("SELECT cat_id, slug FROM cat_des WHERE cat_id = $catid AND lang_id = $lang_id");
    }
    
    function get_cat_by_id($catid){
        return $this->db->row("SELECT cat_id, parent_id FROM cat WHERE cat_id = $catid");
    }
    
    function get_all_loaida($lang_id){
        $sql = "
            SELECT l.*, d.*
            FROM loaida as l, loaida_des as d
            WHERE l.id_loaida = d.id_loaida
            AND d.lang_id = $lang_id
        ";                          
        return $this->db->result($sql);
    }
    
    function get_item_loaida($id_loaida, $id){
        $sql = "
            SELECT * FROM product_loaida WHERE id_loaida = $id_loaida AND id = $id
        ";
        return $this->db->row($sql);
    }
    
    function get_item_congdung($id, $th_id){
        return $this->db->row("SELECT * FROM product_congdung WHERE id = $id AND th_id = $th_id");
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
    
    function ar_cat($cat_id){
         $ar_id[] = $cat_id;
         $list = $this->db->result("SELECT * FROM cat WHERE parent_id = $cat_id");
         foreach($list as $rs):
            $ar_id[] = $rs->cat_id;
         endforeach;
         return $ar_id;
    }
}
