<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

$route['add'] = 'carts/add';
$route['carts/update'] = 'carts/update';
$route['carts/remove'] = 'carts/remove';
$routes['payments/charge'] = 'payments/charge';
$route['carts'] = 'carts';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

