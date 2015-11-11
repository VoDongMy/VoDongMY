<?php echo form_open('product/dels',  array('id' => 'admindata'));?>
<input type="hidden" name="page" value="<?=$this->uri->segment(3)?>" style="width: 100%;">
<table class="admindata">
    <thead>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Loại da</th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->id_loaida?>"></td>
        <td align="center"><?=$rs->id_loaida?></td>
        <td>
            <a href="<?=site_url('tuvan/loaida/edit/'.$rs->id_loaida)?>"><?=$rs->tenda?></a>
        </td>
        <td align="center">
            <?php echo icon_edit('tuvan/loaida/edit/'.$rs->id_loaida)?>
            <?php echo icon_del('tuvan/loaida/del/'.$rs->id_loaida)?>
        </td>
    </tr>       
    <?php
    $k=1-$k;
    endforeach;
    ?>    
</table>
<?php echo form_close()?>