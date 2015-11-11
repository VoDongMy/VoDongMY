<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Tên ngôn ngữ</td>
        <td><input type="text" name="vdata[lang_name]" value="<?php echo $rs->lang_name?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Icon</td>
        <td><input type="text" name="vdata[lang_icon]" value="<?php echo $rs->lang_icon?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Mã ngôn ngữ</td>
        <td><input type="text" name="vdata[lang_dir]" value="<?php echo $rs->lang_dir?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Ngôn ngữ mặc định</td>
        <td><input type="checkbox" name="lang_default" value="1" <?=($rs->lang_default == 1)?'checked="checked"':''?>></td>
    </tr>
    <tr>
        <td class="label">Sắp xếp</td>
        <td><input type="text" name="vdata[lang_order]" value="<?=$rs->lang_order?>"></td>
    </tr>

</table>
<?php echo form_close();?>