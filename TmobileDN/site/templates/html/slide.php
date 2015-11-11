<div id="slider">
    <div class="slider-outer">
        <div class="slider-inner shell">
            <!-- Begin Slider Items -->
            <ul class="slider-items">
                <?$sql = "SELECT * FROM slider ORDER BY ordering ASC";
$listimg = $this->db->result($sql);
$i=1;
foreach($listimg as $val){  
?>
                <li>
                    <img src="<?=base_url()?>data/slide/<?=$val->path?>" alt="Slide Image <?=$i?>" />
                    <div class="slide-entry">
                    </div>
                    <!--<a href="#" class="more" title="View More">View More</a>-->
                </li>
                <?php $i=1+1; }?>
            </ul>
            <!-- End Slider Items -->
            <div class="cl">&nbsp;</div>
            <div class="slider-controls">

            </div>
        </div>
    </div>
    <div class="cl">&nbsp;</div>
</div>