<?php

	class Product extends CI_Model{


		public function get_one_product($id){
			// $this->output->enable_profiler(TRUE);
			$query = "SELECT * FROM products WHERE id = ? ";
			$values = array($id);
			return $this->db->query($query, $values)->row_array();
		}

		public function get_all_selected_products($products){
			$res = [];
			foreach( $products as $id=>$product){
				$each = $this->get_one_product($id);
				$each['quantity'] = $product['quantity'];
				$res[$id] = $each;
			}
			return $res;	
		}



		public function update_inventory($id, $inventory, $quantity){
			$query = "UPDATE products set inventory = ? WHERE id =?";
			$values = array(  ($inventory - $quantity), $id) ;
			$product = $this->db->query($query, $values)->row_array();

		}

		
		//single order limit
		//inventory limit

		public function has_inventory($id, $quantity){
			//new quantity should be the inventory - quantity
			$query = "SELECT * FROM products WHERE id =? ";
			$values = array($id);
			$product = $this->db->query($query, $values)->row_array();
			if (($product['inventory'] - $quantity) >= 0  )	return true;
			else return false;
		}

		// public function get_order_limit($id){
		// 	$query = "SELECT * FROM products WHERE id =? ";
		// 	$values = array($id);
		// 	$product = $this->db->query($query, $values)->row_array();
		// 	if ($product['order-limit']) return $product['order-limit'];
		// 	else return 5; 

		// }


	}



?>