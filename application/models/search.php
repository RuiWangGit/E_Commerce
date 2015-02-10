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
	// public function fetch_products($limit, $start)
	// {
	// 	$this->db->limit($limit, $start);
 //        $query = $this->db->get("products");
 
 //        if ($query->num_rows() > 0) {
 //            foreach ($query->result() as $row) {
 //                $data[] = $row;
 //            }
 //            return $data;
 //        }
 //        return false;
	// }
	public function fetch_all_products()
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}
	public function fetch_products_by_category($category_id)
	{
		$query = "SELECT * FROM products
				  WHERE categories_id = ? ";
		$value = array($category_id);
		return $this->db->query($query, $value)->result_array();
	}
	public function fetch_product_by_id($product_id)
	{
		$query = "SELECT * FROM products
				  WHERE id = ? ";
		$value = array($product_id);
		return $this->db->query($query, $value)->result_array();
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


}










?>