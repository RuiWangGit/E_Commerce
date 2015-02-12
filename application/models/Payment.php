<?php

	class Payment extends CI_Model{

		public function insert_payment(){
			
		}

		public function insert_address(){

		}

		public function insert_customer(){

		}

		public function process_credit_card(){

			if ( rand(0, 1) ==0 ) return true;
			else return false;
		}





	}



?>