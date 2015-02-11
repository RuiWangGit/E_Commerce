<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Model {

	public function record_count()
	{
		return $this->db->count_all("products");
	}

	public function fetch_categories()
	{
		$query = "SELECT * FROM categories";
		return $this->db->query($query)->result_array();
	}

	public function fetch_category_by_id($id)
	{
		$query = "SELECT name FROM categories WHERE id = ? ";
		$value = array($id);
		return $this->db->query($query, $value)->row_array();
	}

	public function fetch_all_products()
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}

	public function fetch_limited_products($start, $limit, $sort_by)
	{
		if($sort_by == "low_price") {
			$query = "SELECT * FROM products ORDER BY price ASC LIMIT ?, ? ";
		}
		else if($sort_by == "high_price") {
			$query = "SELECT * FROM products ORDER BY price DESC LIMIT ?, ? ";
		}
		else if($sort_by == "popular") {
			$query = "SELECT * FROM products ORDER BY product_clicks DESC LIMIT ?, ? ";
		}
		else {
			$query = "SELECT * FROM products ORDER BY price ASC LIMIT ?, ? ";	
		}
		$values = array(intval($start), intval($limit));
		return $this->db->query($query, $values)->result_array();
	}

	public function fetch_limited_products_by_category($category_id, $start, $limit, $sort_by)
	{
		if($sort_by == "low_price") {
			$query = "SELECT * FROM products WHERE category_id = ? ORDER BY price ASC LIMIT ?, ?";
		}
		else if($sort_by == "high_price") {
			$query = "SELECT * FROM products WHERE category_id = ? ORDER BY price DESC LIMIT ?, ?";
		}
		else if($sort_by == "popular") {
			$query = "SELECT * FROM products WHERE category_id = ? ORDER BY product_clicks DESC LIMIT ?, ?";	
		}
		else {
			$query = "SELECT * FROM products WHERE category_id = ? ORDER BY price ASC LIMIT ?, ?";
		}
		$values = array($category_id, intval($start), intval($limit));
		return $this->db->query($query, $values)->result_array();
	}

	public function fetch_count_by_category($category_id)
	{
		$query = "SELECT count(id) as count FROM products
				  WHERE category_id = ? ";
		$value = array($category_id);
		return $this->db->query($query, $value)->row_array();
	}

	public function fetch_limited_products_by_keyword($keyword, $start, $limit, $sort_by)
	{
		if($sort_by == "low_price") {
			$query = "SELECT * FROM products WHERE name like ? OR description like ? ORDER BY price ASC LIMIT ?, ?";
		}
		else if($sort_by == "high_price") {
			$query = "SELECT * FROM products WHERE name like ? OR description like ? ORDER BY price DESC LIMIT ?, ?";
		}
		else if($sort_by == "popular") {
			$query = "SELECT * FROM products WHERE name like ? OR description like ? ORDER BY product_clicks DESC LIMIT ?, ?";
		}
		else {
			$query = "SELECT * FROM products WHERE name like ? OR description like ? ORDER BY price ASC LIMIT ?, ?";
		}
		$values = array("%".$keyword."%", "%".$keyword."%", intval($start), intval($limit));
		return $this->db->query($query, $values)->result_array();
	}

	public function fetch_count_by_keyword($keyword)
	{
		$query = "SELECT count(id) as count FROM products
				  WHERE name like ? OR description like ?";
		$values = array("%".$keyword."%", "%".$keyword."%");
		return $this->db->query($query, $values)->row_array();
	}

	public function fetch_product_by_id($product_id)
	{
		$query = "SELECT * FROM products
				  WHERE id = ? ";
		$value = array($product_id);
		return $this->db->query($query, $value)->result_array();
	}

	public function update_product_clicks($product_id)
	{
		$query = "UPDATE products SET product_clicks = product_clicks + 1 
				  WHERE id = ?";
		$value = array($product_id);
		$this->db->query($query, $value);
	}


	//Jeff's methods for admin queries
	public function create_product(){
		$query = "INSERT INTO products (name, description, price, inventory, main_image, image_path_1, image_path_2, image_path_3, category_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
		$values= array($this->input->post('name'), $this->input->post('description'), $this->input->post('price'), $this->input->post('inventory'), 
					   $this->input->post('main_image'), $this->input->post('image_path_1'), $this->input->post('image_path_2'), $this->input->post('image_path_3'),
					   $this->input->post('category_id'));
		$this->db->query($query, $values);  
	}
	public function edit_product(){
		$query = "UPDATE products SET (name, description, price, inventory, main_image, image_path_1, image_path_2, image_path_3, category_id, updated_at) 
				  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
				  WHERE id = ?";
		$values= array($this->input->post('name'), $this->input->post('description'), $this->input->post('price'), $this->input->post('inventory'), 
					   $this->input->post('main_image'), $this->input->post('image_path_1'), $this->input->post('image_path_2'), $this->input->post('image_path_3'),
					   $this->input->post('category_id'));
		$this->db->query($query, $values);
	}
	public function display_products(){
		$query = "SELECT main_image, id, name, inventory FROM products ORDER BY id DESC";
		return $this->db->query($query)->result_array();
	}
	public function edit_product_fetch($product_id){
		$query = "SELECT products.name, products.description, products.main_image, products.image_path_1, products.image_path_2, products.image_path_3, inventory, price, categories.name AS 'category' FROM products
				  JOIN categories ON products.category_id = categories.id
				  WHERE products.id = ?";
		$value = array($product_id);
		return $this->db->query($query, $value)->result_array();
	}
	public function delete_product($product_id){
		$query = "DELETE FROM products
				  WHERE products.id = ?";
		$value = $product_id;
		$this->db->query($query, $value);

	}
}
?>