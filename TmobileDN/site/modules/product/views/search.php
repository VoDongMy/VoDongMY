<div class="khung_trong">
    <div class="tieude_home"><span><?=lang('ketquatimkiem')?></span></div>
    <div><?=lang('timthay')?> <?=count($list)?> <?=lang('ketquavoi')?> "<?=$key?>".</div>
    <div class="khung_giua_sp">
        <?
        
        $i = 1;
        foreach($list as $val):
        ?>
        <div class="item_san_pham <?=(!($i%3))?'last':''?>">
            <div class="hinh_sanpham">
                <a href="<?=site_url('san-pham/'.$val->slug.'-'.$val->id)?>" data-tooltip="<?=$val->id?>"><img alt="<?=$val->title?>" src="<?=base_url()?>data/product/200/<?=$val->images?>"></a>
            </div>
            <div class="phan_ct_sp">
                <div class="ten_sp"><a href="<?=site_url('san-pham/'.$val->slug.'-'.$val->id)?>" title="<?=$val->title?>"><?=$val->title?></a></div>
                <div class="ma_sp"><?=lang('masanpham')?>: <strong><?=$val->code?></strong></div>
            </div>
        </div>  
        <?
        $img .='<div style="width: 300px; display: none;" class="atip" id="'.$val->id.'"><img width="300" style="margin:0px 0px 5px 0px;" src="'.base_url().'data/product/500/'.$val->images.'"></div>';
        $i++;
        endforeach;?>
    </div>
    <div style="clear:both"></div>
    <div class="pages"><?=$pagination?></div>
</div>
<div id="mystickytooltip" class="stickytooltip">
    <div style="padding:5px">
    <?=$img?>
    </div>
</div>