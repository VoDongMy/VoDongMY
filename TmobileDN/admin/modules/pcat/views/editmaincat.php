<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="catid" value="<?=$rs->catid?>">
<table class="form">
    <tr>
        <td class="label">Danh mục cha</td>
        <td>
            <select name="vdata[parent_id]" style="width: 308px;">
                <option value="0">Là danh mục cha</option>
                <?foreach($list as $val):?>
                <option value="<?=$val->catid?>" <?=($rs->parent_id == $val->catid)?'selected="selected"':''?>><?=$val->name?></option>
                <?endforeach;?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Tên danh mục</td>
        <td><input type="text" name="vdata[name]" value="<?php echo $rs->name?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Hình ảnh</td>
        <td><input type="file" name="userfile"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Mã mầu</td>
        <td><input type="text" name="vdata[css]" value="<?=$rs->css?>"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Hiển thị trang chủ</td>
        <td><input type="checkbox" name="is_home" value="1" <?=($rs->is_home == 1)?'checked="checked"':''?>></td>
    </tr>    
    <tr>
        <td class="label">Hiển thị</td>
        <td>
            <input type="radio" name="vdata[published]" value="1" <?php echo ($rs->published == 1)?'checked="checked"':'';?>>Có
            <input type="radio" name="vdata[published]" value="0" <?php echo ($rs->published == 0)?'checked="checked"':'';?>> Không 
        </td>
    </tr>
    <!--
    <tr>
        <td class="label">Hiển thị ở Menu</td>
        <td>
            <input type="checkbox" name="is_menu" value="1" <?=($rs->is_menu == 1)?'checked="checked"':''?>>
        </td>
    </tr>
    <tr>
        <td class="label">Hiển thị ở Trang chủ</td>
        <td>
            <input type="checkbox" name="is_home" value="1" <?=($rs->is_home == 1)?'checked="checked"':''?>>
        </td>
    </tr>
    -->
    <tr>
        <td class="label">Sắp xếp</td>
        <td><input type="text" name="vdata[ordering]" value="<?=$rs->ordering?>"></td>
    </tr>
    <tr>
        <td class="label">Miêu tả</td>
        <td>
            <textarea style="width: 400px;" rows="2" name="vdata[des]"><?=$rs->des?></textarea>
        </td>
    </tr>
    <tr>
        <td class="label">Từ khóa</td>
        <td>
            <textarea style="width: 400px;" rows="2" name="vdata[keyword]"><?=$rs->keyword?></textarea>
        </td>
    </tr>
</table>
<?php echo form_close();?>