<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Đóng mở website</td>
        <td>
            <input type="radio" name="site_close" value="0" <?=($this->config->item('site_close_vi') == 0)?'checked="checked"':'';?>> Mở
            <input type="radio" name="site_close" value="1" <?=($this->config->item('site_close_vi') == 1)?'checked="checked"':'';?>> Đóng 
        </td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Email</td>
        <td>
            <input type="text" name="site_email" class="w300" value="<?=$this->config->item('site_email_vi')?>">
        </td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Hotline</td>
        <td>
            <input type="text" name="site_hotline" class="w300" value="<?=$this->config->item('site_hotline_vi')?>">
        </td>
    </tr>
</table>
<?foreach($this->language as $lang):
$l = $lang->lang_dir;
?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <table class="form">
        <tr>
            <td class="label" style="width: 150px;">Tên website</td>
            <td>
                <input type="text" name="vdata[site_name_<?=$l?>]" class="w500" value="<?=$this->config->item('site_name_'.$l)?>"/>
            </td>
        </tr>
    
        <tr>
            <td class="label" style="width: 150px;">Từ khóa</td>
            <td>
                <textarea style="width: 500px;" rows="3" name="vdata[site_keyword_<?=$l?>]"><?=$this->config->item('site_keyword_'.$l)?></textarea>
            </td>
        </tr>
        <tr>
            <td class="label" style="width: 150px;">Miêu tả</td>
            <td>
                <textarea style="width: 500px;" rows="3" name="vdata[site_des_<?=$l?>]"><?=$this->config->item('site_des_'.$l)?></textarea>
            </td>
        </tr>

        <tr>
            <td class="label">Nội dung đóng site</td>
            <td><textarea style="width: 500px;" rows="5" name="vdata[site_close_msg_<?=$l?>]"><?=$this->config->item('site_close_msg_'.$l)?></textarea></td>
        </tr>
    </table>
</div>
<?endforeach?>
<?php echo form_close();?>