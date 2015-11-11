<?php echo form_open(uri_string(),  array('id' => 'admindata'));?> 
<input type="hidden" name="page" value="<?php echo set_post_page()?>">
<table class="admindata">
    <thead>
        <tr>
            <th class="id">ID</th>
            <th style="width: 40px;">Icon</th>
            <th>Tên ngôn ngữ</th>
            <th>Mã</th>
            <th>Thứ tự</th>
            <th class="fc">Chức năng</th>
            
        </tr>        
    </thead>
    <?
    $k = 1;
    foreach($list as $rs):
    ?>
    <tr class="row<?php echo $k?>">
        <td><?php echo $rs->lang_id?></td>
        <td align="center"><img src="<?=base_url()?>templates/images/flags/<?=$rs->lang_icon?>.png" alt=""></td>
        <td><a href="<? echo site_url('sys_language/edit/'.$rs->lang_id)?>"><?php echo $rs->lang_name?></a> <?=($rs->lang_default == 1)?'<b>(Mặc định)</b>':''?></td>
        <td><?=$rs->lang_dir?></td>
        <td><?=$rs->lang_order?></td>
        <td align="center">
            <?php echo icon_edit('sys_language/edit/'.$rs->lang_id)?>
            <?if($rs->lang_default != 1){?>
            <?php echo icon_del('sys_language/del/'.$rs->lang_id)?>
            <?}?>
        </td>
    </tr>
    <?
    $k = 1 - $k;
    endforeach;?>
</table>
<?php echo form_close()?>
