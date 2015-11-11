<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="cat_id" value="0">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Loại da</td>
        <td>
            <select name="vdata[th_id]">
                <?foreach($dscat as $val):?>
                <option value="<?=$val->id?>" <?=($rs->th_id == $val->id)?'selected="selected"':''?>><?=$val->ten?></option>
                <?endforeach;?>
            </select>
        </td>
    </tr>
</table>
<?foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <table class="form">
        <tr>
            <td class="label" style="width: 150px;">Tên loại da</td>
            <td><input type="text" name="vdata[tenda][<?=$lang->lang_id?>]" value="<?php echo $lang->tenda?>" class="w500"></td>
        </tr>
        <tr>
            <td class="label">Miêu tả</td>
            <td>
                <?=vnit_editor(htmlspecialchars_decode($lang->noidung),'vdata[noidung]['.$lang->lang_id.']','congdung_'.$lang->lang_id)?>
            </td>
        </tr>
    </table>
</div>
<?endforeach;?>
<?php echo form_close();?>