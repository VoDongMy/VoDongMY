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
<?php
    
    $path = base_url().'site/mod/mod_online/icon/';
    $digit_type  = 'vnumber';
    $number_digits  = 9;
    $arr = $this->online->getDigits( $rs->c_total,$number_digits );
    $h_o = '';
    foreach ($arr as $digit){
        $h_o .= $this->online->showDigitImage( $digit_type, $digit );
    };
?>

<?php echo $rs->c_total?>
