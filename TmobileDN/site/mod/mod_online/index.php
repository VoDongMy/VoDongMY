<?php

    function getDigits( $number, $length=0 )
    {
        $strlen = strlen($number);
        
        $arr    =    array();
        $diff    =    $length -  $strlen;
        
        // Push Leading Zeros
        while ( $diff>0 ){
            array_push( $arr,0 );
            $diff--;
        }
        
        // For PHP 4.x
        $arrNumber    =    array();
        for ($i = 0; $i < $strlen; $i++) {
            $arrNumber[] = substr($number,$i,1);
        }
        
        // For PHP 5.x: $arrNumber    =    str_split( $number );
        
        $arr        =    array_merge( $arr,$arrNumber );
        
        return $arr;
    }
    /* ------------------------------------------------------------------------------------------------ */
    

    
    /*
    ** Show Digit Counter Image
    */
    /* ------------------------------------------------------------------------------------------------ */
    function showDigitImage( $digit_type="default", $digit )
    {    
        $path = base_url().'site/views/modules/mod_online/number'; 
        $ret    =    '<img src="'.$path.'/'.$digit_type.'/'.$digit.'.png"';
        $ret    .=    ' />';
        
        return $ret;
    }
    /* ------------------------------------------------------------------------------------------------ */    


  
$rs = $this->online->hits();     
$is_online = $this->online->get_is_online();     
?>
<div align="center">
<?php
    
    $path = base_url().'site/mod/mod_online/icon/';
    $digit_type  = get_params('number',$attr);
    $number_digits  = get_params('total_number',$attr);
    $arr = getDigits( $rs->c_count,$number_digits );
    
    foreach ($arr as $digit){
        echo  showDigitImage( $digit_type, $digit );
    };
?>
</div> 
<h2>Thống kê truy cập</h2>
<table class="widget-entry" style="width: 100%;">
    <tr>
        <td style="width: 20px;"><img src="<?php echo $path.'vall.png'?>" alt=""></td>
        <td><?=lang('counter.online')?></td>
        <td class="cufon" align="right"><?php echo $is_online?></td>
    </tr>
    <tr>
        <td><img src="<?php echo $path.'vtoday.png'?>" alt=""></td> 
        <td><?=lang('counter.today')?></td>
        <td align="right" class="cufon"><?php echo $rs->c_today_hits?></td>
    </tr>
    <tr>
        <td><img src="<?php echo $path.'vmonth.png'?>" alt=""></td>
        <td><?=lang('counter.month')?></td>
        <td align="right" class="cufon"><?php echo $rs->c_month_hits?></td>
    </tr>
    <tr>
        <td><img src="<?php echo $path.'vweek.png'?>" alt=""></td>
        <td><?=lang('counter.total')?></td>
        <td align="right" class="cufon"><?php echo $rs->c_total?></td>
    </tr>    
</table><!--
<span><?=lang('counter.online')?>: <b><?php echo $is_online?></b>.  <?=lang('counter.total')?>: <b><?php echo $rs->c_total?></b></span>-->
