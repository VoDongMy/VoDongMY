<?=form_open(uri_string(),array('id'=>'admindata'))?>
<input type="hidden" name="to" value="<?=$rs->email?>">
<table class="form">
    <tr>
        <td class="label">Họ tên</td>
        <td><?php echo $rs->fullname?></td>
    </tr>

    <tr>
        <td class="label">Điện thoại</td>
        <td><?php echo $rs->phone?></td>
    </tr>
    <tr>
        <td class="label">Email</td>
        <td>
            <?php echo $rs->email?>
        </td>
    </tr>
    <tr>
        <td class="label">Ngày gửi</td>
        <td><?php echo date('H:i:s d/m/Y',$rs->time)?></td>
    </tr>
    <tr>
        <td class="label">Nội dung câu hỏi</td>
        <td><?php echo $rs->content?></td>
    </tr> 
    <tr>
        <td class="label">Người trả lời câu hỏi</td>
        <td><input type="text" name="respondent" value="<?php echo $rs->respondent?>" class="w300"></td>
    </tr>   
    <tr>
        <td class="label">Nội dung phản hồi</td>
        <td><?=vnit_editor($rs->answer,'content','full')?><?php// echo $rs->answer?></td>
    </tr>
</table>
<?=form_close();?>
