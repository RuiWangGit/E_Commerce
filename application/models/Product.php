<?php

	class Product extends CI_Model{


		public function get_one_product($id){
			// $this->output->enable_profiler(TRUE);
			$query = "SELECT * FROM products WHERE id = ? ";
			$values = array($id);
			return $this->db->query($query, $values)->row_array();
		}



		public function update_quantity(){

			

		}



		

	}



?>