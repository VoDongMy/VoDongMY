<div id="page1">
<div class="cl_tuvan">
    <div class="shadow_tuvan" id="home_tv">
        <div class="top1_tuvan">
            <h1 class="titles"><?=lang('timhieuvedacuatoi')?></h1>
            <h2 class="titles"><?=lang('timquytrinh')?></h2>
            <div><?=lang('note1')?></div>
            <div><?=lang('note2')?></div>
            <div><?=lang('note3')?></div>
            <br><br>
            <div><a href="javascript:;" class="btn_tuvan"><?=lang('batdaungay')?></a></div>
        </div>
        <div class="head_top1" style="display: none; margin-bottom: 20px;">
            <h1 class="titles"><?=lang('timhieuvedacuatoi')?></h1>
            <div><?=lang('traloi')?></div>
        </div>
        <?
        $i = 1;
        foreach($dscat as $val):
        $list = $this->tuvan->get_all_item($this->lang_id, $val->catid);
        ?>
        <div <?=($i == 1)?'style="display:none"':''?> id="tv_<?=$i?>" class="bl_tuvan">                                                           
            <h2><?=$val->name1?></h2>
            <ul class="ul_tuvan">
                <?foreach($list as $rs):?>
                <li><span tv_id="<?=$rs->id?>" catid="<?=$i?>" id="0" class="<?=($i==1)?'tvcheck1':'tvcheck'?>"><?=$rs->ten?></span></li>
                <?endforeach;?>
            </ul>
            <div class="clear"></div>
            <div class="pagi">
                <?if($i != 1){?>
                <input type="button" class="ltv prev" data_id="<?=($i-1)?>" value="<?=lang('trangtruoc')?>">
                <?}?>
                <?if($i != count($dscat)){?>
                <input type="button" class="ltv next" data_id="<?=($i+1)?>" value="<?=lang('tieptheo')?>" disabled="disabled">
                <?}?>
                <?if($i == count($dscat)){?>
                <input type="button" class="ltv ok_result" value="<?=lang('ketqua')?>" disabled="disabled">
                <?}?>
            </div>
        </div>
        <?
        $i++;
        endforeach;?>
        <div id="ketqua" style="display: none;">
            <h1 class="titles"><?=lang('moiquantam')?></h1>
            <div class="result_content">
                
            </div>
        </div>
    </div>                        
</div>
<div class="cr_tuvan">
    <img src="<?=base_url()?>templates/images/bg_tuvan.jpg" alt="">
</div>
<script type="text/javascript">
    var max = <?=$i-1?>;
</script>
</div>
<div id="page2">

</div>