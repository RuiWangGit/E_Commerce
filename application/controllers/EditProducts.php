<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditProducts extends CI_Controller {

	public function index(){
		$this->load->model('Search');
		$product = $this->Search->edit_product_fetch($this->uri->segment(3));

		$view_data = array();
		$view_data['product'] = $product;
		$this->load->view('/EditProducts/index', $view_data);
		

	}



}
?>