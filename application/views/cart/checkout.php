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
							foreach($selected_products as $product){
								?>
								<tr>
									<td><?=$product['name']?></td>
									<td><?=$product['price']?></td>
									<td>
										<p><?=$product['quantity']?>
											<a class="pull-right" href="#delete-confirmation" role="button" data-toggle="modal">remove</a>
											<a class = "pull-right" href="/carts/update/<?=$product['id']?>">update</a> 
										</p>
									</td>
									<td><?= $product['price']*$product['quantity'] ?></td>		
								</tr>
									<?php
							}
							?>
						</tbody>
					</table>

					<p class="pull-right">
						Total:
						<a class="btn btn-large btn-info" href="" >Continue shopping</a>
					</p>	
					
				</div>
			

				<form id="mainForm" action="" method="post">
					<div class="col-sm-4" style="margin-top: 60px"> 
						
						<h4 style="margin: 20px 0">Shipping Address</h4>
						
						<div class="form-group">
							<label for="last_name">Address:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">Address 2:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">City:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">State:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">Zipcode:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						</form>
					</div>

					<div class="col-sm-4 pull-right" style="margin-top: 60px"> 
						
						<h4 style="margin: 20px 0">Billing Address</h4>
						
						<div class="form-group">
							<label for="last_name">Address:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">Address 2:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">City:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">State:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						<div class="form-group">
							<label for="last_name">Zipcode:</label>
							<input type="last_name" class="form-control" name="last_name" value="choi" placeholder="Enter last name">
						</div>
						</form>
					</div>
				

				
					<div class="col-sm-10" style="margin-top: 60px">
						<div class = "col-sm-6" style="marging:0; padding:0;">
							<h4 style="margin: 20px 0">Credit Card:</h4>
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

							<h3>Shipping Information</h3>
							<input type="hidden" name="submit" value="register">
							<button type="submit" class="btn btn-default">Submit</button>
							<p><a href="/signin">Already have an account? Login</a></p>
							
						</div>
					</div>

				</form>
			</div>
		
	</div>


	


</body>
</html>



