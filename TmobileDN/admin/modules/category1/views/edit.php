<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="cat_id" value="0">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục cha</td>
        <td>
            <select name="vdata[parent_id]" class="w300">
                <option value="0">Danh mục cha</option>
                <?foreach($listmain as $val):
                    $listsub = $this->category->get_all_category($val->cat_id);
                ?>
                <option value="<?php echo $val->cat_id?>" <?=($val->cat_id == $rs->parent_id)?'selected="selected"':'';?>><?php echo $val->cat_name?></option>
                <!--
                    <?foreach($listsub as $val1):?>
                    <option value="<?php echo $val1->cat_id?>" <?=($val1->cat_id == $rs->parent_id)?'selected="selected"':'';?>>|__<?php echo $val1->cat_name?></option>    
                    <?endforeach;?>
                    -->
                <?endforeach;?>
                
            </select>
        </td>
    </tr>
    <tr>
        <td class="label">Hiển thị</td>
        <td>
            <input type="radio" name="vdata[published]" value="1" <?php echo ($rs->published == 1)?'checked="checked"':'';?>>Có
            <input type="radio" name="vdata[published]" value="0" <?php echo ($rs->published == 0)?'checked="checked"':'';?>> Không 
        </td>
    </tr>
    <tr>
        <td class="label">Sắp xếp</td>
        <td><input type="text" name="vdata[cat_order]" value="<?=$rs->cat_order?>"></td>
    </tr>
</table>
<?foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục</td>
        <td><input type="text" name="vdata[cat_name][<?=$lang->lang_id?>]" value="<?php echo $lang->cat_name?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label">Miêu tả</td>
        <td>
            <textarea style="width: 400px;" rows="2" name="vdata[cat_des][<?=$lang->lang_id?>]"><?=$lang->cat_des?></textarea>
        </td>
    </tr>
    <tr>
        <td class="label">Từ khóa</td>
        <td>
            <textarea style="width: 400px;" rows="2" name="vdata[cat_keyword][<?=$lang->lang_id?>]"><?=$lang->cat_keyword?></textarea>
        </td>
    </tr>
</table>
</div>
<?endforeach;?>
<?php echo form_close();?>