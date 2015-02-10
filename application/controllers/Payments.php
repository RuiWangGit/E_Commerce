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
         $this->load->view("cart/charge", array('userinfo', $this->input->post()) ) ;
                
    }


    public function charge(){
    	var_dump($this->input->post());
    	die;
    	$this->load->view("cart/success");
    }
}

