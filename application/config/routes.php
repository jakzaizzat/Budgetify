<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['transactions/create'] = 'transactions/create';  
$route['transactions/update'] = 'transactions/update';  
$route['transactions/(:any)'] = 'transactions/view/$1';
$route['transactions'] = 'transactions/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
