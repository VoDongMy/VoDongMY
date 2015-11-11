<?
$id = get_params('id',$attr);

?>
<?
$sql = "
    SELECT k.*, d.name, d.slug
    FROM khachhang as k, khachhang_des as d
    WHERE k.id = d.id
    AND d.lang_id = ".$this->language->lang_id()."
    AND k.published = 1
    ORDER BY d.id DESC LIMIT 10
";
$customer = $this->db->result($sql);

?>
<div class="plugin_sds customer_sl">
    <ul class="sds_disp">
        <?foreach($customer as $val){?>
        <li>
            <div class="img">
                <a href="<?=$val->link?>" target="_blank">
                    <img src="<?=base_url()?>data/logo/250/<?=$val->images?>" alt="<?=$title?>">
                </a>
            </div>
        </li>
        <?}?>
    </ul>
</div>
<script type="text/javascript">
$(document).ready(function() {    
    $('.customer_sl').each(function(i){            
        var sdsHolder    = $(this).attr("id", "sds"+i);
        var sdsObj        = $('.sds_disp', sdsHolder);

        
        sdsObj.cycle({
            fx: 'fade',
            speed:  500,
            timeout: 3500,
            activePagerClass: 'active',

        });
    })
});        
</script>