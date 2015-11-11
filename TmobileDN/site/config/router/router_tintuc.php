<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* File Router_Tour 
* Date: 02/03/15 13:32:18.
**/
$route['bang-gia'] = 'news/index';
$route['bang-gia/(:num)'] = 'news/index/$1';
$route['bang-gia/(:any)'] = 'news/detail/$1';
$route['khuyen-mai'] = 'news/index';
$route['khuyen-mai/(:num)'] = 'news/index/$1';
$route['khuyen-mai/(:any)'] = 'news/detail/$1';
$route['dich-vu-bao-hanh'] = 'news/index';
$route['dich-vu-bao-hanh/(:num)'] = 'news/index/$1';
$route['dich-vu-bao-hanh/(:any)'] = 'news/detail/$1';
$route['ho-tro-mua-hang'] = 'news/index';
$route['ho-tro-mua-hang/(:num)'] = 'news/index/$1';
$route['ho-tro-mua-hang/(:any)'] = 'news/detail/$1';
$route['goc-ky-thuat'] = 'news/index';
$route['goc-ky-thuat/(:num)'] = 'news/index/$1';
$route['goc-ky-thuat/(:any)'] = 'news/detail/$1';