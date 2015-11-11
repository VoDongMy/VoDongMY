
<script type="text/javascript" src="<?=base_url()?>templates/js/map_api.js"></script> 
<input type="hidden" id="address" value="185 Tô Hiệu, Liên Chiểu, Đà Nẵng">
<script type="text/javascript">
<?
$address = $rs->shop_address.', '.$this->api->get_city($rs->shop_district).', '.$this->api->get_city($rs->shop_city);
$name = $rs->shop_name;
if($rs->shop_avatar == ""){
    $img = base_url().'templates/images/map_av.png';
}else{
    $img = base_url().$rs->shop_avatar;
}
$content = "<div style='float:left; margin-right:10px;'><img src='".$img."' width='80' height='80'></div>";
$content .= "<div style='float:left;'><p><b>".$name."</b></p>";
$content .= "<p>Địa chỉ: ".$address."</p>";
$content .= "<p>Điện thoại: ".$rs->shop_phone."</p>";
$content .= "<p>Email: ".$rs->user_email."</p>";
$content .= "</div>";
?>
$(document).ready(function(){
    get_geoEncode("<?=$address?>", "<?=$name?>","<?=$content?>","map_api_view");
});
</script>
<div class="popup" id="pop-message" style="width: 700px; margin-left: -350px; top: 200px;">
    <div class="close" id="close_ajax"></div>
    <div class="title">Bảng đồ đường đi</div>
    <div class="pop-content" style="background: #FFF;">
        <div id="map_api_view" style="height: 400px;">
            Đang tải bản đồ..
        </div>
    </div>

</div>