<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="cat_id" value="0">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục</td>
        <td>
            <select name="vdata[cat_id]" class="w300">
                <?foreach($dscat as $val):
                $dscat1 = $this->product->get_all_cat($val->cat_id);
                ?>
                <option value="<?php echo $val->cat_id?>"><?php echo $val->name?></option>
                <?foreach($dscat1 as $val1):?>
                <option value="<?=$val1->cat_id?>">|___<?=$val1->name?></option>
                <?endforeach;?>
                <?endforeach;?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label">Kích thước</td>
        <td>
            <input type="text" name="vdata[size]">
        </td>
    </tr>
    <tr>
        <td class="label">Sản phẩm nổi bật</td>
        <td><input type="checkbox" name="vdata[is_new]" value="1" <?=($rs->is_news == 1)?'checked="checked"':''?>></td>
    </tr>
    <tr>
        <td class="label">Hiển thị</td>
        <td>
            <input type="radio" name="vdata[published]" value="1" checked="checked" >Có
            <input type="radio" name="vdata[published]" value="0"> Không 
        </td>
    </tr>
    <tr>
        <td class="label">Hình ảnh</td>
        <td>
            <input type="file" name="userfile">
        </td>
    </tr>
</table>
<?foreach($this->language as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <table class="form">
        <tr>
            <td class="label" style="width: 150px;">Tên sản phẩm</td>
            <td><input type="text" name="vdata[title][<?=$lang->lang_id?>]" value="<?php echo set_value('vdata[title]['.$lang->lang_id.']')?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Giá bán <?=($lang->lang_default == 1)?'VNĐ':'USD'?></td>
            <td><input type="text" style="width: 100px;" name="vdata[price][<?=$lang->lang_id?>]" value="<?php echo set_value('vdata[price]['.$lang->lang_id.']')?>" id="price_<?=$lang->lang_id?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label">Giới thiệu</td>
            <td>
                <?=vnit_editor(htmlspecialchars_decode(set_value('vdata[gioithieu]['.$lang->lang_id.']')),'vdata[gioithieu]['.$lang->lang_id.']','gioithieu_'.$lang->lang_id)?>
            </td>
        </tr>
    </table>
</div>
<?endforeach;?>
<?php echo form_close();?>
<script type="text/javascript" src="<?=base_url()?>templates/js/core/price_format.js" charset="UTF-8"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#price_1").priceFormat({
        prefix: '',
        centsSeparator: '', 
        thousandsSeparator: ',',
        limit: false,
        centsLimit: 0,
        clearPrefix: false,
        allowNegative: false
    })
    $("#price_2").priceFormat({
        prefix: '',
        centsSeparator: '.', 
        thousandsSeparator: ',',
        limit: false,
        centsLimit: 1,
        clearPrefix: false,
        allowNegative: false
    })
})
</script>