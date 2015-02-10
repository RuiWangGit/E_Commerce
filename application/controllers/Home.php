<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $view_data = [];
	private $page_limit = 8;

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model("Search");
		$this->load->library("pagination");
		$this->view_data["categories"] = $this->Search->fetch_categories();
	}

	public function index()
	{
		$this->session->set_userdata("page_at", "index");
		
		$sort_by = ($this->uri->segment(3)) ? $this->uri->segment(3) : "low_price";
		$total_rows = $this->Search->record_count();

		$this->products_list("/home/index/$sort_by", $total_rows, 4, $sort_by, 0);
		$this->view_data["title"] = "All $total_rows items";
		$this->load->view("index", $this->view_data);
	}

	public function category()
	{
		$this->session->set_userdata("page_at", "category");
		$this->session->set_userdata("category_id", $this->uri->segment(3));

		$category_id = $this->uri->segment(3);
		$sort_by = ($this->uri->segment(4)) ? $this->uri->segment(4) : "low_price";
		
		$total_rows = $this->Search->fetch_count_by_category($category_id)["count"];

		$this->products_list("/home/category/$category_id/$sort_by", $total_rows, 5, $sort_by, $category_id);
		$this->view_data["title"] = $this->Search->fetch_category_by_id($category_id)["name"];
		$this->load->view("index", $this->view_data);
	}

	public function search_keyword()
	{
		$this->session->set_userdata("page_at", "search_keyword");

		// save keyword in session for new http request especailly pagination
		if($this->input->post("keyword")) {
			$keyword = $this->input->post("keyword");
			$this->session->set_userdata("keyword", $keyword);
		}
		else {
			$keyword = $this->session->userdata("keyword");
		}

		$sort_by = ($this->uri->segment(4)) ? $this->uri->segment(4) : "low_price";

		$total_rows = $this->Search->fetch_count_by_keyword($keyword)["count"];

		$this->products_list("/home/search_keyword/$keyword/$sort_by", $total_rows, 4, $sort_by, $keyword);
		$this->view_data["title"] = "Search by $keyword";
		$this->load->view("index", $this->view_data);
	}

	public function sort_by()
	{
		$page_at = $this->session->userdata("page_at");

		if($page_at == "index") {
			redirect("/home/index/". $this->input->post("sort"));
		}
		else if($page_at == "category") {
			redirect("/home/category/". $this->session->userdata("category_id") . "/" . $this->input->post("sort"));
		}
		else if($page_at == "search_keyword") {
			redirect("/home/search_keyword/". $this->session->userdata("keyword"). "/" . $this->input->post("sort"));
		}
		else {
			redirect("/");
		}
	}

	public function product()
	{
		$product_id = $this->uri->segment(3);
		$this->Search->update_product_clicks($product_id);
		$this->view_data["products"] = "";
		$this->view_data["product"] = $this->Search->fetch_product_by_id($product_id);
		$this->load->view("index", $this->view_data);
	}

	// make product list and pagination
	private function products_list($base_url, $total_rows, $uri_segment, $sort_by, $wild_card)
	{
		$page_config = ["base_url" 		=> $base_url,
						"total_rows" 	=> $total_rows,
						"per_page"		=> $this->page_limit,
						"uri_segment"	=> $uri_segment
						];
		$this->pagination->initialize($page_config);

		$page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

		$this->view_data["links"] = $this->pagination->create_links();

		if(preg_match("/index/", $base_url)) {
			$this->view_data["products"] = $this->Search->fetch_limited_products($page, $page_config["per_page"], $sort_by);
		}
		else if(preg_match("/category/", $base_url)) {
			$this->view_data["products"] = $this->Search->fetch_limited_products_by_category($wild_card, $page, $page_config["per_page"], $sort_by);
		}
		else if(preg_match("/search_keyword/", $base_url)) {
			$this->view_data["products"] = $this->Search->fetch_limited_products_by_keyword($wild_card, $page, $page_config["per_page"], $sort_by);
		}
	}
}

?>
