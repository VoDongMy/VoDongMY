<?php echo form_open(uri_string(),  array('id' => 'admindata'));?> 
<table class="admindata">
    <thead>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Tên danh mục</th>
            <th style="width: 70px;">Trang chủ</th>
            <th style="width: 100px;">Sắp xếp <?php echo action_order()?></th>
            <th class="fc">Chức năng</th>
            
        </tr>        
    </thead>
    <?
    $k = 1;
    foreach($list as $rs):
    $list1 = $this->pcat->get_list_cat($rs->catid);
    ?>
    <tr class="row<?php echo $k?>">
        <td align="center"><input type="checkbox" name="ar_id[]" value="<?php echo $rs->catid?>"></td>
        <td><?php echo $rs->catid?></td>
        <td><a href="<? echo site_url('pcat/edit/'.$catid.'/'.$rs->catid)?>"><?php echo $rs->name?></a></td>
        <td align="center"><img src="<?=base_url()?>templates/icon/<?=($rs->is_home == 0)?'un_':''?>check.png" alt=""></td>
        <td align="center">
            <input type="text" class="order" name="order_<?php echo $rs->catid?>" value="<?php echo $rs->ordering?>">
            <input type="hidden" name="id[]" value="<?php echo $rs->catid?>">
        </td>
        <td align="center">
            <?php echo icon_edit('pcat/edit/'.$catid.'/'.$rs->catid)?>
            <span id="publish<?php echo $rs->catid?>"><?php echo icon_active("'pcat'","'catid'",$rs->catid,$rs->published)?></span>
            <?php echo icon_del('pcat/del/'.$catid.'/'.$rs->catid)?>
        </td>
    </tr>
    <?
    foreach($list1 as $rs1): 
    ?>
    <tr class="row<?php echo $k?>">
        <td align="center"><input type="checkbox" name="ar_id[]" value="<?php echo $rs1->catid?>"></td>
        <td><?php echo $rs1->catid?></td>
        <td>|____<a href="<? echo site_url('pcat/edit/'.$catid.'/'.$rs1->catid)?>"><?php echo $rs1->name?></a></td>
        <td align="center"><img src="<?=base_url()?>templates/icon/<?=($rs1->is_home == 0)?'un_':''?>check.png" alt=""></td>
        <td align="center">
            <input type="text" class="order" name="order_<?php echo $rs1->catid?>" value="<?php echo $rs1->ordering?>">
            <input type="hidden" name="id[]" value="<?php echo $rs1->catid?>">
        </td>
        <td align="center">
            <?php echo icon_edit('pcat/edit/'.$catid.'/'.$rs1->catid)?>
            <span id="publish<?php echo $rs1->catid?>"><?php echo icon_active("'pcat'","'catid'",$rs1->catid,$rs1->published)?></span>
            <?php echo icon_del('pcat/del/'.$catid.'/'.$rs1->catid)?>
        </td>
    </tr>
    <?
    $k = 1 - $k;
    endforeach;?>  
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
