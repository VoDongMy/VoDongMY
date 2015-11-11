
<?if(count($list) > 0){?>
<ul class="gridsp">
    <?
    $i = 1;
    $k = 1;
    $h = 1;
    $total = count($list);
    $c = 1;
    foreach($list as $rs):
    if($total > $h*4){ $c= 1;}else{ $c = 2;}
    ?>
    <li class="k_<?=$k?> h<?=$h?> <?=($c == 2)?'not_b':''?>" <?=($h <= 2 || $h >= round($total/$h))?'style="border-top:0px;"':''?>>
        <?if($k > 1 && $k <= 4){?>
        <?if(($c == 1)){?>
        <div class="round1"></div>
        <div class="round3"></div>
        <?}?>
        <?}?>
        <div class="img">
            <a href="<?=site_url($rs->slugcat.'/'.$rs->slug.'-'.$rs->id)?>" pdata="p_<?=$rs->id?>">
                <img src="<?=base_url()?>data/product/200/<?=$rs->images?>" alt="">
            </a>
        </div>
        <div class="title"><a href="<?=site_url($rs->slugcat.'/'.$rs->slug.'-'.$rs->id)?>" class="cufont" pdata="p_<?=$rs->id?>"><?=$rs->title?></a></div>
        <?if($rs->show_price == 0){?>
        <div class="price cufont"><?=lang('giaban')?>: <?=($rs->price > 0)?($rs->lang_id == 1) ? number_format($rs->price,0,',',',').' vnđ':'$ '.number_format($rs->price,1,',','.'):lang('lienhe')?></div>
        <?}?>
    </li>
    <?
    if($i % 4){
        $k ++;
    }else{
        $k = 1;
    }
    if($k == 1){
        $h ++;
    }
    $i++;
    endforeach;?>
</ul>
<div class="pages"><?=$pagination?></div>
<?}else{?>
<div class="show_success"><?=lang('dangcapnhat')?></div>
<?}?>
