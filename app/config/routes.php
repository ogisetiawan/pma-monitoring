<?php
defined('BASEPATH') or exit('No direct script access allowed');
//! ### DEFAULT ###
$route['default_controller']                           = 'monitoring/MonitoringControllers';
$route['404_override']                                 = '';
$route['translate_uri_dashes']                         = FALSE;

$route['table_monitoring']                             = 'monitoring/MonitoringControllers/table_monitoring';
$route['search_region']                                = 'monitoring/MonitoringControllers/search_region';
$route['get_status_dots/(:num)/(:any)/(:any)/(:any)']  = 'monitoring/MonitoringControllers/get_status_dots';