<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<script type="text/javascript">
CKEDITOR.editorConfig = function( config ) {
config.height = 200;  
}
</script>
<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="otp[cat_id_]" value="<?=$this->request->get['cat_id']?>">
<input type="hidden" name="otp[key_]" value="<?=$this->request->get['key']?>">
<input type="hidden" name="otp[page_]" value="<?=(int)$this->uri->segment(4)?>">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục</td>
        <td>
            <select name="vdata[cat_id]" class="w300">
                <?foreach($dscat as $val):
                $dscat1 = $this->product->get_all_cat($val->cat_id);
                ?>
                <option value="<?php echo $val->cat_id?>" <?=($val->cat_id == $rs->cat_id)?'selected="selected"':'';?>><?php echo $val->name?></option>
                <?foreach($dscat1 as $val1):?>
                <option value="<?=$val1->cat_id?>" <?=($val1->cat_id == $rs->cat_id)?'selected="selected"':'';?>>|___<?=$val1->name?></option>
                <?endforeach;?>
                <?endforeach;?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label">Kích thước</td>
        <td>
            <input type="text" name="vdata[size]" value="<?=$rs->size?>">
        </td>
    </tr>
    <tr>
        <td class="label">Sản phẩm nổi bật</td>
        <td><input type="checkbox" name="vdata[is_new]" value="1" <?=($rs->is_new == 1)?'checked="checked"':''?>></td>
    </tr>

    <tr>
        <td class="label">Hiển thị</td>
        <td>
            <input type="radio" name="vdata[published]" value="1" <?php echo ($rs->published == 1)?'checked="checked"':'';?>>Có
            <input type="radio" name="vdata[published]" value="0" <?php echo ($rs->published == 0)?'checked="checked"':'';?>> Không 
        </td>
    </tr>
    <tr>
        <td class="label">Hình ảnh</td>
        <td>
            <?if($rs->images != ''){?>
            <img width="100" src="<?=base_url_site()?>data/product/200/<?=$rs->images?>" alt=""><br>
            <?}?>
            <input type="file" name="userfile">
        </td>
    </tr>

</table>
<?foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <table class="form">
        <tr>
            <td class="label" style="width: 150px;">Tên sản phẩm</td>
            <td><input type="text" style="width: 98%;" name="vdata[title][<?=$lang->lang_id?>]" value="<?php echo $lang->title?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Giá bán <?=($lang->lang_default == 1)?'VNĐ':'USD'?></td>
            <td><input type="text" style="width: 100px;" name="vdata[price][<?=$lang->lang_id?>]" value="<?php echo ($lang->lang_default == 1)?number_format($lang->price,0,',','.'):number_format($lang->price,1,',','.')?>" id="price_<?=$lang->lang_id?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label">Giới thiệu</td>
            <td>
                <?=vnit_editor(htmlspecialchars_decode($lang->gioithieu),'vdata[gioithieu]['.$lang->lang_id.']','gioithieu_'.$lang->lang_id)?>
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