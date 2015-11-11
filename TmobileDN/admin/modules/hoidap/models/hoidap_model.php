<?php

class hoidap_model extends model {

    function __construct() {
        parent::__construct();
    }

    function get_all_hoidap($limit, $offset) {
        $sql = "
            SELECT 
                *
            FROM
            hoidap
            ORDER BY time DESC
            LIMIT $limit OFFSET $offset
        ";
        return $this->db->result($sql);
    }

    function get_num_hoidap() {
        return $this->db->num_rows("SELECT id FROM hoidap ");
    }

    function get_contact() {
        return $this->db->row("SELECT * FROM contact_row WHERE id = 1");
    }

    function get_contact_des() {
        $sql = "
            SELECT
                l.*, d.*
            From 
                language as l, contact_des as d
            WHERE l.lang_id = d.lang_id
            AND d.id = 1
            ORDER BY lang_default DESC
        ";
        return $this->db->result($sql);
    }

}
