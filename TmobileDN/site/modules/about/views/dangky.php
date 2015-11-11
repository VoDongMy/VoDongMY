<h1 class="title_dangkyemail"><?=lang('dangkyemail')?></h1>
<div><?=lang('dangky_ghichu')?></div>
<?=form_open(uri_string(),array('id'=>'form_dangky'))?>
<table class="dangkyemail">
    <tr>
        <td>
            <div><?=lang('ho')?> <span>(*)</span></div>
            <div><input type="text" name="firstname" value="<?=set_value('firstname')?>"></div>
        </td>
        <td>
            <div><?=lang('ten')?> <span>(*)</span></div>
            <div><input type="text" name="lastname" value="<?=set_value('lastname')?>"></div>
        </td>
    </tr>
    <tr>
        <td>
            <div><?=lang('diachiemail')?> <span>(*)</span></div>
            <div><input type="text" name="email" id="email" value="<?=set_value('email')?>"></div>
        </td>
        <td>
            <div><?=lang('nhap_diachiemail')?> <span>(*)</span></div>
            <div><input type="text" name="re_email" value="<?=set_value('re_email')?>"></div>
        </td>
    </tr>
    <tr>
        <td>
            <div><?=lang('diachi1')?></div>
            <div><input type="text" name="address1" value="<?=set_value('address1')?>"></div>
        </td>
        <td>
            <div><?=lang('diachi2')?></div>
            <div><input type="text" name="address2" value="<?=set_value('address2')?>"></div>
        </td>
    </tr>
    <tr>
        <td>
            <div><?=lang('thanhpho')?></div>
            <div><input type="text" name="city" value="<?=set_value('city')?>"></div>
        </td>
        <td>
            <div><?=lang('quocgia')?></div>
            <div><input type="text" name="country" value="<?=set_value('country')?>"></div>
        </td>
    </tr>
    <tr>
        <td>
            <div><?=lang('dienthoaididong')?></div>
            <div><input type="text" name="mobile" value="<?=set_value('mobile')?>"></div>
        </td>
        <td></td>
    </tr>
</table>
<div>
    <input type="checkbox" name="read_s" id="check1" value="1" <?=(set_value('read_s') == 1)?'checked="checked"':''?>>
    <label for="check1"><span style="color: #FF0000;">(*)</span> <?=lang('label_dongy')?></label>
    <div for="read_s" generated="true" class="error" style="display: none;"><?=lang('v_choice')?></div>
</div>
<div>
    <input type="checkbox" name="check_mail" id="check2" value="1" <?=(set_value('check_mail') == 1)?'checked="checked"':''?>>
    <label for="check2"><span style="color: #FF0000;">(*)</span> <?=lang('label_nhanmail')?></label>
    <div for="check_mail" generated="true" class="error" style="display: none;"><?=lang('v_choice')?></div>
</div>
<br>
<div><input type="submit" class="bnt_submit" value="<?=lang('guidangky')?>"></div>
<?=form_close()?>
<script type="text/javascript">
    var v_ho = '<?=lang('v_ho')?>';
    var v_ten = '<?=lang('v_ten')?>';
    var v_email = '<?=lang('v_email')?>';
    var v_re_email = '<?=lang('v_re_email')?>';
    var v_invail_email = '<?=lang('v_invail_email')?>';
    var v_form_email_to = '<?=lang('v_form_email_to')?>';
    var v_choice = '<?=lang('v_choice')?>';
    $("#form_dangky").validate({
        errorElement: "div",
        ignore: "",
        rules: {
            'firstname': {required :true},
            'lastname': {required :true},
            'email': {required :true,email:true},
            're_email': {required :true,email:true, equalTo: "#email"},
            'read_s': {required :true},
            'check_mail': {required :true}
        },
        messages: {
            'firstname': {required :v_ho},
            'lastname': {required :v_ten},
            'email': {required :v_email,email:v_invail_email},
            're_email': {required :v_re_email,email:v_invail_email, equalTo:v_form_email_to},
            'read_s': {required: v_choice},
            'check_mail': {required: v_choice} 
        }
    })
</script>