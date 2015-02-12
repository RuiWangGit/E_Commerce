<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Boot-camp</title>

  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="/assets/js/jquery-2.1.3.min.js"></script>
  <style type="text/css">
    .pull-right{
      margin-left: 10px;
    }
  </style>
  
  <script type="text/javascript">
  $(document).ready(function(){



  });



  function disable_enable()
    {
        if(document.getElementById("checkbox").checked != 1)
        {
           document.getElementById("checkbox-hidden").setAttribute('value', 0);  
            document.getElementsByName("billing_address")[0].removeAttribute("disabled");
            document.getElementsByName("billing_address2")[0].removeAttribute("disabled");
            document.getElementsByName("billing_state")[0].removeAttribute("disabled");
            document.getElementsByName("billing_city")[0].removeAttribute("disabled");
            document.getElementsByName("billing_zipcode")[0].removeAttribute("disabled");
            
        }
        else
        {
            document.getElementById("checkbox-hidden").setAttribute('value', 1); 
            document.getElementsByName("billing_address")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_address2")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_state")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_city")[0].setAttribute("disabled","disabled");
            document.getElementsByName("billing_zipcode")[0].setAttribute("disabled","disabled");
            
         
        }
    }


  </script>

  <style type="text/css">
  
  </style>
</head>
<body>
  <header class="navbar navbar-inverse">
    <div class="container">
      <a href='/' class='navbar-brand'>E Commerce</a>
      <div class="navbar-right">
        <nav>
          <ul class="nav navbar-nav">
            <li><a href='/'>Home</a></li>
            <li><a href='/'>Shopping cart ( <?= count($this->session->userdata('selected_products')) ?> )</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>


  <div class="container">


      <div class="col-lg-2">
        
      </div>
    
      <div class="col-lg-10"> 
        

        
        <form id="mainForm" action="/payments/pay" method="post">
          <div class="row" style="margin:40px 0">

            <div class="col-sm-4 " style="padding-left:30px; " > 
              
              <h4 style="margin: 20px 0">Shipping Information</h4>
              <div class="checkbox " >
                <label></label>
              </div>
              <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="first_name" class="form-control" name="shipping_first_name" value="michael" placeholder="Enter first name">
              </div>
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="last_name" class="form-control" name="shipping_last_name" value="choi" placeholder="Enter last name">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="shipping_email" value="micheal@gmail.com" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="address" class="form-control" name="shipping_address" value="choi" placeholder="Enter address">
              </div>
              <div class="form-group">
                <label for="address2">Address 2:</label>
                <input type="address" class="form-control" name="shipping_address2" value="choi" placeholder="Enter address2">
              </div>
              <div class="form-group">
                <label for="city">City:</label>
                <input type="city" class="form-control" name="shipping_city" value="choi" placeholder="Enter city">
              </div>
              <div class="form-group">
                <label for="state">State:</label>
                <input type="state" class="form-control" name="shipping_state" value="choi" placeholder="Enter state">
              </div>
              <div class="form-group">
                <label for="zipcode">Zipcode:</label>
                <input type="zipcode" class="form-control" name="shipping_zipcode" value="choi" placeholder="Enter zipcode">
              </div>
            </div>
            
          
          
            <div class="col-sm-4 col-sm-offset-2 " style="padding-right:30px"> 
              
              <h4 style="margin-top: 20px; display:inline-block;">Billing Information </h4>
              <div class="checkbox " >
                <label><input onClick="disable_enable()" type="checkbox" id="checkbox" name="checkbox" value="">Same as shipping address
                        <input  type="hidden" id="checkbox-hidden" name="checkbox" value="0"></label>
              </div>
              
                
                  <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="address" class="form-control" name="billing_address" value="choi" placeholder="Enter address">
                  </div>
                  <div class="form-group">
                    <label for="address2">Address 2:</label>
                    <input type="address" class="form-control" name="billing_address2" value="choi" placeholder="Enter address2">
                  </div>
                  <div class="form-group">
                    <label for="city">City:</label>
                    <input type="city" class="form-control" name="billing_city" value="choi" placeholder="Enter city">
                  </div>
                  <div class="form-group">
                    <label for="state">State:</label>
                    <input type="state" class="form-control" name="billing_state" value="choi" placeholder="Enter state">
                  </div>
                  <div class="form-group">
                    <label for="zipcode">Zipcode:</label>
                    <input type="zipcode" class="form-control" name="billing_zipcode" value="choi" placeholder="Enter zipcode">
                  </div>
                  <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="first_name" class="form-control" name="billing_first_name" value="michael" placeholder="Enter first name">
                  </div>
                  <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="last_name" class="form-control" name="billing_last_name" value="choi" placeholder="Enter last name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="billing_email" value="micheal@gmail.com" placeholder="Enter email">
                  </div>

                  <p style="color:red"><?php echo $this->session->flashdata('error'); ?></p>
                  <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input type="card_number" class="form-control" name="card_number" value="" placeholder="Enter card number">
                  </div>
                  <div class="form-group">
                    <label for="security_code">Security Code:</label>
                    <input type="security_code" class="form-control" name="security_code" value="" placeholder="Enter security code">
                  </div>
                  <div class="form-group">
                    <label for="expiration">Expiration:</label>
                    <input style="width:60px; height:30px; display:inline-block;" type="expiration_mm" class="form-control" name="expiration_mm" value="" placeholder="MM">/
                    <input style="width:60px; height:30px; display:inline-block;" type="expiration_yy" class="form-control" name="expiration_yy" value="" placeholder="YY">
                  </div>
                  

              <input type="hidden" name="submit" value="">
              <button  type = "submit" class="btn">Pay</button>
                          
            </div>
          </div>
      
        </form> 



        <h4 style="margin: 20px 0">Pay using Stripe</h4>
        <form style="margin:40px;" action="/payments/charge" method="post">

          <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key="pk_test_PrTLnuGBrMms6lkvy5rdAdbq"
                  data-image=""
                  data-name="Demo Site"
                  data-shipping-address
                  data-billing-address
                  data-description="2 widgets ($20.00)"
                  data-amount="2000">
          </script>
        </form>



      </div>

          
    
  </div>


  


</body>
</html>



