<?php
class product_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_product($limit, $offset, $lang_id, $cat_id = 0){
        $sql = "
            SELECT t.id, t.images, t.code, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($cat_id != 0){
            $ar_id = $this->ar_cat($cat_id);
            $sql .=" AND t.cat_id IN (".implode(",",$ar_id).")";
        }

        $sql .= " ORDER BY t.ordering ASC LIMIT $limit OFFSET $offset";
        
        return $this->db->result($sql);
    }
    
    function get_num_product($lang_id, $cat_id = 0){
        $sql = "
            SELECT t.id, d.id
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($cat_id != 0){
            $ar_id = $this->ar_cat($cat_id);
            $sql .=" AND t.cat_id IN (".implode(",",$ar_id).")";
        }
        
        return $this->db->num_rows($sql);
    }
    
    function get_all_product_s($limit, $offset, $lang_id, $key = ''){
        $sql = "
            SELECT t.id, t.images, t.code, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($key != ''){

            $sql .=" AND d.title LIKE '%$key%'";
        }
        $sql .= " ORDER BY t.ordering ASC LIMIT $limit OFFSET $offset";
        
        return $this->db->result($sql);
    }
    
    function get_num_product_s($lang_id, $key = ''){
        $sql = "
            SELECT t.id, d.id
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($key != ''){

            $sql .=" AND d.title LIKE '%$key%'";
        }
        
        return $this->db->num_rows($sql);
    }
    
    function get_all_sp_home($limit, $offset, $lang_id){
        $sql = "
            SELECT t.id, t.images, t.show_price, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
            AND t.is_new = 1
        ";
        $sql .= " ORDER BY t.ordering ASC LIMIT $limit OFFSET $offset";
        
        return $this->db->result($sql);
    }
    
    function get_num_spmoi($lang_id){
        $sql = "
            SELECT t.id, d.id
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
            AND t.is_new = 1
        ";

        return $this->db->num_rows($sql);
    }
    
    function get_cat_by_slug($lang_id, $slug){
        $sql ="
            SELECT c.cat_id, c.parent_id, c.images_main, d.*
            FROM
                cat as c, cat_des as d
            WHERE c.cat_id = d.cat_id
            AND d.slug = '$slug'
            AND d.lang_id = $lang_id
        ";
        return $this->db->row($sql);
    }
    
    function get_cat_by_id($lang_id, $id){
        $sql ="
            SELECT c.cat_id, c.parent_id, c.images_main, d.*
            FROM
                cat as c, cat_des as d
            WHERE c.cat_id = d.cat_id
            AND d.cat_id = $id
            AND d.lang_id = $lang_id
        ";
        return $this->db->row($sql);
    }
    
    
    
    function get_product($lang_id, $id){
        $sql = "
            SELECT p.id, p.cat_id, p.images, p.code, d.*
            FROM
                product as p, product_des as d
            WHERE p.id = d.id
            AND d.lang_id = $lang_id
            AND p.id = $id
        ";
        return $this->db->row($sql);
    }
    
    function sp_lienquan($id, $cat_id, $lang_id){
        $sql = "
            SELECT t.id, t.images, t.code, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
            AND t.id <> $id
        ";
        if($cat_id != 0){
            $ar_id = $this->ar_cat($cat_id);
            $sql .=" AND t.cat_id IN (".implode(",",$ar_id).")";
        }
        $sql .= " ORDER BY t.ordering ASC LIMIT 8";
        return $this->db->result($sql);     
    }
    
    function get_all_cat($lang_id){
        $sql = "
            SELECT c.cat_id, d.*
            FROM cat as c, cat_des as d
            WHERE c.cat_id = d.cat_id
            AND c.published = 1
            AND d.lang_id = $lang_id
            ORDER BY c.ordering ASC
        ";
        return $this->db->result($sql);
    }

    function get_all_sphome($lang_id, $cat_id = 0){
        $sql = "
            SELECT t.id, t.images,t.code, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($cat_id != 0){
            $sql .=" AND t.cat_id = $cat_id";
        }
        $sql .= " ORDER BY t.id DESC LIMIT 3";
        
        return $this->db->result($sql);
    }
    function ar_cat($cat_id){
         $ar_id[] = $cat_id;
         $list = $this->db->result("SELECT * FROM cat WHERE parent_id = $cat_id AND parent_id <> 0");
         foreach($list as $rs):
            $ar_id[] = $rs->cat_id;
            //$this->ar_cat($cat_id);
         endforeach;
         return $ar_id;
    }

}
