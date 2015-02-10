<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteProducts extends CI_Controller {

	public function index(){
		$this->load->model('Search');
		$product = $this->Search->delete_product($this->uri->segment(3));
		redirect('/DisplayProducts/index');
	}
}
?>