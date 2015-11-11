<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="cat_id" value="0">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục</td>
        <td>
            <select name="vdata[catid]">
                <?foreach($dscat as $val):?>
                <option value="<?=$val->catid?>" <?=($val->catid == $rs->catid)?'selected="selected"':''?>><?=$val->name1?></option>
                <?endforeach;?>
            </select>
        </td>
    </tr>
</table>
<?foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <table class="form">
        <tr>
            <td class="label" style="width: 150px;">Tiêu đề</td>
            <td><input type="text" name="vdata[ten][<?=$lang->lang_id?>]" value="<?php echo $lang->ten?>" class="w500"></td>
        </tr>
    </table>
</div>
<?endforeach;?>
<?php echo form_close();?>