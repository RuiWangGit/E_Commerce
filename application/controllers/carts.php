<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Carts extends CI_Controller {

   public function __construct(){
        parent::__construct();
        $this->output->enable_profiler();
    }

    public function index(){
         
         $this->load->view("/cart/show" ) ;
                
    }
	
    public function add(){
        $product_id = $this->input->post('id');
        $product_qty = $this->input->post('quantity');

        $this->load->model("Product");
        $product = $this->Product->get_one_product($product_id);
        //store in session product array
        if ( $this->session->userdata('products')){
            $carts_arr = $this->session->userdata('products');
            if ( isset($carts_arr[$product_id]) ) {
                //update quantity
                $carts_arr[$product_id]['qty'] += $product_qty;
                $this->session->set_userdata('products', $carts_arr);
            }
            else {
                //echo " +++";
                //var_dump($carts_arr);
                $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'qty'=>$product_qty, 'price'=>$product['price'],
             'description'=>$product['description']  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('products', $carts_arr);


            }

        }
        else {
            if ( isset($carts_arr[$product_id]) ) {
                //update quantity
                $carts_arr[$product_id]['qty'] += $product_qty;
                $this->session->set_userdata('products', $carts_arr);
            }
            else {
                //echo " +++";
                //var_dump($carts_arr);
                $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'qty'=>$product_qty, 'price'=>$product['price'],
             'description'=>$product['description']  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('products', $carts_arr);


            }
        }        
        header("Location:/home/show");  
    }
}

