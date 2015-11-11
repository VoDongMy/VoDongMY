<?php echo form_open('ticker/category/dels',  array('id' => 'admindata'));?> 
<input type="hidden" name="page" value="<?php echo set_post_page()?>">
<table class="admindata">
    <thead>
        <tr>
            <th class="id">ID</th>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th>Danh mục</th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k = 1;
    foreach($list as $rs):
    ?>
    <tr class="row<?php echo $k?>">
        <td><?php echo $rs->catid?></td>
        <td align="center"><input type="checkbox" name="ar_id[]" value="<?php echo$rs->cat_id?>"></td>
        <td><a href="<? echo site_url('tuvan/editcat/'.$rs->catid)?>"><?php echo $rs->name1?></a></td>
        <td align="center">
            <?php echo icon_edit('tuvan/editcat/'.$rs->catid)?>
            <?if($rs->catid != 1 && $rs->catid != 2){?>
            <?php echo icon_del('tuvan/delcat/'.$rs->catid)?>
            <?}?>
        </td>
    </tr>
    <?
    $k = 1 - $k;
    endforeach;?>
</table>
<?php echo form_close()?>
