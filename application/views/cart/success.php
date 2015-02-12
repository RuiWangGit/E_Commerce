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
        

        
        <h4>You have successfully purchased your products. Thank you!</h4>

        <p> <a href="/home">back to our home page</p>

        



      </div>

          
    
  </div>


  


</body>
</html>



