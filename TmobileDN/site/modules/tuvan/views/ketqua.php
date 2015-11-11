<ul>
    <li>
        <?
        $str = '';
        foreach($list as $val):?>
            <?$str.='<b>'.$val->ten.'</b>, '?>
        <?endforeach?>
        <?
        echo trim($str,', ');
        ?>
    </li>
    <?foreach($dscat as $val):?>
    <li><?=$val->name1?> <b><?=$val->ten?></b></li>
    <?endforeach;?>
</ul>
<div class="pagi">
    <input type="hidden" name="ar_id" value="<?=$ar_id?>">
    <input type="button" class="ltv xemketqua" value="<?=lang('xemketqua')?>">
</div>