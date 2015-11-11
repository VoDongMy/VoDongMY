<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="catid" value="<?=$rs->catid?>">
<table style="width: 100%;">
    <tr>
        <td style="width: 250px; padding-right: 10px;">
            <h3>Danh mục chính</h3>
            <select name="vdata[parent_id]" style="width: 100%;" size="40">
                <?foreach($list as $row):
                $sub = $this->pcat->get_list_cat($row->catid);
                ?>
                    <option value="<?=$row->catid?>" <?=($row->catid == $rs->parent_id)?'selected="selected"':''?>><?=$row->name?></option>
                    <?foreach($sub as $row1):?>
                        <option value="<?=$row1->catid?>" <?=($row1->catid == $rs->parent_id)?'selected="selected"':''?>>|___<?=$row1->name?></option>
                    <?endforeach;?>
                <?endforeach;?>
            </select>
        </td>
        <td>
            <table class="form">
                <tr>
                    <td class="label" style="width: 150px;">Danh mục</td>
                    <td><input type="text" name="vdata[name]" value="<?php echo $rs->name?>" class="w300"></td>
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
                        <?if($rs->icon != ''){?>
                           <img src="<?=base_url_site()?>data/pcat/80/<?=$rs->icon?>" alt=""><br />
                        <?}?>
                        <input type="file" name="userfile">
                    </td>
                </tr>
                <tr>
                    <td class="label">Hiển thị ở Trang chủ</td>
                    <td>
                        <input type="checkbox" name="is_home" value="1" <?=($rs->is_home == 1)?'checked="checked"':''?>>
                    </td>
                </tr>
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
        </td>
    </tr>
</table>
<?php echo form_close();?>