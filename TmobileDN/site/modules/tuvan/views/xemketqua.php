<h1 class="titles"><?=lang('timhieuvedacuatoi')?></h1>
<h2><?=lang('daso')?> <?=$row->tenda?></h2>
<div><?=htmlspecialchars_decode($row->noidung)?></div>
<a href="<?=site_url('tu-van-ve-da-cua-toi')?>" class="lamlai"><?=lang('lamlai')?></a>
<div class="clear"></div>
<div>
    <h2 class="moiquantam"><?=lang('moiquantamchinh')?></h2>
    <div class="htabs1">
        <?
        $i = 1;
        foreach($congdung as $val):
        ?>
        <a href="javascript:;" pid="p<?=$val->id?>" <?=($i == 1)?'class="selected"':''?>><?=lang('dckhuyendung')?> <?=$val->ten?></a>
        <?
        $i++;
        endforeach;?>
        <a href="javascript:;" pid="p99"><?=lang('boduongdaphuhop')?></a>
    </div>
    <?
    $f = 1;
    foreach($congdung as $val):
    $ds = $this->tuvan->get_all_sanpham($this->lang_id, $val->id);
    
    ?>
    <div class="htabs1_con" id="p<?=$val->id?>" style="<?=($f == 1)?'display:block':'display:none'?>">
        <?if(count($ds) > 0){?>
        <ul class="gridsp">
            <?
            $i = 1;
            $k = 1;
            $h = 1;
            $total = count($ds);
            $c = 1;
            foreach($ds as $rs):
            if($total > $h*4){ $c= 1;}else{ $c = 2;}
            $rand = rand(1,9999999);
            ?>
            <li class="k_<?=$k?> h<?=$h?> <?=($c == 2)?'not_b':''?>" <?=($h <= 2 || $h >= round($total/$h))?'style="border-top:0px;"':''?>>
                <?if($k > 1 && $k <= 4){?>
                <?if(($c == 1)){?>
                <div class="round1"></div>
                <div class="round3"></div>
                <?}?>
                <?}?>
                <div class="img">
                    <a href="<?=site_url($rs->slugcat.'/'.$rs->slug.'-'.$rs->id)?>" pdata="p_<?=$rand?>">
                        <img src="<?=base_url()?>data/product/200/<?=$rs->images?>" alt="">
                    </a>
                </div>
                <div class="title"><a href="<?=site_url($rs->slugcat.'/'.$rs->slug.'-'.$rs->id)?>" class="cufont" pdata="p_<?=$rand?>"><?=$rs->title?></a></div>
                <div class="pinfo<?=($k >= 3)?'r':'l'?> showinfo " id="p_<?=$rand?>">
                    <div class="arrow"></div>
                    <div class="br">
                        <div class="htabs ht_<?=$rs->id?>">
                            <a href="javascript:;" data_key="congdung<?=$rs->id?>" pid="<?=$rs->id?>" class="selected"><?=lang('congdung')?></a>
                            <a href="javascript:;" data_key="thanhphan<?=$rs->id?>" pid="<?=$rs->id?>"><?=lang('thanhphan')?></a>
                            <a href="javascript:;" data_key="sudung<?=$rs->id?>" pid="<?=$rs->id?>"><?=lang('sudung')?></a>
                        </div>
                        <div class="htabs_con tcon_<?=$rs->id?>" id="congdung<?=$rs->id?>">
                            <?=htmlspecialchars_decode($rs->congdung)?>
                        </div>
                        <div class="htabs_con tcon_<?=$rs->id?>" id="thanhphan<?=$rs->id?>" style="display: none;">
                            <?=htmlspecialchars_decode($rs->thanhphan)?>
                        </div>
                        <div class="htabs_con tcon_<?=$rs->id?>" id="sudung<?=$rs->id?>" style="display: none;">
                            <?=htmlspecialchars_decode($rs->sudung)?>
                        </div>
                    </div>
                </div>
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
        <?}else{?>
        <div class="show_success"><?=lang('dangcapnhat')?></div>
        <?}?>
    </div>
    <?
    $f++;
    endforeach;?>
    <div class="htabs1_con" id="p99" style="display: none;">
        <?if(count($loaida) > 0){?>
        <ul class="gridsp">
            <?
            $i = 1;
            $k = 1;
            $h = 1;
            $total = count($loaida);
            $c = 1;
            foreach($loaida as $rs):
            if($total > $h*4){ $c= 1;}else{ $c = 2;}
            $rand = rand(1,9999999);
            ?>
            <li class="k_<?=$k?> h<?=$h?> <?=($c == 2)?'not_b':''?>" <?=($h <= 2 || $h >= round($total/$h))?'style="border-top:0px;"':''?>>
                <?if($k > 1 && $k <= 4){?>
                <?if(($c == 1)){?>
                <div class="round1"></div>
                <div class="round3"></div>
                <?}?>
                <?}?>
                <div class="img">
                    <a href="<?=site_url($rs->slugcat.'/'.$rs->slug.'-'.$rs->id)?>" pdata="p_<?=$rand?>">
                        <img src="<?=base_url()?>data/product/200/<?=$rs->images?>" alt="">
                    </a>
                </div>
                <div class="title"><a href="<?=site_url($rs->slugcat.'/'.$rs->slug.'-'.$rs->id)?>" class="cufont" pdata="p_<?=$rand?>"><?=$rs->title?></a></div>
                <div class="pinfo<?=($k >= 3)?'r':'l'?> showinfo " id="p_<?=$rand?>">
                    <div class="arrow"></div>
                    <div class="br">
                        <div class="htabs ht_<?=$rs->id?>">
                            <a href="javascript:;" data_key="congdung<?=$rs->id?>" pid="<?=$rs->id?>" class="selected"><?=lang('congdung')?></a>
                            <a href="javascript:;" data_key="thanhphan<?=$rs->id?>" pid="<?=$rs->id?>"><?=lang('thanhphan')?></a>
                            <a href="javascript:;" data_key="sudung<?=$rs->id?>" pid="<?=$rs->id?>"><?=lang('sudung')?></a>
                        </div>
                        <div class="htabs_con tcon_<?=$rs->id?>" id="congdung<?=$rs->id?>">
                            <?=htmlspecialchars_decode($rs->congdung)?>
                        </div>
                        <div class="htabs_con tcon_<?=$rs->id?>" id="thanhphan<?=$rs->id?>" style="display: none;">
                            <?=htmlspecialchars_decode($rs->thanhphan)?>
                        </div>
                        <div class="htabs_con tcon_<?=$rs->id?>" id="sudung<?=$rs->id?>" style="display: none;">
                            <?=htmlspecialchars_decode($rs->sudung)?>
                        </div>
                    </div>
                </div>
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
        <?}else{?>
        <div class="show_success"><?=lang('dangcapnhat')?></div>
        <?}?>
    </div>
</div>