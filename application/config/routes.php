<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';

$route['add'] = 'carts/add';
$route['carts/edit/:any'] = 'carts/update';
$route['carts/remove'] = 'carts/remove';
$routes['payments/charge'] = 'payments/charge';
$route['carts'] = 'carts';
$route['carts/update/:any'] = 'carts/retrieve_update';
$route['payments/pay'] = 'payments/pay'; 
$route['payments/show'] = 'payments/show';

$route['CreateProducts'] = 'CreateProducts';
$route['EditProducts'] = 'EditProducts';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


