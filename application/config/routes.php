<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';

$route['add'] = 'carts/add';
$route['carts/edit/:any'] = 'carts/update';
$route['carts/remove'] = 'carts/remove';
$routes['payments/charge'] = 'payments/charge';
$route['carts'] = 'carts';
$route['carts/update/:any'] = 'carts/retrieve_update';

$route['CreateProducts'] = 'CreateProducts';
$route['EditProducts'] = 'EditProducts';


//Routes for admin
$route['admin'] = "/ecommerce_v1/main/orders_index";
$route['main/orders_index'] = "/ecommerce_v1/main/orders_index";
$route['main/products_index'] = "/ecommerce_v1/main/products_index";
$route['order_details'] = "/ecommerce_v1/main/order_details";
$route['admin_index'] = "/ecommerce_v1/admin_index";
$route['products_index'] = "/ecommerce_v1/products_index";
$route['ecommerce'] = "/ecommerce_v1/ecommerce";



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


