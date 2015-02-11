<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Carts extends CI_Controller {

   public function __construct(){
        parent::__construct();
        // $this->output->enable_profiler();
    }

    public function index(){

        $this->load->view("cart/checkout", array('selected_products'=>$this->session->userdata('selected_products')));
                
    }




     public function update(){
        // echo $this->uri->segment(3);
        // die();

        $this->load->model('Product');
        $id = $this->uri->segment(3) ;
        $p = $this->Product->get_one_product( $id);
           // $p = $this->Product->get_one_product($this->uri->segment(3)); 
        if ( $p['order-limit'] == null) $p['order-limit']= 5;
        if ( $p['inventory'] > $p['order-limit'])  $this->retrieve_update($this->session->userdata['selected_products'][$id], $p['order-limit']);
        else  $this->retrieve_update( $this->session->userdata['selected_products'][$id],$p['inventory'] );        
       // $carts_arr = $this->session->userdata('selected_products');
       // $carts_arr[$this->input->post('id')]['quantity'] = $this->input->post('quantity');
       // $this->session->set_userdata('selected_products', $carts_arr);
       // header("Location:/carts"); 


    }


    public function retrieve_update($product, $limit){
        //$this->Note->update($this->input->post());
        // var_dump($product);
        // die;
        $this->load->view('cart/update', array("product" => ['limit'=>$limit, 'quantity'=>$product['quantity'], 'name'=> $product['name'], 'price'=>$product['price'] ])) ;

    }

    public function update_backup(){
        
       $carts_arr = $this->session->userdata('selected_products');
       $carts_arr[$this->input->post('id')]['quantity'] = $this->input->post('quantity');
       $this->session->set_userdata('selected_products', $carts_arr);
       header("Location:/carts"); 


    }

    public function remove(){
        
        $carts_arr = $this->session->userdata('selected_products');
        unset($carts_arr[$this->input->post('id')]);
        $this->session->set_userdata('selected_products', $carts_arr);
        header("Location:/carts"); 
    }


    public function add(){
        $product_id = $this->input->post('id');
       $product_qty = $this->input->post('quantity');
        //$this->session->set_userdata('selected_products',"");
        // $product_id = 4;
        // $product_qty = 3;

        $this->load->model("Product");
        $product = $this->Product->get_one_product($product_id);
        //store in session product array

        // var_dump($product);
        // echo "ssssss";
        // var_dump($this->session->userdata('selected_products'));
       
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
            // if ( isset($carts_arr[$product_id]) ) {
            //     //update quantity
            //     $carts_arr[$product_id]['quantity'] += $product_qty;
            //     $this->session->set_userdata('selected_products', $carts_arr);
            // }
            // else {
                //echo " +++";
                //var_dump($carts_arr);
                $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'name'=>$product['name'], 'quantity'=>$product_qty, 'price'=>$product['price'],
             'description'=>$product['description']  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('selected_products', $carts_arr);


            // }
        }
        // var_dump($carts_arr);
         // var_dump($this->session->userdata('selected_products'));
        // var_dump($carts_arr["{$product['id']}"]);
        // die;

        $this->load->view('/cart/show', array('product'=>$carts_arr["{$product['id']}"]));        
        // header("Location:/home/show/1");  
    }



   



}

