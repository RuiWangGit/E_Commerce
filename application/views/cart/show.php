<?php include("header.php") ?>


	<div class="container">
		<div class="col-md-2">
			
			
		</div>

		<div class="col-md-10"> 

			<h3>You have added the following product into your cart. </h3>

			<div class="prod">
				<h1><?= $product["main_image"] ?></h1>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Item</th>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><img  style="width:50px; height:50px" class='carts-img img-responsive' src='<?= $product["main_image"]?>' alt="no image"></td>
							<td><?=$product['name']?></td>
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
					<a class="btn btn-large btn-info" href="/" >Continue shopping</a>
				</p>	
				
	

			</div>

		</div>





	</div>


<?php include("footer.php") ?>