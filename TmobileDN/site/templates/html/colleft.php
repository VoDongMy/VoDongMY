<div id="left-sidebar" class="sidebar">
    <ul>
        <li class="widget">
            <h2>Danh Mục Sản Phẩm</h2>
            <div class="widget-entry">
                <?
                $sql = "
                SELECT c.cat_id, c.parent_id, d.name, slug
                FROM cat as c, cat_des as d
                WHERE c.cat_id = d.cat_id
                AND published = 1
                AND c.parent_id = 0
                AND d.lang_id = ".$this->language->lang_id()."
                ORDER BY c.ordering ASC
                ";
                $maincat = $this->db->result($sql);
                ?>
                <ul>
                    <?
                    $i = 1;
                    foreach($maincat as $val):
                    $sql = "
                    SELECT c.cat_id, c.parent_id, d.name, slug
                    FROM cat as c, cat_des as d
                    WHERE c.cat_id = d.cat_id
                    AND published = 1
                    AND c.parent_id = $val->cat_id
                    AND d.lang_id = 1
                    ORDER BY c.ordering ASC
                    ";
                    $subcat = $this->db->result($sql);
                    //                var_dump($subcat);
                    ?>
                    <li id="m<?= $val->cat_id ?>" class="main<?= ($val->cat_id == $catinfo->cat_id) ? ' active' : '' ?>"><a href="<?= site_url('san-pham/' . $val->slug) ?>" ><?= $val->name ?></a>

                    </li>
                    <!--<?if(count($subcat) > 0){?>-->
    <!--                    <span menu_id="<?= $val->cat_id ?>" class="click<?= ($val->cat_id == $catinfo->cat_id) ? ' active' : '' ?>"></span>
                        <div class="clear"></div>-->

                    <?foreach($subcat as $val1):?>
                    <li><a href="<?= site_url('san-pham/' . $val->slug . '/' . $val1->slug) ?>"><span><?= $val1->name ?></span></a></li>
                    <?endforeach;?>


<!--<?}?>-->

                    <?
                    $i ++;
                    endforeach;
                    ?>
                </ul>
                <!--                <ul>
                                    <li><a href="#" title="Desktops"><span>Desktops</span></a></li>
                                    <li><a href="#" title="Laptops &amp; Notebooks"><span>Laptops &amp; Notebooks</span></a></li>
                                    <li><a href="#" title="Components"><span>Components</span></a></li>
                                    <li><a href="#" title="Software"><span>Software</span></a></li>
                                    <li><a href="#" title="Phones &amp; PDAs"><span>Phones &amp; PDAs</span></a></li>
                                    <li><a href="#" title="Cameras"><span>Cameras</span></a></li>
                                    <li class="last"><a href="#" title="MP3 Players"><span>MP3 Players</span></a></li>
                                </ul>-->
            </div>
        </li>
        <li class="widget">
            <h2>Tư vấn</h2>
            <div class="widget-entry">
                <ul>
                    <?php
                    $sql = "
                            SELECT 
                                n.id, n.cat_id, d.title, d.introtext, d.main_slug, d.slug, n.images, n.published
                            FROM 
                                news as n, news_des as d
                            WHERE 
                                n.id = d.id
                            AND d.lang_id = 1
                            AND n.cat_id IN ('86')
                            ORDER BY n.id DESC LIMIT 4 OFFSET 0";
                    $News = $this->db->result($sql);

                    $i = 1;
                    foreach ($News as $val):
                        //$price = $this->dnx->get_min_price($val->id);
                        ?>
                        <li><a href="<?= site_url($val->main_slug . '/' . $val->slug . '-' . $val->id) ?>" title="<?= $val->title ?>"><span><?= $val->title ?></span></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>
        <li class="widget select-widget">
            <h2>Brands</h2>
            <div class="widget-entry">
                <div class="selectbox">
                    <span class="currentItem">--- <span>Please Select</span> ---</span>
                    <div class="list">
                        <ul>
                            <li class="active"><a href="#" title="Please Select">Please Select</a></li>
                            <li><a href="#" title="Brand 1">Brand 1</a></li>
                            <li><a href="#" title="Brand 2">Brand 2</a></li>
                            <li><a href="#" title="Brand 3">Brand 3</a></li>
                        </ul>
                    </div>
                    <select>
                        <option value="option" selected="selected">Please Select</option>
                        <option value="option1">Brand 1</option>
                        <option value="option2">Brand 2</option>
                        <option value="option3">Brand 3</option>
                    </select>
                </div>
                <div class="cl">&nbsp;</div>
            </div>
        </li>
        <li class="widget">
		
            <!--<h2>Shopping Card</h2>
            <div class="widget-entry">
                <a href="#" class="items" title="Shopping Card Items">0 items</a>
            </div>-->
			<?=$this->load->view_mod('mod_online')?>
        </li>
    </ul>
</div>