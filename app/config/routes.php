<?php
defined('BASEPATH') or exit('No direct script access allowed');
//! ### DEFAULT ###
$route['default_controller']                                 = 'monitoring/MonitoringControllers';
$route['404_override']                                       = '';
$route['translate_uri_dashes']                               = FALSE;

// ! MONITORING
$route['table_monitoring']                                   = 'monitoring/MonitoringControllers/table_monitoring';
$route['search_region']                                      = 'monitoring/MonitoringControllers/search_region';
$route['get_status_dots/(:num)/(:any)/(:any)/(:any)']        = 'monitoring/MonitoringControllers/get_status_dots';

// ! SALES_DAILLY
$route['sales_dailly']                                       = 'sales_dailly/SalesDaillyControllers';
$route['table_monitoring_sales']                             = 'sales_dailly/SalesDaillyControllers/table_monitoring';
$route['get_status_dots_sales/(:num)/(:any)/(:any)']         = 'sales_dailly/SalesDaillyControllers/get_status_dots';
$route['test']                                               = 'sales_dailly/SalesDaillyControllers/test';

$route['checkLogin']                                         = '_partials/PartialsController/checkLogin';
$route['logout']                                             = '_partials/PartialsController/logout';
$route['check_form_nosales']                                 = '_partials/PartialsController/check_form_nosales';
$route['insertUpdate_form_nosales']                          = '_partials/PartialsController/insertUpdate_form_nosales';

// ! REST SERVER
$route['middleware/os/client/get']                          = '_rest_server/RestClientController/index_get';
$route['middleware/os/client/post']                         = '_rest_server/RestClientController/index_post';