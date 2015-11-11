<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="cat_id" value="0">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Sắp xếp</td>
        <td><input type="text" name="vdata[ordering]" value="<?=set_value('vdata[ordering]')?>"></td>
    </tr>
</table>
<?foreach($this->language as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <table class="form">
        <tr>
            <td class="label" style="width: 150px;">Tên danh mục</td>
            <td><input type="text" name="vdata[name1][<?=$lang->lang_id?>]" value="<?php echo set_value('vdata[name1]['.$lang->lang_id.']')?>" class="w500"></td>
        </tr>
    </table>
</div>
<?endforeach;?>
<?php echo form_close();?>