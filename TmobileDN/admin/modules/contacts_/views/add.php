
<?php echo form_open(uri_string(), array('id' => 'admindata')); ?>
<input type="hidden" name="cat_id" value="0">
<table class="form">

    <tr>
        <td class="label" style="width: 150px;">Trực thuộc Cơ Quan Tổ Chức:</td>
        <td>
            <select name="vdata[parent_id]" class="w300">
                <option value="0">Cơ Quan Tổ Chức</option>
                <?foreach($listmain as $val):
                //var_dump($listmain);
                $listsub = $this->office->get_all_office($val->cat_id);
                ?>
                <option value="<?php echo $val->id ?>" <?= ($val->id == $rs->parent_id) ? 'selected="selected"' : ''; ?>><?php echo $val->title ?></option>
                <?endforeach;?>

            </select>
        </td>
    </tr>

    <tr>
        <td class="label" style="width: 150px;">Hiển thị</td>
        <td>
            <input type="radio" name="vdata[published]" value="1" <?php echo ($rs->published == 1) ? 'checked="checked"' : ''; ?>>Có
            <input type="radio" name="vdata[published]" value="0" <?php echo ($rs->published == 0) ? 'checked="checked"' : ''; ?>> Không 
        </td>
    </tr>
    <tr>
        <td class="label">Sắp xếp</td>
        <td><input type="text" name="vdata[ordering]" value="<?= $rs->ordering ?>"></td>
    </tr>
        <tr>
            <td class="label" style="width: 150px;">Tên Cơ Quan Tổ Chức </td>
            <td><input type="text" name="vdata[title]" value="<?php echo $list->title ?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Website</td>
            <td><input type="text" name="vdata[website]" value="<?php echo $list->website ?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Email</td>
            <td><input type="text" name="vdata[email]" value="<?php echo $list->email ?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Địa chỉ</td>
            <td><input type="text" name="vdata[address]" value="<?php echo $list->address ?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">SĐT</td>
            <td><input style="width: 150px;" type="text" name="vdata[phone_1]" value="<?php echo $list->phone_1?>" class="w300"><span> - </span><input style="width: 150px;" type="text" name="vdata[phone_2]" value="<?php echo $list->phone_2 ?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Fax</td>
            <td><input style="width: 150px;" type="text" name="vdata[fax]" value="<?php echo $list->fax ?>" class="w300"></td>
        </tr>
        <tr>
            <td class="label">Ghi chú</td>
            <td>
                <textarea style="width: 400px;" rows="2" name="vdata[note]"><?= $list->cat_keyword ?></textarea>
            </td>
        </tr>
    </table>
<?//endforeach;?>
<?php echo form_close(); ?>