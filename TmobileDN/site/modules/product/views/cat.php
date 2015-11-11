
<div id="content">
    <!-- Begin Post -->
    <?=$this->load->mod('banner')?>
    
    <!-- End Post -->
    <!-- Begin Products -->
    <div id="products">
        <h2><?php echo $catinfo->name;if($catinfo1->name!=null)echo'/'.$catinfo1->name ?><span class="title-bottom">&nbsp;</span></h2>
        <?
        $i = 1;
        foreach($list as $val):
        ?>							
        <div class="product <?= (!($i % 3)) ? 'last' : '' ?>">
            <a href="<?= site_url('san-pham/' . $val->slug . '-' . $val->id) ?>" title="Product 3">
                <span class="title"><?= $val->title ?></span>
                <div style="height: 160px;background: #fff;width: 100%;"><img style="max-width: 185px;max-height: 155px;" src="<?= base_url() ?>data/product/200/<?= $val->images ?>" alt="Product Image 3" /></div>
                <span class="number"><?= $val->title ?></span>
                <span class="price"><span></span><? if ($val->price == 0) {
                                        echo 'Liên hệ';
                                        } else {
                                        echo number_format($val->price, 0, '.', '.') . ' VNĐ';
                                        }
                                        ?></span>
            </a>
        </div>
        <?= (!($i % 3)) ? '<div class="cl">&nbsp;</div>' : '' ?>
        <?
        $i++;
        endforeach;?>
    </div>
    <!-- End Products -->
</div>