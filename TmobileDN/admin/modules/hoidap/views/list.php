<?echo form_open('hoidap/dels',  array('id' => 'admindata'));?> 
<input type="hidden" name="page" value="<?=$this->uri->segment(4)?>">
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th colspan="7">
                Hiện có <?=$num?> liên hệ <span class="pages"><?=$pagination?></span>
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Nội dung câu hỏi</th>
            <th style="width: 200px;">Họ tên</th>
            <th style="width: 200px;">Email</th>
            <th style="width: 130px;">Ngày gửi</th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    //var_dump($list);
    foreach($list as $rs):
    ?>
    <tr class="row<?=$rs->is_read?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?=$rs->id?>"></td>
        <td><?=$rs->id?></td>
        <td><a href="<?=site_url('hoidap/edit/'.$rs->id)?>"><?=$rs->content?></a></td>
        <td><?=$rs->fullname?></td>
        <td><?=$rs->email?></td>
        <td><?=date('H:i:s d/m/Y',$rs->time)?></td>

        <td align="center">
            <span id="publish<?php echo $rs->id?>"><?php echo icon_active("'hoidap'","'id'",$rs->id,$rs->published)?></span>
            <?=icon_del('hoidap/del/'.$rs->id.'/'.(int)$this->uri->segment(4))?>        
        </td>
    </tr>        
    <?
    $k=1-$k;
    endforeach;
    ?>
            <tfoot>
                <td colspan="7">

                    Hiện có <?=$num?> liên hệ <span class="pages"><?=$pagination?></span>
                </td>
            </tfoot>    
</table>
<?=form_close()?>
