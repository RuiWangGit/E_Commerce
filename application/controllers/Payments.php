<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends CI_Controller {

   public function __construct()
   {
        parent::__construct();
        // $this->output->enable_profiler();
    }

    public function index()
    {
         // var_dump($this->input->post());
         // die;

        //display charging interface
         $this->load->view("cart/charge", array('userinfo', $this->input->post()) ) ;
                
    }


    public function show(){
        $this->load->view("cart/charge");
    }

    public function success(){
        $this->load->view('cart/success');
    }

    public function fail(){
        $this->session->set_flashdata('error', "failed to process your payment");
        $this->load->view('cart/charge');

    }


    public function charge(){
    	var_dump($this->input->post());
    	die;
    	$this->load->view("cart/success");
    }


    public function verify($form){
        // var_dump($this->session);
        // die;

        $shipping_address = $form['shipping_address'];
        $shipping_state   =  $form['shipping_state'];
        $shipping_city    = $form['shipping_city'];
        $shipping_zipcode = $form['shipping_zipcode'];
        $shipping_first_name = $form['shipping_first_name'];
        $shipping_last_name = $form['shipping_last_name'];
        $shipping_phone     =$form['shipping_phone'];
        $shipping_email     =$form['shipping_email'];

        $billing_address = $form['billing_address'];
        $billing_state   =  $form['billing_state'];
        $billing_city    = $form['billing_city'];
        $billing_zipcode = $form['billing_zipcode'];
        $billing_full_name = $form['billing_full_name'];
        
        $billing_phone     =$form['billing_phone'];
        $billing_email     =$form['billing_email'];

        $credit_card      = $form['credit_card'];
        $security_code      = $form['security_code'];
        $expiration_mm      = $form['expiration_mm'];
        $expiration_yy      = $form['expiration_yy'];




        $this->load->library("form_validation");
        // $this->form_validation->set_message('matches', 'passwords entered are not the same.');
        $this->form_validation->set_rules("shipping_first_name", "shipping_first_name", "trim|required|alpha");
        $this->form_validation->set_rules("shipping_last_name", "shipping_last_name", "trim|required|alpha");
        $this->form_validation->set_rules("shipping_email", "shipping_email", "valid_email|required|trim");
        $this->form_validation->set_rules("shipping_address", "shipping_address", "required|trim");
        $this->form_validation->set_rules("shipping_state", "shipping_state", "required|trim");
        $this->form_validation->set_rules("shipping_city", "shipping_city", "required|trim");
        $this->form_validation->set_rules("shipping_zipcode", "shipping_zipcode", "required|trim");

        $this->form_validation->set_rules("billing_full_name", "billing_full_name", "trim|required|alpha");
        $this->form_validation->set_rules("billing_email", "billing_email", "valid_email|required|trim");
        $this->form_validation->set_rules("billing_address", "billing_address", "required|trim");
        $this->form_validation->set_rules("billing_state", "billing_state", "required|trim");
        $this->form_validation->set_rules("billing_city", "billing_city", "required|trim");
        $this->form_validation->set_rules("billing_zipcode", "billing_zipcode", "required|trim");
        $this->form_validation->set_rules("credit_card", "credit_card", "required|trim|numeric");
        $this->form_validation->set_rules("security_code", "security_code", "required|trim|numeric");
        $this->form_validation->set_rules("expiration_mm", "expiration_mm", "required|trim|numeric|exact_length[2]");
        $this->form_validation->set_rules("expiration_yy", "expiration_yy", "required|trim|numeric|exact_length[2]");
         
        
         

        if ($this->form_validation->run()==false){
            $this->load->view("cart/charge");

        }
        else return true;


    }

    public function pay(){

        // var_dump($this->input->post());
        // var_dump($this->session);
        // die;
        $data=$this->input->post();
        $this->load->model('Payment');

        if ($this->verify($data) ){


        
        //     header("Location:/payments/show");
        //     return;
        // }

       
            if ( $data['checkbox'] == 1) {

                if ($this->Payment->process_credit_card() ){
                    $this->Payment->insert_address();
                    $this->Payment->insert_payment();
                    $this->Payment->insert_customer();
                    header("Location:/payments/success");
                    return;
                } 
                else {
                    header("Location:/payments/fail");
                    return ;
                }



            }
            else {

                if ($this->Payment->process_credit_card() ){
                    $this->Payment->insert_address();
                    $this->Payment->insert_payment();
                    $this->Payment->insert_customer();
                    header("Location:/payments/success");
                    return;
                } 
                else {
                    header("Location:/payments/fail");
                    return ;
                }



            }

        }


    }
}

