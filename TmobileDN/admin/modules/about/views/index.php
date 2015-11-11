<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?=form_open(uri_string(),array('id'=>'admindata'))?>  
<?foreach($list as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
    <!--<div>
        Giới thiệu ngắn<br>
        <?=vnit_editor($lang->small,'vdata[small]['.$lang->lang_id.']','small_'.$lang->lang_id)?>
    </div>
    -->
    <div>
        Giới thiệu<br>
        <?=vnit_editor($lang->content,'vdata[content]['.$lang->lang_id.']','full_'.$lang->lang_id)?>
    </div>
</div>
<?endforeach;?>
<?=form_close()?>
