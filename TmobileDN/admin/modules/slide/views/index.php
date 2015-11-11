<?php echo form_open('product/dels',  array('id' => 'admindata'));?> 
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th colspan="7">
                Hiện có <?php echo count($list)?> Slide
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Tên</th>
            <th>Hình</th>
            <th style="width: 100px;">Sắp xếp <?php echo action_order()?></th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->id?>"></td>
        <td><?=$rs->id?></td>
        <td><a href="<?=site_url('slide/edit/'.$rs->id)?>"><?=$rs->name?></a></td>
        <td><img src="<?=base_url_site()?>data/slide/<?=$rs->path?>" height="100" alt=""></td>
        <td align="center">
            <input type="text" class="order" name="order_<?php echo $rs->id?>" value="<?php echo $rs->ordering?>">
            <input type="hidden" name="id[]" value="<?php echo $rs->id?>">
        </td>
        <td align="center">
            <?php echo icon_edit('slide/edit/'.$rs->id)?>
            <?php echo icon_del('slide/del/'.$rs->id);?> 
        </td>
    </tr>       
    <?php
    $k=1-$k;
    endforeach;
    ?>
    <tfoot>
        <td colspan="7">
            Hiện có <?php echo count($list)?> Slide
        </td>
    </tfoot>    
</table>
<?php echo form_close()?>
<script type="text/javascript">
function save_order(){
    var fields = $("#admindata :input").serializeArray();
    $.post(base_url+"slide/save",fields, function(data) {
        location.reload();
    });
}
</script>