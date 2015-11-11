<div id="content">
    <!-- Begin Post -->
<?= $this->load->mod('banner') ?>

    <!-- End Post -->
    <!-- Begin Products -->
    <div id="products">
        <h2><?php echo lang('tintuc');
if ($catinfo->name != null)
    echo'/' . $catinfo->name
    ?><span class="title-bottom">&nbsp;</span></h2>
        <div class="customer_con TourCon" style="overflow: hidden;">
            <h1 class="title" style="margin-bottom: 10px;"><?= $rs->title ?></h1>
            <div class="introtext" style="margin-bottom: 10px;"><?= $rs->introtext ?></div>
            <div class="fulltext"><?= htmlspecialchars_decode($rs->fulltext) ?></div>

<!--            <div class="share">
                <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=mikunuyuen">Chia sẻ</a>
                 AddThis Button BEGIN 

                <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mikunuyuen"></script>
                 AddThis Button END 

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
                <div style="padding-bottom:5px; padding-top:5px; padding-left:5px; width:550px;">
                    <div class="fb-like" data-href="<?= base_url() . uri_string() ?>" data-width="30" data-show-faces="true" data-send="true"></div>
                </div>

                <div class="fb-comments" data-num-posts="4" data-width="715"  data-href="<?= base_url() . uri_string() ?>" ></div>
                <div style="clear:both"></div>
            </div>-->


            <h2 ><?= lang('tinlienquan') ?></h2>
            <?foreach($other as $val):?>
            <div class="tin_khac"><a href="<?= site_url($val->main_slug . '/' . $val->slug . '-' . $val->id) ?>"><?= $val->title ?></a></div>
            <?endforeach;?>
        </div>
    </div>
    <!-- End Products -->
    <div style="clear:both"></div>
    <div class="pages"><?= $pagination ?></div>
</div>