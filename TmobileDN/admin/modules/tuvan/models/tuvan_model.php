<?php
class tuvan_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_all_cat(){
        $sql = "
            SELECT 
                tv.*, d.*
            FROM 
                thcat as tv, thcat_des as d
            WHERE tv.catid = d.catid
            AND d.lang_id = ".$this->lang_default."
            ORDER BY tv.ordering ASC
        ";
        return $this->db->result($sql);        
    }
    
    function get_all_tuvan($catid){
        $sql = "
            SELECT 
                tv.*, d.*
            FROM 
                th as tv, th_des as d
            WHERE tv.id = d.id
            ANd tv.catid = $catid
            AND d.lang_id = ".$this->lang_default."
        ";
        return $this->db->result($sql); 
    }
    
    function get_all_loaida(){
        $sql = "
            SELECT 
                l.*, d.*
            FROM 
                loaida as l, loaida_des as d
            WHERE l.id_loaida = d.id_loaida
            AND d.lang_id = ".$this->lang_default."
        ";
        return $this->db->result($sql);        
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
    
    function get_id_loaida($id_loaida){
        return $this->db->row("SELECT * FROM loaida WHERE id_loaida = $id_loaida");
    }
    
    function get_loaida_lang($id_loaida){
        $sql = "
            SELECT 
                l.*, d.*
            FROM 
                language as l, loaida_des as d
            WHERE l.lang_id = d.lang_id
            AND id_loaida = $id_loaida
            ORDER BY l.lang_id ASC
        ";
        return $this->db->result($sql);
    }
    
    function get_row_dm($th_id){
        return $this->db->row("SELECT * FROM thcat WHERE catid = $th_id");
    }
    
    function get_list_row_dm($th_id){
        $sql = "
            SELECT 
                l.*, d.*
            FROM 
                language as l, thcat_des as d
            WHERE l.lang_id = d.lang_id
            AND d.catid = $th_id
            ORDER BY l.lang_id ASC
        ";
        return $this->db->result($sql);
    }
    
    function get_row_tuvan($th_id){
        return $this->db->row("SELECT * FROM th WHERE id = $th_id");
    }
    
    function get_list_row_tuvan($id){
        $sql = "
            SELECT 
                l.*, d.*
            FROM 
                language as l, th_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = $id
            ORDER BY l.lang_id ASC
        ";
        return $this->db->result($sql);
    }
}
