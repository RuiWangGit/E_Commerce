<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $view_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Search");
		$view_data = [];
	}

	public function index()
	{
		// var_dump($this->Search->record_count());
		$view_data["categories"] = $this->Search->fetch_categories();
		$view_data["products"] = $this->Search->fetch_all_products();

		$this->load->view('index', $view_data);
	}

	public function category()
	{
		$category_id = $this->uri->segment(3);
		$view_data["products"] = $this->Search->fetch_products_by_category($category_id);

		$this->load->view("product_list", $view_data);

	}

	public function product()
	{
		$product_id = $this->uri->segment(3);
		$view_data["product"] = $this->Search->fetch_product_by_id($product_id);

		$this->load->view("product_detail", $view_data);
	}

	public function search_keyword()
	{
		$keyword = $this->input->post("keyword");
		$view_data["products"] = $this->Search->fetch_products_by_keyword($keyword);

		$this->load->view("product_list", $view_data);
	}
}

?>