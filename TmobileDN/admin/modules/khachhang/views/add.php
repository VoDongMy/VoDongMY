<link type="text/css" rel="stylesheet" href="<?php echo base_url().'templates/css/uploadify.css'; ?>" media="screen" />
<script type="text/javascript" src="<?php echo base_url().'templates/js/core/jquery.uploadify.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'templates/js/core/price_format.js'; ?>"></script>
<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open_multipart(uri_string(), array('id'=>'admindata'));?>
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Logo khách hàng</td>
        <td><input type="file" name="userfile"></td>
    </tr>
    <tr>
        <td class="label" style="width: 150px;">Website</td>
        <td><input type="text" name="vdata[link]" class="w250"> ví dụ: http://phangiahuy.com</td>
    </tr>
</table>
<?foreach($this->language as $lang):?>
<div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
<table class="form">
    <tr>
        <td class="label" style="width: 150px;">Tên khách hàng</td>
        <td><input type="text" name="vdata[name][<?=$lang->lang_id?>]" value="<?=set_value('vdata[name]['.$lang->lang_id.']')?>" style="width: 300px;"></td>
    </tr>
    <tr>
        <td class="label">Giới thiệu</td>
        <td><?=vnit_editor(htmlspecialchars_decode(set_value('gioithieu')),'vdata[gioithieu]['.$lang->lang_id.']','full'.$lang->lang_id)?></td>
    </tr>
</table>
</div>
<?endforeach;?>
<?php echo form_close();?>
<script type="text/javascript">
$(document).ready(function() {
    $('#file_upload').uploadify({
        'swf'  : base_url+'templates/swf/uploadify.swf',
        'uploader'    : base_url+'khachhang/uploader/<?=$this->session->sessionid()?>',    
        'width': 130,
        'height'    : 30,
        'queueID'        : 'file_uploadQueue',
        'scriptAccess'  : 'always',
        'fileTypeDesc'  : '*.jpg;*.png;*.gif',
        'fileTypeExts'  : '*.jpg;*.png;*.gif',
        'fileSizeLimit'  : (204800 * 1024),
        'onUploadSuccess' : function(file, data, response) {
            obj = $.parseJSON(data);
            if(obj.error == 0){
                var html ='<li>'+
                          '<div class="img" img_src="'+obj.filename+'"><img src="'+base_url_site+'data/tam/'+obj.filename+'"></div>'+
                          '<div class="l_del"><a href="javascript:;" img_id="'+obj.id+'" img_src="'+obj.filename+'" class="del_img">Xóa</a></div>'+
                          '<input type="hidden" name="ar_img[]" value="'+obj.filename+'">'+
                          '</li>';
                $(".listimg").append(html);
            }else{
                alert(obj.msg);
            }
        }     
    });
    
    $(".del_img").live('click',function(){
        var img_src = $(this).attr('img_src');
        var img_old = $("#images").val();
        var id = $(this).attr('img_id');
        
        $.post(base_url+"khachhang/del_img_tam",{'id':id},function(data){

        });
            
        
        $(this).parent().parent().remove();
    })
    
    $(".img").live('click',function(){
        img_src = $(this).attr('img_src');
        $(".imgmain").html('<img src="'+base_url_site+'data/tam/'+img_src+'">');
        $("#images").val(img_src);
    })
})
</script>
<style>
#list_local div,
#local_choice div{
    background: none repeat scroll 0 0 #F2F2F2;
    border-bottom: 1px solid #FFFFFF;
    overflow: hidden;
    padding: 8px 5px;
}
#list_local div a,
#local_choice div a{
    color: #FF0000;
    float: left;
    width: 50px;
}
#list_local div a b,
#local_choice div a b{
    color: #FF0000;
}
div.error{
    color: #FF0000;
}
.imgmain{
    border: 1px solid #CCC;
    width: 120px;
    height: 100px;
    overflow: hidden;
    display: block;
    margin-bottom: 10px;
    background: #FFF;
}
.imgmain img{
    width: 120px; 
    min-height: 100px;
}
ul.listimg li{
    float: left;
    width: 90px;
    height: 80px;
    margin-right: 10px;
    margin-bottom: 10px;
}
ul.listimg li .img{
    width: 90px;
    height: 60px;
    border: 1px solid #CCC;
    background: #FFF;
    display: block;
    overflow: hidden;
    cursor: pointer;
}
ul.listimg li .img img{
    width: 90px;
    min-height : 60px;
}
ul.listimg .l_del{
    margin-top: 5px;
    font-weight: bold;
    text-align: center;
}
</style>