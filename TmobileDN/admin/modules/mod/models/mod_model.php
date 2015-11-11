<?php
class mod_model extends model{
    function __construct() {
        parent::__construct();
    }
    
    public function get_all_modules($limit, $offset, $field = '', $order = '')
    {
        $sql = "
            SELECT 
                m.*, d.*
            FROM 
                modules as m, modules_des as d
            WHERE m.id = d.id
            AND d.lang_id = 1";
        if($field != '' && $order != ''){
            $sql .= " ORDER BY m.position ASC, $field $order";
        }else{
            $sql .=" ORDER BY m.position ASC, m.ordering ASC";
        }
        $sql .=" LIMIT $limit OFFSET $offset";
        return $this->db->result($sql);
    }
    
    public function get_num_modules(){
        $sql = "
            SELECT 
                m.id, d.id
            FROM 
                modules as m, modules_des as d
            WHERE m.id = d.id
            AND d.lang_id = 1";
        return $this->db->num_rows($sql);
    }
    
    // Get BY ID
    public function get_mod_by_id($id){
        return $this->db->row("SELECT * FROM modules WHERE id = $id");
    }
    
    function get_list_mod_by_lang($id){
        $sql = "
            SELECT 
                l.*, d.*
            FROM 
                language as l, modules_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = $id
            ORDER BY l.lang_default DESC
        ";
        return $this->db->result($sql);
    }
    
    // Get style From .xml
    function get_css($params = "-1"){
        $output = "<select name='vdata[params]'>";
        $xml = simplexml_load_file(ROOT.'site/templates/templates.xml');
        foreach($xml->css[0] as $css){
            if($params != "-1"){
                $select = ($css['name'] == $params)?'selected="selected"':'';
            }else{
                $select = "";
            }
            $value = $css['name'];
            $label = $css['label'];
            $output .="<option value=\"".$value."\" ".$select.">".$label."</option>";
        }
        $output .="</select>";
        return $output;
    }
    
    
    /*
    // Show list modules
    function get_all_modules($field,$order,$lang,$num,$offset){
        if($field != '' && $order != ''){
            $this->db->order_by($field,$order);    
        }else{
            $this->db->order_by('position','asc');
        }

        $this->db->where('lang',$lang);
        return $this->db->get('modules',$num,$offset)->result();
    }
    
    function get_num_modules($lang){
        $this->db->where('lang',$lang);
        return $this->db->get('modules')->num_rows();
    } */
}
?>
