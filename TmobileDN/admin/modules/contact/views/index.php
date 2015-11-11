<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?=form_open_multipart(uri_string(),array('id'=>'admindata'))?>
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Điện thoại</td>
        <td><input type="text" name="vdata[phone]" class="w300" value="<?=$rs->phone?>"></td>
    </tr>
    <tr>
        <td class="label">Fax</td>
        <td><input type="text" name="vdata[fax]" class="w300" value="<?=$rs->fax?>"></td>
    </tr>
    <tr>
        <td class="label">Email</td>
        <td><input type="text" name="vdata[email]" class="w300" value="<?=$rs->email?>"></td>
    </tr>
     <tr>
        <td class="label">Website</td>
        <td><input type="text" name="vdata[website]" class="w300" value="<?=$rs->website?>"></td>
    </tr>
    <tr>
        <td class="label">Tùy chọn</td>
        <td>
            <input type="checkbox" name="vdata[send_mail]" value="1" <?=($rs->send_mail == 1)?'checked="checked"':'';?>> Nhận thông tin liên hệ qua Email
        </td>
    </tr>
    <!--
    <tr>
        <td class="label">Hình ảnh</td>
        <td><input type="file" name="userfile"></td>
    </tr>
    -->
</table>
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Tọa độ bản đồ</td>
        <td>
            Lat: <input type="text" id="lat" name="vdata[lat]" value="<?=$rs->lat?>">
            Lng: <input type="text" id="lng" name="vdata[lng]" value="<?=$rs->lng?>">
        </td>
    </tr>
</table>
<?
$i = 1;
foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Tên liên hệ</td>
        <td><input type="text" class="w500" name="vdata[title][<?=$lang->lang_id?>]" value="<?=$lang->title?>"></td>
    </tr>
    <tr>
        <td class="label">Địa chỉ</td>
        <td>
            <input type="text" class="w300" <?=($i == 1)?'id="address"':''?>name="vdata[address][<?=$lang->lang_id?>]" value="<?=$lang->address?>">
            <?if($i == 1){?>
                <input type="button" onclick="getlocal()" value="Lấy tạo độ">
            <?}?>
            <div>Ví dụ: phường 25, Bình Thạnh, TPHCM, Việt Nam</div>
        </td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Nội dung</td>
        <td><?=vnit_editor($lang->intro,'vdata[intro]['.$lang->lang_id.']','full_'.$lang->lang_id)?></td>
    </tr>
</table>
</div>
<?
$i++;
endforeach;?>

<?=form_close();?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=vi"></script>
<script type="text/javascript">
function getlocal(){
    var address = $("#address").val();
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'address': address }, function (results, status) {
     if (status == google.maps.GeocoderStatus.OK) {
        location1 = results[0].geometry.location;
        var mylat = location1.lat();
        var mylng = location1.lng();
        $("#lat").val(mylat);
        $("#lng").val(mylng);
        console.log("Geocoding failed: " + location1.lat()+" , "+location1.lng());
     }
     else {
        alert("Không lấy được vị trí bản đồ");
     }
    });
}
</script>