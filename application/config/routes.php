<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['dashboard'] = 'transactions/dashboard';
$route['transactions/chart_api_expense'] = 'transactions/chart_api_expense';
$route['transactions/chart_api_income'] = 'transactions/chart_api_income';
$route['transactions/ajax_add'] = 'transactions/ajax_add';
$route['transactions/ajax_list'] = 'transactions/ajax_list';
$route['transactions/create'] = 'transactions/create';
$route['transactions/update'] = 'transactions/update';  
$route['transactions/(:any)'] = 'transactions/view/$1';
$route['transactions'] = 'transactions/index';
$route['login'] = 'users/login';
$route['register'] = 'users/register';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
