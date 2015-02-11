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
						<li><a href='/carts'>Shopping cart ( <?= count($this->session->userdata('selected_products')) ?> )</a></li>
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

			<h3>You have added the following product into your cart. </h3>

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
						<tr>
							<td><img class='carts-img img-responsive' src='<?= $product["main_image"]?>' alt="no image"><br/><?=$product['name']?></td>
							<td><?=$product['price']?></td>
							<td>
								<p><?=$product['quantity']?>
									
								</p>
							</td>
							<td><?= $product['price']*$product['quantity'] ?></td>		
						</tr>
					</tbody>
				</table>

				<p class="pull-right">
					<a class = "btn btn-large btn-info " href="/carts">Edit your cart</a>
					<a class="btn btn-large btn-info" href="/home" >Continue shopping</a>
				</p>	
				
	

			</div>

		</div>





	</div>



		





</body>
</html>