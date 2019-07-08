<?php
defined('BASEPATH') or exit('No direct script access allowed');
//! ### DEFAULT ###
$route['default_controller']                           = 'monitoring/MonitoringControllers';
$route['404_override']                                 = '';
$route['translate_uri_dashes']                         = FALSE;

// ! MONITORING
$route['table_monitoring']                             = 'monitoring/MonitoringControllers/table_monitoring';
$route['search_region']                                = 'monitoring/MonitoringControllers/search_region';
$route['get_status_dots/(:num)/(:any)/(:any)/(:any)']  = 'monitoring/MonitoringControllers/get_status_dots';
$route['test']                                         = 'monitoring/MonitoringControllers/test';

// ! SALES_DAILLY
$route['sales_dailly']                                       = 'sales_dailly/SalesDaillyControllers';
$route['table_monitoring_sales']                             = 'sales_dailly/SalesDaillyControllers/table_monitoring';
$route['search_region_sales']                                = 'sales_dailly/SalesDaillyControllers/search_region';
$route['get_status_dots_sales/(:num)/(:any)/(:any)']  = 'sales_dailly/SalesDaillyControllers/get_status_dots';