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


    public function pay(){

        // var_dump($this->input->post());
        // var_dump($this->session);
        // die;

        $data=$this->input->post();
        $this->load->model('Payment');


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

