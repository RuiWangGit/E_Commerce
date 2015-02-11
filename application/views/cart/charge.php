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


    $(document).on("click", "a#category", function(){
      $.ajax({
        url: $(this).attr("href")
      }).done(function(data){
        $("div.item_result").html(data);
      });
      return false;
    });

    $(document).on("click", "a#product", function(){
      $.ajax({
        url: $(this).attr("href")
      }).done(function(data){
        $("div.item_result").html(data);
      });
      return false;
    });

    //------adding stripe-----
    



  })

  </script>

  <style type="text/css">
  .item_result div {
    display: inline-block;
    width: 200px;
  }
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
            <li><a href='/'>Shopping cart(1)</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>


  <div class="container">


      <div class="col-lg-2">
        <input type="text" name="search">
        <input type="submit" value="submit">  
      </div>
    
      <div class="col-lg-10"> 
        <form action="/payments/charge" method="post">
          <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key="pk_test_PrTLnuGBrMms6lkvy5rdAdbq"
                  data-image="/square-image.png"
                  data-name="Demo Site"
                  data-description="2 widgets ($20.00)"
                  data-amount="2000">
          </script>
        </form>

      </div>

          
    
  </div>


  


</body>
</html>



