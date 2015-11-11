<script type="text/javascript" src="<?=base_url()?>templates/js/jquery.cycle.all.js" charset="UTF-8"></script>
<script type="text/javascript">
//<![CDATA[
    $('#sp').cycle({ 
        fx:     'fade',        
        speed: 1000, 
        pause:   1,
        speed:   300,
        timeout: 5000,
        next:   '.next2', 
        prev:   '.prev2' 
    });
</script>
<?php
$list = $this->db->result("SELECT * FROM product WHERE published = 1  LIMIT 20");  
?>
<div id="top_pro" class="top_pro">
    <a class="next2" href="javascript:;"></a>
    <a class="prev2" href="javascript:;"></a>
    <div id="sp">
    <?foreach($list as $rs):?>
    <div class="item">
        <div class="img" align="center">
            <a href="<?=site_url('san-pham/v'.$rs->productid.'/'.$rs->slug)?>"><img src="<?=base_url()?>data/product/140/<?=$rs->images?>" alt="<?=$rs->productname?>"></a>
        </div>
        <div class="title"><a href="<?=site_url('san-pham/v'.$rs->productid.'/'.$rs->slug)?>"><?=$rs->productname?></a></div>
        <div class="price">Giá bán: <span><?=number_format($rs->giaban,0,'.','.')?></span> VND</div>
    </div>
    <?endforeach;?>
    </div>
</div>
