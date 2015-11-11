<?php
class search_model extends model{
    function __construct(){
        parent::__construct();
    }
    function get_all_product($limit, $offset, $lang_id, $key = ""){
        $sql = "
            SELECT t.id, t.images, t.show_price, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($key != ''){
            $sql .=" AND title LIKE '%$key%'";
        }
        $sql .= " ORDER BY t.id DESC LIMIT $limit OFFSET $offset";
        
        return $this->db->result($sql);
    }
    
    function get_num_product($lang_id, $key = ""){
        $sql = "
            SELECT t.id, d.id
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = $lang_id
        ";
        if($key != ''){
            $sql .=" AND title LIKE '%$key%'";
        }
        
        return $this->db->num_rows($sql);
    }
}
