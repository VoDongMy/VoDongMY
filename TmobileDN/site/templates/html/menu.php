<?php
$sql = "
            SELECT 
                c.cat_id, c.parent_id, d.cat_name, d.cat_slug
            FROM
                category as c, category_des as d
            WHERE
                c.cat_id = d.cat_id
            AND c.parent_id = 0
            AND c.published = 1
            AND d.lang_id = " . $this->language->lang_id() . "
            ORDER BY c.cat_order ASC
        ";
$cattintuc = $this->db->result($sql);
//var_dump($cattintuc);
?>
<div id="navigation">
    <div class="shell" style="text-transform: uppercase">
        <ul>
            <li><a href="<?= base_url() ?>" title="Home">Home</a></li>
            <li><a href="<?= site_url('gioi-thieu') ?>" title="">Giới Thiệu</a></li>
            <li><a href="<?= site_url('san-pham') ?>" title="">Sản Phẩm</a></li>

            <?foreach($cattintuc as $val):
            $sql = "
            SELECT 
            c.cat_id, c.parent_id, d.cat_name, d.cat_slug
            FROM
            category as c, category_des as d
            WHERE
            c.cat_id = d.cat_id
            AND c.parent_id = ".$val->cat_id."
            AND c.published = 1
            AND d.lang_id = ".$this->language->lang_id()."
            ORDER BY c.cat_order ASC
            ";
            $cattintuc1 = $this->db->result($sql);  

             
            ?>
            <li >
                <a href="<?= site_url($val->cat_slug) ?>" <?= ($url == $val->cat_slug) ? 'class="active"' : '' ?>><?= $val->cat_name ?></a>
                <?if(count($cattintuc1) > 0){?>
                <ul >
                    <?foreach($cattintuc1 as $val1):?>
                    <li><a href="<?= site_url($val->cat_slug . '/' . $val1->cat_slug) ?>"><?= $val1->cat_name ?></a></li>
                    <?endforeach;?>
                </ul> 
                <?}?>
            </li>
            <?endforeach;?>
            <li><a href="<?= site_url('lien-he') ?>" title="Contact">Liên Hệ</a></li>
        </ul>
        <div class="cl">&nbsp;</div>
    </div>
</div>