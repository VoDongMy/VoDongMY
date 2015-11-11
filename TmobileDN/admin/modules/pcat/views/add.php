<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<input type="hidden" name="catid" value="0">
<table style="width: 100%;">
    <tr>
        <td style="width: 250px; padding-right: 10px;">
            <h3>Danh mục chính</h3>
            <select name="vdata[parent_id]" style="width: 100%;" size="40">
                <?foreach($list as $row):
                $sub = $this->pcat->get_list_cat($row->catid);
                ?>
                    <option value="<?=$row->catid?>" <?=($row->catid == $catid)?'selected="selected"':''?>><?=$row->name?></option>
                    <?foreach($sub as $row1):?>
                        <option value="<?=$row1->catid?>">|___<?=$row1->name?></option>
                    <?endforeach;?>
                <?endforeach;?>
            </select>
        </td>
        <td>
            <table class="form">
                <tr>
                    <td class="label" style="width: 150px;">Danh mục</td>
                    <td><input type="text" name="vdata[name]" value="<?php echo set_value('vdata[name]')?>" class="w300"></td>
                </tr>
                <tr>
                    <td class="label">Hiển thị</td>
                    <td>
                        <input type="radio" name="vdata[published]" value="1" <?php echo (set_value('vdata[published]') == 1)?'checked="checked"':'checked="checked"';?>>Có
                        <input type="radio" name="vdata[published]" value="0" <?php echo (set_value('vdata[published]') == 0)?'checked="checked"':'';?>> Không 
                    </td>
                </tr>

                <tr>
                    <td class="label">Sắp xếp</td>
                    <td><input type="text" name="vdata[ordering]" value="<?=set_value('vdata[ordering]')?>"></td>
                </tr>
                <tr>
                    <td class="label">Miêu tả</td>
                    <td>
                        <textarea style="width: 400px;" rows="2" name="vdata[des]"><?=set_value('vdata[des]')?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="label">Từ khóa</td>
                    <td>
                        <textarea style="width: 400px;" rows="2" name="vdata[keyword]"><?=set_value('vdata[keyword]')?></textarea>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<?php echo form_close();?>