<?php
class khachhang_model extends model{
    function __construct(){
        parent::__construct();
    }
    function get_all_khachhang($limit, $offset, $lang_id){
        $sql = "
            SELECT k.id, k.images, k.link, d.name, d.slug
            FROM
                khachhang as k, khachhang_des as d
            WHERE
                k.id = d.id
            AND d.lang_id = $lang_id
            ORDER BY k.id DESC LIMIT $limit OFFSET $offset
        ";
        return $this->db->result($sql);
    }
    
    function get_num_khachhang($lang_id){
        $sql = "
            SELECT k.id, d.id
            FROM
                khachhang as k, khachhang_des as d
            WHERE
                k.id = d.id
            AND d.lang_id = $lang_id

        ";
        return $this->db->num_rows($sql);
    }
    
    function get_id($id, $lang_id){
        $sql = "
            SELECT k.*, d.*
            FROM khachhang as k, khachhang_des as d
            WHERE k.id = d.id
            AND k.id = $id
            AND d.lang_id = $lang_id
        ";
        return $this->db->row($sql);
    }
    
    function get_all_img($id){
        return $this->db->result("SELECT * FROM khachhang_img WHERE id = $id");
    }
    
    function get_khachhang_khac($id, $lang_id){
        $sql = "
            SELECT k.*, d.*
            FROM khachhang as k, khachhang_des as d
            WHERE k.id = d.id
            AND k.id != $id
            AND d.lang_id = $lang_id
            ORDER BY RAND() LIMIT 10
        ";
        return $this->db->result($sql);
    }
}
