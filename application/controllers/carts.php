<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Carts extends CI_Controller {

   public function __construct(){
        parent::__construct();
        // $this->output->enable_profiler();
    }

    public function index(){

        // $this->load->model("Product");
        // $product = $this->Product->get_one_product($product_id);
         
         // $this->load->view("/cart/show" ) ;
        // $this->load->library("lib/Stripe");

        $this->load->view("cart/checkout", array('selected_products'=>$this->session->userdata('selected_products')));
                
    }
	
    public function add(){

        //$product_id = $this->input->post('id');
       // $product_qty = $this->input->post('quantity');
        //$this->session->set_userdata('selected_products',"");
        $product_id = 1;
        $product_qty = 3;

        $this->load->model("Product");
        $product = $this->Product->get_one_product($product_id);
        //store in session product array
       
        $selected_products = $this->session->userdata('selected_products');
        if ( $selected_products !== null){
            $carts_arr = $this->session->userdata('selected_products');
            if ( isset($carts_arr[$product_id]) ) {
                //update quantity
                $carts_arr[$product_id]['quantity'] += $product_qty;
                $this->session->set_userdata('selected_products', $carts_arr);
            }
            else {
                //echo " +++";
                //var_dump($carts_arr);
                $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'name'=>$product['name'], 'quantity'=>$product_qty, 'price'=>$product['price'],
             'description'=>$product['description']  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('selected_products', $carts_arr);


            }

        }
        else {
            if ( isset($carts_arr[$product_id]) ) {
                //update quantity
                $carts_arr[$product_id]['quantity'] += $product_qty;
                $this->session->set_userdata('selected_products', $carts_arr);
            }
            else {
                //echo " +++";
                //var_dump($carts_arr);
                $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'name'=>$product['name'], 'quantity'=>$product_qty, 'price'=>$product['price'],
             'description'=>$product['description']  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('selected_products', $carts_arr);


            }
        }
        // var_dump($carts_arr["{$product['id']}"]);
        // die;

        $this->load->view('/cart/show', array('product'=>$carts_arr["{$product['id']}"]));        
        // header("Location:/home/show/1");  
    }



   



}

