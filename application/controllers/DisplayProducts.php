<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class DisplayProducts extends CI_Controller {
		public function Index (){
			$this->load->model('Search');
			$products = $this->Search->display_products();
			$view_data = array();
			$view_data['products'] = $products;
			$this->load->view('DisplayProducts/index', $view_data);

		}









		// public function Index (){
		// 	$this->load->model('Search');
		// 	$products = $this->Search->fetch_all_products();
		// 	$this->load->library('table');
		// 	$table_template = array(
		// 		'heading_row_start'   => "<tr class='heading_row'>",
		//         'heading_row_end'     => '</tr>',
		// 		'row_start'           => "<tr class='gray_row'>",
		//         'row_end'             => '</tr>',
		// 		);
		// 	$this->table->set_heading('Product ID', 'Category ID', 'Product Name', 'Product Description', 'Price', 'Inventory', 
		// 							  'Main Image', 'Image 1', 'Image 2', 'Image 3', 'Created At', 'Updated At');
		// 	$this->table->set_template($table_template);
		// 	$data = [];
		// 	$data['products'] = $this->table->generate($products);
		// 	$this->load->view('DisplayProducts/index', $data);
		// 	// var_dump($data['products']);
		// }
	}		
?>