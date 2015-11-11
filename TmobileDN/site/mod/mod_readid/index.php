<?php

$id = get_params('contentid',$attr);
$w = get_params('img_w',$attr);
$h = get_params('img_h',$attr);
$rs = $this->vdb->find_by_id('content',array('id'=>$id));
$val = $this->vdb->find_by_id('menu',array('catid'=>$rs->catid));
$val1 = $this->vdb->find_by_id('menu',array('newsid'=>$rs->id));
if($val1){
    $item = $val1->id;
}else if($val){
    $item = $val->id;
}else{
    $item = 0;
}
?>
<div class="img">
    <img src="<?=base_url().$rs->images_thumb?>" alt="<?=$rs->title?>">
</div>
<?=vnit_cut_string($rs->introtext,70)?>
<div id="remove_sl_1" class="remove_sl">
    <div class="img">
    <img src="<?=base_url().$rs->images_thumb?>" alt="<?=$rs->title?>">
    </div>            
    <?=vnit_cut_string($rs->introtext,400)?> 
    <div style="float: right;padding: 10px 5px;"><a href="<?=site_url('news/detail/'.$rs->title_alias.'-'.$rs->id.'/'.$item)?>"><b><?=lang('site.docthem')?></b></a></div> 
</div>