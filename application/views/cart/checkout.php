<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->session->sess_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Boot-camp</title>

	<!--To use Jquery -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js">
	</script>

	<!-- To use bootstrap -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="/assets/js/bootstrap.min.js"></script>	
	


	<style type="text/css">
		.pull-right{
			margin-left: 10px;
		}
	</style>
	
	<script type="text/javascript">

	$(document).ready(function(){

		$("a#update-link").click(function() {
			var tmp = $(this).parent().siblings();
			$.ajax({
				url: $(this).attr("href")
			}).done(function(data){
				tmp.html(data);
			})
			return false;
		})

		// $(this).on("click", "#update-link", function() {
		// 	alert("work");
		// });


		// $('#update-qty').on("click", function(output){
		// 	console.log("testing");
		// 	return false;

		// });

		// $(document).on("click", "a#category", function(){
		// 	$.ajax({
		// 		url: $(this).attr("href")
		// 	}).done(function(data){
		// 		$("div.item_result").html(data);
		// 	});
		// 	return false;
		// });

		// $(document).on("click", "a#product", function(){
		// 	$.ajax({
		// 		url: $(this).attr("href")
		// 	}).done(function(data){
		// 		$("div.item_result").html(data);
		// 	});
		// 	return false;
		// });


		// $(document).on("click", 'a#update', function(){
		// 	alert("work");
		// 	// $.ajax({
		// 	// 	url: $(this).attr("href")
		// 	// }).done(function(data){
		// 	// 	console.log(data);
		// 	// 	console.log($(this).parent());	
		// 	// 	$(this).parent().siblings().html(data);
		// 	// });
		// 	return false;
		// });

		

		
		


	});

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
						<li><a href='/carts'>Shopping cart ( <?= count($selected_products) ?> )</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>


	<div class="container">
		<div class="row">

			<div class="col-lg-2">
				<input type="text" name="search">
				<input type="submit" value="submit">	
			</div>
			
			<div class="col-lg-10" style="margin-bottom:50px"> 
				<h3>Items in cart </h3>
				<div class="prod">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Item</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$product_id =null;
							$total = 0;
							foreach($selected_products as $product){
								$product_id = $product['id'];
								?>
								<tr>
									<td><?=$product['name']?></td>
									<td><?=$product['price']?></td>
									<td>
										
										<p id="update-qty" style="display:inline-block">
											
											<?php require_once('update.php'); ?>
										</p>

										<p style="display:inline-block" class="pull-right">
											<a data-toggle="modal" href="#delete-confirmation" class="pull-right">remove</a> 
											<a id="update-link" data-toggle="modal" href="/carts/update/<?=$product_id?>" class="pull-right">update</a>											
										</p>


									</td>
									<td>$<?= $product['price']*$product['quantity'] ?></td>		
								</tr>
									<?php
									$total += $product['price']*$product['quantity'];
							}
							?>
						</tbody>
					</table>


					<p class="pull-right">
						<label style="display:block;">Total:   $<?=$total?></label>
						<a class="btn btn-large btn-info" href="/home" >Continue shopping</a>
					</p>	
					
				</div>
			</div>
		</div>	

				<form id="mainForm" action="/payments" method="post">
					<div class="row" style="margin:40px 0">

						<div class="col-sm-4 col-sm-offset-2" style="padding-left:30px; " > 
							
							<h4 style="margin: 20px 0">Shipping Information</h4>
							<div class="checkbox " >
							  <label></label>
							</div>
							<div class="form-group">
								<label for="first_name">First Name:</label>
								<input type="first_name" class="form-control" name="first_name" value="michael" placeholder="Enter first name">
							</div>
							<div class="form-group">
								<label for="last_name">Last Name:</label>
								<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" name="email" value="micheal@gmail.com" placeholder="Enter email">
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
							  <label><input type="checkbox" value="">Same as shipping information</label>
							</div>
							<div class="form-group">
								<label for="first_name">First Name:</label>
								<input type="first_name" class="form-control" name="first_name" value="michael" placeholder="Enter first name">
							</div>
							<div class="form-group">
								<label for="last_name">Last Name:</label>
								<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" name="email" value="micheal@gmail.com" placeholder="Enter email">
							</div>
								<div>
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
							</div>

							<input type="hidden" name="submit" value="">
							<button  type = "submit" class="btn">Pay</button>
													
						</div>
					</div>
			
				</form>
				
			
						
			
		
	</div>


	<div class="modal fade" id="update-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
        	 <h4 class="modal-title">new quantity</h4>
         	 <form action="/carts/update" method="post">
        		<input type="hidden" name="id" value='<?=$product_id?>'>
        		<input type="text" name="quantity" value="">
          		<button type="submit" class="btn btn-default" >update</button>
          		<button type="submit" class="btn btn-primary" data-dismiss="modal">No</button>
          	</form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <div class="modal fade" id="delete-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
          <h4 class="modal-title">Do you really want to remove the product?</h4>
        </div>
        <div class="modal-body">
        	<form action="/carts/remove" method="post">
        		<input type="hidden" name="id" value='<?=$product_id?>'>
          		<button type="submit" class="btn btn-default" >Yes</button>
          		<button type="submit" class="btn btn-primary" data-dismiss="modal">No</button>
          	</form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

 


	


</body>
</html>



