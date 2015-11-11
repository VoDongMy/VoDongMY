<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['config_site_en']    = ROOT."site/config/cache/en/config_site.php";
require_once($config['config_site_en']);  
$config['config_site_vi']    = ROOT."site/config/cache/vi/config_site.php";
require_once($config['config_site_vi']);
$config['config_seo']    = ROOT."admin/config/config_seo.php";
require_once($config['config_seo']);  