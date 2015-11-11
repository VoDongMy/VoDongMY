<?php echo form_open(uri_string(),  array('id' => 'admindata'));?> 
<table class="admindata">
    <thead>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Tên danh mục</th>
            <th style="width: 100px;">Sắp xếp <?php echo action_order()?></th>
            <th class="fc">Chức năng</th>
            
        </tr>        
    </thead>
    <?
    $k = 1;
    foreach($list as $rs):
    $sub = $this->pcat->get_list_cat($rs->catid);
    ?>
    <tr class="row1">
        <td align="center"><input type="checkbox" name="ar_id[]" value="<?php echo $rs->catid?>"></td>
        <td><?php echo $rs->catid?></td>
        <td><a href="<? echo site_url('pcat/editmaincat/'.$rs->catid)?>"><?php echo $rs->name?></a></td>
        <td align="center">
            <input type="text" class="order" name="order_<?php echo $rs->catid?>" value="<?php echo $rs->ordering?>">
            <input type="hidden" name="id[]" value="<?php echo $rs->catid?>">
        </td>
        <td align="center">
            <?php echo icon_edit('pcat/editmaincat/'.$rs->catid)?>
            <span id="publish<?php echo $rs->catid?>"><?php echo icon_active("'pcat'","'catid'",$rs->catid,$rs->published)?></span>
            <?php echo icon_del('pcat/delmaincat/'.$rs->catid)?>
        </td>
    </tr>
    <?foreach($sub as $rs1):?>
    <tr class="row0">
        <td align="center"><input type="checkbox" name="ar_id[]" value="<?php echo $rs1->catid?>"></td>
        <td><?php echo $rs->catid?></td>
        <td>|___ <a href="<? echo site_url('pcat/editmaincat/'.$rs1->catid)?>"><?php echo $rs1->name?></a></td>
        <td align="center">
            <input type="text" class="order" name="order_<?php echo $rs1->catid?>" value="<?php echo $rs1->ordering?>">
            <input type="hidden" name="id[]" value="<?php echo $rs1->catid?>">
        </td>
        <td align="center">
            <?php echo icon_edit('pcat/editmaincat/'.$rs1->catid)?>
            <span id="publish<?php echo $rs1->catid?>"><?php echo icon_active("'pcat'","'catid'",$rs1->catid,$rs1->published)?></span>
            <?php echo icon_del('pcat/delmaincat/'.$rs1->catid)?>
        </td>
    </tr>
    <?endforeach;?>
    
    <?
    $k = 1 - $k;
    endforeach;?>
   
</table>
<?php echo form_close()?>
<script type="text/javascript">
function save_order(){
    //load_show();
    var fields = $("#admindata :input").serializeArray();
    $.post(base_url+"pcat/save_order_maincat",fields, function(data) {
        location.reload();
    });
}
</script>
