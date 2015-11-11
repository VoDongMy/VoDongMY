<?php
$route['default_controller'] = "home";
$route['404_override'] = '';
$route['ve-may-bay'] = 'bay/index';
if ($handle = opendir(APPPATH."modules")) {
    /* This is the correct way to loop over the directory. */
    while (false !== ($modules = readdir($handle))) {
        if ($modules != "." && $modules != "..") {
            if(file_exists(APPPATH."modules/".$modules.'/config/routes.php')){
                require APPPATH."modules/".$modules."/config/routes.php";
            }
        }        
    }
    closedir($handle);
}
require ROOT."site/config/router/router_product.php";
require ROOT."site/config/router/router_tintuc.php";