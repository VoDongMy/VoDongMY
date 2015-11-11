<?php
class about_model extends model{
    function __construct(){
        parent::__construct();
    }
    
    function get_item_news($lang_id, $id){
        $sql = "
            SELECT n.*, d.*
            FROM news as n, news_des as d
            WHERE n.id = d.id
            AND n.id = $id
            AND d.lang_id = $lang_id
        ";
        return $this->db->row($sql);
    }
}
