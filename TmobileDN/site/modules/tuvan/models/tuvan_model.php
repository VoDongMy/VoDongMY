<?php
class tuvan_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_cat($lang_id){
        $sql = "
            SELECT th.* , d.*
            FROM
                thcat as th, thcat_des as d
            WHERE th.catid = d.catid
            AND d.lang_id = $lang_id
            ORDER BY th.ordering ASC
        ";
        return $this->db->result($sql);
    }
    
    function get_all_item($lang_id, $catid){
        $sql = "
            SELECT tv.*, d.*
            FROM th as tv, th_des as d
            WHERE tv.id = d.id
            AND tv.catid = $catid
            AND d.lang_id = $lang_id
        ";
        return $this->db->result($sql);
    }
    
    function get_all_cats($lang_id, $ar_id){
        $sql = "
            SELECT
                thcat_des.*, th.*, th_des.*
            FROM 
                thcat_des, th, th_des
            WHERE
                th.catid = thcat_des.catid
            AND
                th.id = th_des.id
            AND
                thcat_des.catid != 1
            AND th.id IN ($ar_id)
            AND th_des.lang_id = $lang_id
            AND thcat_des.lang_id = $lang_id
        ";
        return $this->db->result($sql);
    }
    
    function get_item_cat1($lang_id, $ar_id){
        $sql = "
            SELECT
                thcat_des.*, th.*, th_des.*
            FROM 
                thcat_des, th, th_des
            WHERE
                th.catid = thcat_des.catid
            AND
                th.id = th_des.id
            AND
                thcat_des.catid = 1
            AND th.id IN ($ar_id)
            AND th_des.lang_id = $lang_id
            AND thcat_des.lang_id = $lang_id
        ";
        return $this->db->result($sql);
    }
    
    function timloaida($lang_id,$ar_id){
        $sql = "
            SELECT
                l.*, d.*
            FROM loaida as l, loaida_des as d
            WHERE l.id_loaida = d.id_loaida
            AND d.lang_id = $lang_id
            AND l.th_id IN ($ar_id)
        ";
        return $this->db->row($sql);
    }
    
    function get_listcongdung($lang_id, $ar_id){
        $sql = "
            SELECT
                thcat_des.*, th.*, th_des.*
            FROM 
                thcat_des, th, th_des
            WHERE
                th.catid = thcat_des.catid
            AND
                th.id = th_des.id
            AND
                thcat_des.catid = 1
            AND th.id IN ($ar_id)
            AND th_des.lang_id = $lang_id
            AND thcat_des.lang_id = $lang_id
        ";
        return $this->db->result($sql);
    }
    
    function get_all_sanpham_loaida($lang_id, $id_loaida){
        $sql = "
            SELECT
                p1.*, p.*, l.*
            FROM product as p1, product_des as p, product_loaida as l
            WHERE p.id = l.id
            AND p.id = p1.id
            AND l.id_loaida = $id_loaida
            AND p.lang_id = $lang_id
        ";
        return $this->db->result($sql);
    }
    
    function get_all_sanpham($lang_id, $th_id){
        $sql = "
            SELECT
                p1.*, p.*, l.*
            FROM product as p1, product_des as p, product_congdung as l
            WHERE p.id = l.id
            AND p.id = p1.id
            AND p.lang_id = $lang_id
            AND l.th_id = $th_id
        ";
        return $this->db->result($sql);
    }
}
