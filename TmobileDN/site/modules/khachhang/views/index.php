<div class="brand">
    <ul>
        <li><a href="<?=base_url()?>" class="home"><?=lang('m.trangchu')?></a></li>
        <li><a href="javascript:;"><?=lang('khachhang')?></a></li>
    </ul>
</div>
<ul class="customer">
    <?
    $i = 1;

    foreach($list as $rs):?>
    <li <?=($i % 3)?'':'class="last"'?>>
        
        <div class="img">
            <a href="<?=$rs->link?>">
                <img src="<?=base_url()?>data/logo/250/<?=$rs->images?>" alt="<?=$rs->name?>">
            </a>
        </div>
        <div class="title"><a href="<?=$rs->link?>"><?=$rs->name?></a></div>
         
    </li>
    <?
    $i++;
    endforeach;?>
</ul>
<div class="clearfix"></div>
<div class="pages"><?=$pagination?></div>