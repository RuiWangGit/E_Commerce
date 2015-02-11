<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Carts extends CI_Controller {

   public function __construct(){
        parent::__construct();
        // $this->output->enable_profiler();
    }

    public function index(){


        //$selected_products =  
        $this->load->model('Product');
        $selected_products  = $this->Product->get_all_selected_products($this->session->userdata('selected_products'));
        // var_dump($selected_products);
        // die;
        $this->load->view("cart/checkout", array('selected_products'=>$selected_products, 'id'=>"" ) );
                
    }


    public function update(){
        // echo $this->uri->segment(3);
        // die();
        // var_dump($this->input->post());
        // die;


        if ( $this->input->post('submit') == "save"){
            //do something......
            $quantity = $this->input->post('quantity');
            $id = $this->uri->segment(3) ;

            $this->load->model('Product');
            $p = $this->Product->get_one_product( $id);
            if ( $p['order-limit'] == null) $p['order-limit']= 5;

            if ( $quantity <= 0 || $quantity > $p['order-limit']) {
                // echo "testing.......";
                $error = "you can only order max number".$p['order-limit'];
                $this->session->set_flashdata('error', $error);
                // redirect('carts/save/'.$id);
                header("location:/carts/update/$id");
                return;
            }
            // if inventory is low then order-limit, set order-limit
            else {
                
                $carts_arr = $this->session->userdata('selected_products');
                $carts_arr[$id]['quantity'] = $quantity;
                $this->session->set_userdata('selected_products', $carts_arr);

                header("location:/carts/update/$id");
                return;

            }
         
         }

    }

    
    public function retrieve_update(){
        //$this->Note->update($this->input->post());
        // var_dump($product);
        // die;



        $id = $this->uri->segment(3) ;

        $this->load->model('Product');
        $selected_products  = $this->Product->get_all_selected_products($this->session->userdata('selected_products'));
        // var_dump($selected_products);
        // die;
        $p = $this->Product->get_one_product( $id);
        $this->load->view('cart/update', array('selected_products'=>$selected_products , 'id'=>$id )  ) ;

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
        

        $this->load->model("Product");
        $product = $this->Product->get_one_product($product_id);
        $product['quantity'] = $this->input->post('quantity');
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
                $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'quantity'=>$product_qty  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('selected_products', $carts_arr);


            }

        }
        else {
            
             //    $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'name'=>$product['name'], 'quantity'=>$product_qty, 'price'=>$product['price'],
             // 'description'=>$product['description']  ];
               $carts_arr["{$product['id']}"] = [ 'id'=>$product['id'], 'quantity'=>$product_qty  ];
             //var_dump($carts_arr);
             $this->session->set_userdata('selected_products', $carts_arr);

        }
        
        // var_dump($product);
        // die;
        
        $this->load->view('/cart/show', array('product'=>$product ) );        
        // header("Location:/home/show/1");  
    }



   



}

