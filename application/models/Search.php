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
				  WHERE category_id = ? ";
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

	public function fetch_products_by_keyword($keyword)
	{
		$query = "SELECT * FROM products
				  WHERE name like ? OR description like ?";
		$value = array("%".$keyword."%", "%".$keyword."%");
		return $this->db->query($query, $value)->result_array();
	}
}

?>