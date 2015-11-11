<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Tên</td>
        <td><input type="text" name="vdata[name]" value="<?php echo $rs->name?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Link</td>
        <td><input type="text" name="vdata[link]" value="<?php echo $rs->link?>" class="w300"></td>
    </tr>
    <tr>
        <td class="label">Hình ảnh</td>
        <td><input type="file" name="userfile"> (Kích thước: 1000 x 350 pixcel)</td>
    </tr>
</table>
<?php echo form_close();?>