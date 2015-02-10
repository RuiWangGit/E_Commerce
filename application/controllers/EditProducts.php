<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditProducts extends CI_Controller {

	public function index(){
		$this->load->model('Search');
		$raw_product = $this->Search->fetch_product_by_id($this->uri->segment(3));
		$product = $raw_product[0];
		foreach ($product as $key => $product_attribute) {
			if ($product_attribute = NULL) {
				$product_attribute = "Nothing here... Yet!";
			}
		}
		var_dump($product);
		die();
		$view_data = array();
		$view_data['product'] = $product;
		$this->load->view('EditProducts/index', $view_data);
		

	}



}
?>