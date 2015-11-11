<script type="text/javascript" src="<?php echo base_url().'templates/js/core/swfobject.js'; ?>"></script>
<?php     
$listvideo = $this->db->result("SELECT * FROM video WHERE published = 1 ORDER BY id DESC");

$flashplayer = base_url().'templates/swf/player.swf';
$skin = base_url().'templates/xml/blueratio/blueratio.xml';
$rand = 'video';
$width = '230';
$height = '200';
$file = $listvideo[0]->link;
$image = base_url().'data/video/img/500/'.$listvideo[0]->images;
?>
<script type='text/javascript'>
<?php 
$data ='  var so = new SWFObject(\''.$flashplayer.'\',\'mpl_1\',\''.$width.'\',\''.$height.'\',\'9\');
          so.addParam(\'allowfullscreen\',\'true\');
          so.addParam(\'allowscriptaccess\',\'always\');
          so.addParam(\'wmode\',\'opaque\');

          so.addVariable(\'stretching\',\'fill\');
          so.addVariable(\'autostart\',\'false\');
          so.addVariable(\'repeat\',\'always\');
          so.addVariable(\'file\',\''.$file.'\');
          so.addVariable(\'image\',\''.$image.'\');
          so.addVariable(\'skin\',\''.$skin.'\');
          var vnit = null;
          function playerReady(thePlayer) {
             vnit_1 = window.document[\'mpl_1\'];
           }';
        echo $data;    
    ?> 
</script>
<div class="mod_video">
    <div id="mediaspace<?php echo $rand?>"></div>
    <div class="mod_video_list" style="overflow-x: auto;">
        <ul>
            <?
            $k = 1;
            $i = 1;
            foreach($listvideo as $rs):?>
            <li class="row<?=$k?>"><a href="javascript:;" video_file="<?=$rs->link?>" <?=($i == 1)?'class="active"':'';?>><?=$rs->title?></a></li>
            <?
            $k = 1 - $k;
            $i++;
            endforeach;?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    so.write('mediaspace<?php echo $rand?>');
    $(document).ready(function() { 
        $(".mod_video a").click(function(){
            filename = $(this).attr('video_file');
            $(".mod_video a").removeClass('active');
            $(this).addClass('active');
            playvideo(filename);
        })
    });
    function playvideo(filename){
        vnit_1.sendEvent('STOP');
        vnit_1.sendEvent('LOAD', filename);
        vnit_1.sendEvent('VOLUME', 80);
        vnit_1.sendEvent('PLAY');
    }             
</script>