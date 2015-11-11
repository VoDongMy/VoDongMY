<?php
$otp = get_params('otp',$attr);
$imgh = get_params('img_h',$attr);
$uri = $this->uri->segment(1);
if($otp == 0 && $uri == ''){
    

$sql = "SELECT * FROM slider ORDER BY ordering ASC";
$listimg = $this->db->result($sql);
?>

<script type="text/javascript" src="<?=base_url()?>site/mod/mod_slideshow/esset/jquery.nivo.slider.js"></script>
<link rel="stylesheet" href="<?=base_url()?>site/mod/mod_slideshow/esset/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>
<div id="home_slideshow">
    <div class="theme-default">
    <div class="ribbon"></div>
        <div id="slider" class="nivoSlider">
        <?php
        foreach($listimg as $val){                
        ?>
            <a href="<?=$val->link?>"><img height="<?=$imgh?>" width="730"  src="<?=base_url()?>data/slide/<?=$val->path?>" alt="<?=$val->name?>" /></a>
        <?php }?>
        </div>
    </div>
</div>
<?}else if($otp == 1){    

$sql = "SELECT * FROM slider ORDER BY ordering ASC";
$listimg = $this->db->result($sql);
?>
<script type="text/javascript" src="<?=base_url()?>site/mod/mod_slideshow/esset/jquery.nivo.slider.js"></script>
<link rel="stylesheet" href="<?=base_url()?>site/mod/mod_slideshow/esset/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({directionNavHide:false});
});
</script>

<div id="home_slideshow">
    <div class="theme-default">
    <div class="ribbon"></div>
        <div id="slider" class="nivoSlider">
        <?php
        foreach($listimg as $val){                
        ?>
            <a href="<?=$val->link?>"><img height="<?=$imgh?>" width="730" src="<?=base_url()?>data/slide/<?=$val->path?>" alt="<?=$val->name?>" /></a>
        <?php }?>
        </div>
    </div>
</div>

<?}?>
<style> 
 .theme-default  {
     height: <?=$imgh?>px !important;
 }
 #slider {
     border-radius: 0 0 10px 10px;
 }
</style>