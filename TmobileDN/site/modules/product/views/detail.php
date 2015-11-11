<div id="content">
    <!-- Begin Post -->
    <?= $this->load->mod('banner') ?>

    <!-- End Post -->
    <!-- Begin Products -->
    <div id="products">
        <h2><?php
            echo $catinfo->name;
            if ($catinfo1->name != null)
                echo'/' . $catinfo1->name
                ?><span class="title-bottom">&nbsp;</span></h2>
        <ul class="lnews">
            <div class="khung_giua_sp">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="4%" align="left" valign="top">
                            <div style="padding-right:10px;" >
                                <a rel="example_group" href="<?= base_url() ?>data/product/500/<?= $rs->images ?>" title="<?= $rs->title ?>">
                                    <img width="230" style="border-radius: 3px; box-shadow: 0 0 5px #333;background: #fff;" align="<?= $rs->title ?>" src="<?= base_url() ?>data/product/200/<?= $rs->images ?>" />
                                </a>
                            </div>        
                        </td>
                        <td width="96%" valign="top" align="left">
                            <h1 class="tieude_view_ct"><?= $rs->title ?></h1>
                            <div style="padding-top:10px;"><b><?= lang('kichthuoc') ?>:</b> <?= $rs->size ?></div>
                            <div style="padding-top:6px;"><b><?= lang('giaban') ?>:</b> 
                                <span class="gia_sp">
                                    <?if($this->lang_url == 'vi'){?>
                                    <?if($rs->price == 0){
                                    echo 'Liên hệ';
                                    }else{echo number_format($rs->price,0,'.','.').' VNĐ';}?>
                                    <?}else{?>
                                    <?if($rs->price == 0){
                                    echo 'Contact';
                                    }else{
                                    echo number_format($rs->price,2,'.',',') .' USD';
                                    }?>    
                                    <?}?>
                                </span>
                            </div> 
                            
                        </td>
                    </tr>
                </table>
<div class="block_detail_product">
                                <h3><?= lang('thongtin_chitiet') ?>:</h3>
                                <div class="fulltext">
<?= htmlspecialchars_decode($rs->gioithieu) ?>
                                </div>
                            </div>


                <!--<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=mikunuyuen">Chia sẻ</a>-->
                <!-- AddThis Button BEGIN -->
                <!-- <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mikunuyuen"></script>-->
                <!-- AddThis Button END 
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=521821254551584";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div style="padding-bottom:5px; padding-top:5px; padding-left:5px; width:595px;">
                    <div class="fb-like" data-href="<?= base_url() . uri_string() ?>" data-width="30" data-show-faces="true" data-send="true"></div>
                </div>

                <div>
                    <div class="fb-comments" data-num-posts="4" data-width="595"  data-href="<?= base_url() . uri_string() ?>" ></div>
                    <div style="clear:both"></div>
                </div>-->



                <div style=" margin-top:10px; padding-bottom:20px;">
                    <?if(count($list) > 0){?>
                    <h2><?= lang('sanphamkhac') ?><span class="title-bottom">&nbsp;</span></h2>
                    <?
                    $i = 1;
                    foreach($list as $val):
                    ?>							
                    <div class="product <?= (!($i % 3)) ? 'last' : '' ?>">
                        <a href="<?= site_url('san-pham/' . $val->slug . '-' . $val->id) ?>" title="Product 3">
                            <span class="title"><?= $val->title ?></span>
                            <div style="height: 160px;"><img style="max-width: 185px;max-height: 155px;" src="<?= base_url() ?>data/product/200/<?= $val->images ?>" alt="Product Image 3" /></div>
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
                    <div style="clear:both"></div>
                </div>
                <?}?>
            </div>
        </ul>
    </div>
    <!-- End Products -->
</div>