<div id="right-sidebar" class="sidebar">
    <ul>
        <li class="widget products-box">
            <h2>Sản phẩm nổi bật</h2>
            <div class="widget-entry">
                <ul>
                    <?php
                    $sql = "SELECT *
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = " . $this->language->lang_id() . "
            AND t.is_new = 1 
            ORDER BY t.id DESC LIMIT 10 OFFSET 0";
                    //var_dump($sql);
                    $sp = $this->db->result($sql);
                    $i = 1;
                    $z = count($sp);
//                  var_dump($z);
                    foreach ($sp as $val):
                        ?>
                        <li>
                            <a href="<?= site_url('san-pham/' . $val->slug . '-' . $val->id) ?>" title="<?= $val->title ?>">
                                <img src="<?= base_url() ?>data/product/200/<?= $val->images ?>" alt="<?= $val->title ?>" />
                                <span class="info">
                                    <span class="title"><?= $val->title ?></span>
                                    <span class="price"><span></span><?php
                                        if ($val->price == 0) {
                                            echo 'Liên hệ';
                                        } else {
                                            echo number_format($val->price, 0, '.', '.') . ' VNĐ';
                                        }
                                        ?></span>
                                </span>
                                <span class="cl">&nbsp;</span>
                            </a>
                        </li>
                        <?php
                        $i = $i + 1;

                    endforeach;
                    ?>
                </ul>
                <div class="cl">&nbsp;</div>
            </div>
        </li>
        <li class="widget products-box">
            <h2>Phụ kiện</h2>

            <div class="widget-entry">
                <ul>
                    <?php
                    $sql="SELECT t.id, t.images, t.code, d.*
            FROM
                product as t, product_des as d
            WHERE t.id = d.id
            AND t.published = 1
            AND d.lang_id = " . $this->language->lang_id() . "
            AND d.main_id IN (17) ORDER BY t.id DESC LIMIT 5 OFFSET 0";
                    //var_dump($sql);
                    $pk = $this->db->result($sql);
                    $i = 1;
                    $z = count($pk);
//                  var_dump($z);
                    foreach ($pk as $val):
                        ?>
                        <li>
                            <a href="<?= site_url('san-pham/' . $val->slug . '-' . $val->id) ?>" title="<?= $val->title ?>">
                                <img src="<?= base_url() ?>data/product/200/<?= $val->images ?>" alt="<?= $val->title ?>" />
                                <span class="info">
                                    <span class="title"><?= $val->title ?></span>
                                    <span class="price"><span></span><? if ($val->price == 0) {
                                        echo 'Liên hệ';
                                        } else {
                                        echo number_format($val->price, 0, '.', '.') . ' VNĐ';
                                        }
                                        ?></span>
                                </span>
                                <span class="cl">&nbsp;</span>
                            </a>
                        </li>
                        <?php
                        $i = $i + 1;

                    endforeach;
                    ?>								
                </ul>
                <div class="cl">&nbsp;</div>
            </div>
        </li>
    </ul>
</div>