<?php
$show = get_params('shows',$attr); 
$list = $this->db->result("SELECT * FROM weblink WHERE published = 1 ORDER BY id DESC");
?>
<?if($show == 1){?>
<select name="" style="width: 99%;">
    <?foreach($list as $rs):?>
    <option onclick="window.open('<?=$rs->link?>');"><?=$rs->name?></option>
    <?endforeach;?>
</select>   
<?}else{?>
    <?foreach($list as $rs):?>
        <div><a href="<?=$rs->link?>" target="_blank"><?=$rs->name?></a></div>
    <?endforeach;?>
<?}?>
