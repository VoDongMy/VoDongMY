<?php
  $max = get_params('max',$attr);  
  $sql = "
    SELECT 
        id, title, slug, images 
    FROM news
    WHERE published = 1
    ORDER BY hits DESC LIMIT $max
  ";
  $list = $this->db->result($sql);
?>
<ul class="most_read">
    <?foreach($list as $rs):?>
    <li>
        <?if($rs->images !=''){?>
        <div class="img">
            <img src="<?=base_url().'data/news/80/'.$rs->images?>" alt="">
        </div>
        <?}?>
        <a href="<?=site_url('tin-tuc/v'.$rs->id.'/'.$rs->slug)?>"><?=$rs->title?></a>
    </li>
    <?endforeach;?>
</ul>
<style>
ul.most_read li{
    list-style: none;

    overflow: hidden;
    padding: 5px 0px;
}
ul.most_read .img{
    width: 80px;
    height: 40px;
    overflow: hidden;
    display: block;
    float: left;
    margin-right: 5px;
}
ul.most_read a{
    color: #333;
}
ul.most_read a:hover{
    color: #FF6600;
}
</style>