<?php echo form_open('duan/lienhe/dels',  array('id' => 'admindata'));?> 
<?$page = $this->uri->segment(3);?>
<input type="hidden" name="page" value="<?php echo $page?>">
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th colspan="9">
                Hiện có <?php echo $num?> Email đăng ký <span class="pages"><?php echo $pagination?></span>
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->catid?>"></td>
        <td><?=$rs->id?></td>
        <td><?=$rs->ho?></td>
        <td><?=$rs->ten?></td>
        <td><a href="<?=site_url('dangky/detail/'.$rs->id.'/'.$page)?>"><?=$rs->email?></a></td>
        <td><?=$rs->address1?></td>

        <td align="center">
            <?php echo icon_view('dangky/detail/'.$rs->id.'/'.$page)?>
            <?php echo icon_del('dangky/del/'.$rs->id.'/'.$page);?> 
        </td>
    </tr>       
    <?php
    $k=1-$k;
    endforeach;
    ?> 
    <tfoot>
        <td colspan="9">
            Hiện có <?php echo $num?> Email đăng ký <span class="pages"><?php echo $pagination?></span>
        </td>
    </tfoot> 
</table>
<?php echo form_close()?>