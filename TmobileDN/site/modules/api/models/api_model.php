<?php
class api_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_city($parent_id){
        return $this->db->result("SELECT city_id, city_name FROM city WHERE parentid = $parent_id AND parentid != 0");
    }
    
    function check_bookmark($productid){
        $user_id = $this->user_id;
        return $this->db->row("SELECT productid FROM bookmark WHERE productid = $productid AND user_id = $user_id");
    }
    
    function check_product($productid){
        return $this->db->row("SELECT productid FROM product WHERE productid = $productid");
    }
    
    function check_shop_exit($user_id){
        $sql = "
            SELECT 
                u.username, s.shopid, s.user_id, s.shop_name
            FROM
                user as u, shop as s
            WHERE u.user_id = s.user_id
            AND s.user_id = $user_id
        ";
        return $this->db->row($sql);
    }
    
    function get_city($city_id){
        return $this->db->row("SELECT city_name FROM city WHERE city_id = $city_id")->city_name;
    }    
}
