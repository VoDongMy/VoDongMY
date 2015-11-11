<?
$get = $this->request->get;
$str = '';
foreach($get as $val=>$keys){
    $str .= '&'.$val.'='.$keys;
}
$str = trim($str,'&');
$str_get = (count($get))?'?'.$str:'';
if($this->uri->segment(3) != ''){
    $page = '/'.$this->uri->segment(3).$str_get;
}else{
    $page = '/'.$str_get;
}
$url = 'contacts/index/';
$key_url = ($key != '')?'&key='.$key:'';
//$page = '/'.$this->uri->segment(3);
?>
<table class="tuychon" style="width: 100%;">
    <tr>
<!--        <td>
            Lọc <input type="text" name="key" id="key" value="<?=$key?>" class="w200">
            <input type="button" onclick="go_search()" name="bt_loc" value="Tìm">
            <input type="button" onclick="go_search_reset()" name="bt_loc" value="Làm lại">
        </td>-->
        <td>
            <select onchange="window.open(this.value,'_self');" name="cat_id" id="cat_id" style="float: right;width: 200px;margin-bottom: 10px">
                <option value="<?=site_url($url.'?id=0'.$key_url)?>">Xem tất cả danh bạ</option>
                <?foreach($listoffice as $val):
                $listcat1 = $this->contacts->get_all_office($val->id);
                ?>
                <option value="<?=site_url($url.'?id='.$val->id.$key_url)?>" <?php echo ($catid == $val->id)?'selected="selected"':'';?>><?=$val->title?></option>
                <?foreach($listcat1 as $val1):
                $listcat2 = $this->contacts->get_all_office($val1->cat_id);
                ?>
                <option value="<?=site_url($url.'?id='.$val1->id.$key_url)?>" <?php echo ($catid == $val1->id)?'selected="selected"':'';?>>|___<?=$val1->title?></option>
                <?foreach($listcat2 as $val2):
                ?>
                <option value="<?=site_url($url.'?id='.$val2->id.$key_url)?>" <?php echo ($catid == $val2->id)?'selected="selected"':'';?>>|______<?=$val2->title?></option>
                <?endforeach;?>
                <?endforeach;?>
                <?endforeach;?>
            </select>
        </td>

    </tr>
</table>
<script type="text/javascript">
    function go_search(){ 
        var key = $("#key").val();
        window.location.href = base_url + "<?php echo $url?>?key=" + key+'<?=($catid != 0)?'&catid='.$catid:''?>';
    }
    function go_search_reset(){ 
        window.location.href = '<?=site_url($url)?>';
    }    
</script>
<?php echo form_open('contacts/dels',  array('id' => 'admindata'));?>
<input type="hidden" name="page" value="<?=set_post_page()?>" style="width: 100%;">
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th class="head" colspan="8">
                Hiện danh bạ có <?php echo $num?> liên hệ <span class="pages"><?php echo $pagination?></span>
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Họ và Tên</th>
            <th>Chức vụ(Chức danh)</th>
            <th>Tên Cơ Quan - Tổ Chức - Văn Phòng Làm Việc</th>
            <th>SĐT</th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    $cat = $this->contacts->get_cat_by_id($rs->cat_id,1);
    $title = $this->contacts->get_office($rs->id_office);
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->id?>"></td>
        <td align="center"><?=$rs->id?></td>
        <td align="center">
            <a href="<?=site_url('contacts/edit/'.$rs->id.$page)?>"><?=$rs->name?></a>
        </td>
        <td align="center">
            <a href="<?=site_url('contacts/edit/'.$rs->id.$page)?>"><?=$rs->title?></a>
        </td>
        <td align="center">
            <a href="<?=site_url('contacts/edit/'.$rs->id.$page)?>"><?=$title->title?></a>
        </td>
        <td>
            <a href="<?=site_url('contacts/edit/'.$rs->id.$page)?>"><?php echo $rs->phone_1; if($rs->phone_1==0)echo $rs->phone_2;?></a>
        </td>
<!--        <td style="width: 200px;">
        <?php// echo $cat->cat_name?>
        </td>-->
       
        <td align="center">
            <?php echo icon_edit('contacts/edit/'.$rs->id.$page)?>
            <span id="publish<?php echo $rs->id?>"><?php echo icon_active("'contacts'","'id'",$rs->id,$rs->published)?></span>
            <?php echo icon_del('contacts/del/'.$rs->id.$page)?>
        </td>
    </tr>       
    <?
    $k=1-$k;
    endforeach;
    ?>
    <tfoot>
        <td colspan="8">
            Hiện danh bạ có <?php echo $num?> liên hệ <span class="pages"><?php echo $pagination?></span>
        </td>
    </tfoot>    
</table>
<?php echo form_close()?>
