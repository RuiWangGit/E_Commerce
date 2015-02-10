<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CreateProducts extends CI_Controller {

	public function index()
	{
		$this->load->view('CreateProducts/index');
	}
	public function CreateProduct (){
		$this->load->model('Search');
		$this->Search->create_product();
		
		redirect('/');
	}
}



?>