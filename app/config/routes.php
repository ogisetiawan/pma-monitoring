<?php
defined('BASEPATH') or exit('No direct script access allowed');
//! ### DEFAULT ###
$route['default_controller']                           = 'lbp/LbpControllers/lbp';
$route['404_override']                                 = '';
$route['translate_uri_dashes']                         = FALSE;

$route['table_monitoring']                             = 'lbp/LbpControllers/table_monitoring';
$route['search_region']                                = 'lbp/LbpControllers/search_region';
$route['get_status_dots/(:num)']                       = 'lbp/LbpControllers/get_status_dots';
