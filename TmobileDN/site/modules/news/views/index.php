<!--<div class="brand">
    <ul>
        <li><a href="<?= base_url() ?>" class="home"><?= lang('m.trangchu') ?></a></li>
        <li><a href="javascript:;"><?= lang('tintuc') ?></a></li>
    </ul>
</div>
<ul class="lnews">
    <?foreach($list as $rs):?>
    <li>
        <div class="img">
            <a href="<?= site_url($rs->main_slug . '/' . $rs->slug . '-' . $rs->id) ?>">
                <img src="<?= base_url() ?>data/news/200/<?= $rs->images ?>" alt="<?= $rs->title ?>">
            </a>
        </div>
         <h3><a href="<?= site_url($rs->main_slug . '/' . $rs->slug . '-' . $rs->id) ?>"><?= $rs->title ?></a></h3>
        <div><?= vnit_cut_string($rs->introtext, 250) ?></div>
    </li>
    <?endforeach;?>
</ul>
<div class="pages"><?= $pagination ?></div>-->

<div id="content">
    <!-- Begin Post -->
    <?= $this->load->mod('banner') ?>

    <!-- End Post -->
    <!-- Begin Products -->
    <div id="products">
        <?foreach($list as $rs):?>
                <div class="post">
                    <h2><?= $rs->title ?><span class="title-bottom">&nbsp;</span></h2>
                    <a href="<?= site_url($rs->main_slug . '/' . $rs->slug . '-' . $rs->id) ?>">
                        <img src="<?= base_url() ?>data/news/200/<?= $rs->images ?>" alt="<?= $rs->title ?>">
                    </a>
                    <div><?= vnit_cut_string($rs->introtext, 250) ?></div>
                </div>
        </ul>
        <?endforeach;?>
    </div>
    <!-- End Products -->
    <div style="clear:both"></div>
    <div class="pages"><?= $pagination ?></div>
</div>