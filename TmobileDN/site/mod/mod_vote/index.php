<link type="text/css" rel="stylesheet" href="<?echo base_url()?>site/views/modules/mod_vote/esset/poll.css?v=2.0" media="screen" />
<?
$lang = $this->session->userdata('lang');
$this->db->select('poll.*, poll_des.*');
$this->db->join('poll_des','poll_des.pid = poll.pid');
$this->db->where('poll_des.lang',$lang);
$this->db->where('poll.published',1);
$poll = $this->db->get('poll')->row();
?>
<?if($poll){
    $this->db->where('pid',$poll->pid);
    $this->db->order_by('id','asc');
    $list = $this->db->get('poll_rows')->result();
?>


    <div class="poll-question"><?=$poll->question?></div>
    <?
    $i = 1;
    foreach($list as $rs):?>
    <div><input <?echo ($i == 1)?'checked="checked"':''?> type="radio" id="row_id" name="row_id" value="<?=$rs->id?>"><?=($lang =='vi')?$rs->title:$rs->title_en?></div>
    <?
    $i ++;
    endforeach;?>
    <div align="center">
        <input type="hidden" name="pid" id="pid" value="<?=$poll->pid?>">
        <input type="button" class="submit" name="binhchon" onclick="add_poll()" value="<?=lang('binhchon')?>">
        <input type="button" class="submit" name="binhchon" onclick="result()" value="<?=lang('ketqua')?>">
    </div>


<script type="text/javascript">
 function add_poll(){
    var row_id = $('input[name=row_id]:checked').val();
    var pid = $("#pid").val();
    var poll_url = base_url+'poll/show_poll/'+pid+'/'+row_id;
    $.fancybox({
        'transitionIn'    :    'elastic',
        'transitionOut'    :    'elastic',
        'speedIn'        :    400, 
        'speedOut'        :    200, 
        'overlayShow'    :    false,
        'href'          : poll_url
    });
   
 }
 
 function result(){
    var pid = $("#pid").val();
    var poll_url = base_url+'poll/show_result/'+pid
    $.fancybox({
        'transitionIn'    :    'elastic',
        'transitionOut'    :    'elastic',
        'speedIn'        :    400, 
        'speedOut'        :    200, 
        'overlayShow'    :    false,
        'href'          : poll_url
    });
 }
</script>
<?}?>
