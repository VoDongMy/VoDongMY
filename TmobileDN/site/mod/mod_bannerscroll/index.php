<?
// Left Banner
$link_img_l = get_params('link_img_l',$attr);
$target_ads_l = get_params('target_ads_l',$attr);
$file_img_l = get_params('file_img_l',$attr);
$pa_url_l = explode(':',$file_img_l);
$type_file_l = end(explode('.',$file_img_l));
if($pa_url_l[0] == 'http' || $pa_url_l[0] =='https'){
    $src_l = $file_img_l;
}else{
    $src_l = $_SERVER['HTTP_HOST'].$file_img_l;
}
$target_l = ($target_ads_l == 'page_new')?'target="_blank"':'';

// Right Banner

$link_img_r = get_params('link_img_r',$attr);
$target_ads_r = get_params('target_ads_r',$attr);
$file_img_r = get_params('file_img_r',$attr);
$pa_url_r = explode(':',$file_img_r);
$type_file_r = end(explode('.',$file_img_r));
if($pa_url_r[0] == 'http' || $pa_url_r[0] =='https'){
    $src_r = $file_img_r;
}else{
    $src_r = $_SERVER['HTTP_HOST'].$file_img_r;
}
$target_r = ($target_ads_r == 'page_new')?'target="_blank"':'';
?>

<div id="vt_r" style="position: fixed; top: 130px; left: 1172px;">
    <a <?=$target_r?> href="<?=$link_img_r?>">
        <?if($type_file_r == 'swf'){?>
        <embed width="124" wmode="transparent" quality="high" name="mymovie" id="mymovie" src="<?=$src_r?>" type="application/x-shockwave-flash">
        <?}else{?>
        <img width="124px" border="0" class="imgbor" src="<?=$src_r?>">
        <?}?>
    </a>
</div>
<div id="vt_l" style="position: fixed; top: 130px; right: 1172px;">
     <a <?=$target_l?> href="<?=$link_img_l?>">
        <?if($type_file_l == 'swf'){?>
        <embed width="124" wmode="transparent" quality="high" name="mymovie" id="mymovie" src="<?=$src_l?>" type="application/x-shockwave-flash">
        <?}else{?>
        <img width="124px" border="0" class="imgbor" src="<?=$src_l?>">
        <?}?>
    </a>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var window_w = $(window).width();
            min = ((window_w - 1000)/2) - 124;
            $("#vt_l").css({
                'right':min
            });
            $("#vt_r").css({
                'left':min
                
            });
            $("#vt_r,#vt_l").fadeIn(1000) ;
        $(window).scroll(function(){
            if  ($(window).scrollTop() > 120){
                $("#vt_r,#vt_l").css({
                    'top':0
                });
            }else{
                $("#vt_r,#vt_l").css({
                    'top':130
                });
            }
        }); 
    });
</script>