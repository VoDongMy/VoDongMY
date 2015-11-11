<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="cat_id" value="0">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục cha</td>
        <td>
            <select name="vdata[parent_id]" id="catid" class="w300">
                <option value="0">Danh mục cha</option>
                <?foreach($listmain as $val):
                    $listsub = $this->category->get_all_category($val->cat_id);
                ?>
                <option value="<?php echo $val->cat_id?>" <?=($val->cat_id == $rs->parent_id)?'selected="selected"':'';?>><?php echo $val->name?></option>
                <!--
                    <?foreach($listsub as $val1):?>
                    <option value="<?php echo $val1->cat_id?>" <?=($val1->cat_id == $rs->parent_id)?'selected="selected"':'';?>>|__<?php echo $val1->cat_name?></option>    
                    <?endforeach;?>
                    -->
                <?endforeach;?>
                
            </select>
        </td>
    </tr>
    <tr class="mainc">
        <td class="label">Vị trí Menu</td>
        <td>
            <select name="vdata[cot]">
                <option value="1" <?=($rs->cot == 1)?'selected="selected"':''?>>Cột 1</option>
                <option value="2" <?=($rs->cot == 2)?'selected="selected"':''?>>Cột 2</option>
            </select>
        </td>
    </tr>
    <tr class="mainc1">
        <td class="label">Ảnh Menu</td>
        <td>
            <input type="file" name="userfile">
        </td>
    </tr>
    <tr>
        <td class="label">Ảnh danh mục</td>
        <td>
            <input type="file" name="userfile1">
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
        <td><input type="text" name="vdata[ordering]" value="<?=$rs->ordering?>"></td>
    </tr>
</table>
<?foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Danh mục</td>
        <td><input type="text" name="vdata[name][<?=$lang->lang_id?>]" value="<?php echo $lang->name?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label">Miêu tả</td>
        <td>
            <textarea style="width: 400px;" rows="2" name="vdata[des][<?=$lang->lang_id?>]"><?=$lang->des?></textarea>
        </td>
    </tr>
    <tr>
        <td class="label">Từ khóa</td>
        <td>
            <textarea style="width: 400px;" rows="2" name="vdata[keyword][<?=$lang->lang_id?>]"><?=$lang->keyword?></textarea>
        </td>
    </tr>
</table>
</div>
<?endforeach;?>
<?php echo form_close();?>
<script type="text/javascript">
$(document).ready(function() {
   var catid = $("#catid").val();
   if(catid == 0){
       $(".mainc").hide()
   }else if(catid == 1 || catid == 2 || catid == 17){
       $(".mainc").show()
       $(".mainc1").hide()
   }
   
   $("#catid").change(function(){
       var catid = $(this).val();
       if(catid == 0){
           $(".mainc").hide()
       }else if(catid == 1 || catid == 2 || catid == 17){
           $(".mainc").show()
           $(".mainc1").show()
       }
       
   })
})
</script>