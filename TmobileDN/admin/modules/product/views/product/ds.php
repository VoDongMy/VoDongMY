<?
$page = '/'.(int)$this->uri->segment(3).'/?cat_id='.$cat_id.'&key='.$key;
$url = 'product/ds/';
?>
<div style="border: 1px solid #CCC; padding: 5px;overflow: hidden;margin-bottom: 5px;">
    <div class="fl">
        Tìm kiếm: <input type="text" id="key" value="<?=$keyword?>" style="width: 200px;">
        <input type="button" onclick="go_search();" value="Tìm kiếm">
        <input type="button" onclick="go_search_reset();" value="Làm lại">
    </div>
    <div class="fr">
        <select onchange="window.open(this.value,'_self');" name="cat_id" id="cat_id" style="float: right;width: 200px;">
            <option value="<?=site_url('product/ds/')?>">Xem tất cả</option>
            <?foreach($dscat as $val):
            $dscat1 = $this->product->get_all_cat($val->cat_id);
            ?>
            <option value="<?=site_url('product/ds/?cat_id='.$val->cat_id)?>" <?php echo ($cat_id == $val->cat_id)?'selected="selected"':'';?>><?=$val->name?></option>
            <?foreach($dscat1 as $val1):?>
            <option value="<?=site_url('product/ds/?cat_id='.$val1->cat_id)?>" <?php echo ($cat_id == $val1->cat_id)?'selected="selected"':'';?>>|___<?=$val1->name?></option>
            <?endforeach;?>
            <?endforeach;?>
        </select>
    </div>
</div>
<script type="text/javascript">
    function go_search(){ 
        var key = $("#key").val();
        window.location.href = base_url + "<?php echo $url?>?key=" + key+'<?=($catid != 0)?'&catid='.$catid:''?>';
    }
    function go_search_reset(){ 
        window.location.href = '<?=site_url($url)?>';
    }    
</script>
<?php echo form_open('product/dels',  array('id' => 'admindata'));?>
<input type="hidden" name="page" value="<?=$this->uri->segment(3)?>" style="width: 100%;">
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th class="head" colspan="8">
                Hiện có <?php echo $num?> sản phẩm <span class="pages"><?php echo $pagination?></span>
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id"><?=vnit_order('product/ds/0?f=id&o=asc&key='.$keyword.'&cat_id='.$cat_id,'ID')?></th>
            <th>Hình ảnh</th>
            <th><?=vnit_order('product/ds/0?f=title&o=asc&key='.$keyword.'&cat_id='.$cat_id,'Sản phẩm')?></th>
            <th style="width: 200px;">Danh mục</th>
            <th style="width: 100px;">Sắp xếp <?php echo action_order()?></th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->id?>"></td>
        <td align="center"><?=$rs->id?></td>
        <td style="width: 80px;"><img width="80" src="<?=base_url_site()?>data/product/200/<?=$rs->images?>" alt=""></td>
        <td>
            <a href="<?=site_url('product/edit/'.$rs->id.$page)?>"><?=$rs->title?></a>
        </td>
        <td style="width: 200px;"><?=$this->product->get_item_cat($rs->cat_id)->name?></td>
        <td align="center">
            <input type="text" class="order" name="order_<? echo $rs->id?>" value="<? echo $rs->ordering?>">
            <input type="hidden" name="id[]" value="<? echo $rs->id?>">
        </td>
        <td align="center">
            <?php echo icon_edit('product/edit/'.$rs->id.$page)?>
            <span id="publish<?php echo $rs->id?>"><?php echo icon_active("'product'","'id'",$rs->id,$rs->published)?></span>
            <?php echo icon_del('product/del/'.$rs->id.$page)?>
        </td>
    </tr>       
    <?php
    $k=1-$k;
    endforeach;
    ?>
    <tfoot>
        <td colspan="8">
            Hiện có <?php echo $num?> sản phẩm <span class="pages"><?php echo $pagination?></span>
        </td>
    </tfoot>    
</table>
<?php echo form_close()?>
<script type="text/javascript">
function save_order(){
    //load_show();
    var fields = $("#admindata :input").serializeArray();
    $.post(base_url+"product/save_order",fields, function(data) {
        //load_hide();
        location.reload();
    });
}
</script>