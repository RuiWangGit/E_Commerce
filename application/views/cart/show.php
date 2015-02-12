<?php $this->load->view("header") ?>


	<div id="main-section" class="container">
		<div class="col-md-2">
			
			
		</div>

		<div class="col-md-10"> 

			<h3>You have added the following product into your cart. </h3>

			<div class="prod">

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
							<td><a href="/home/product/<?= $product['id']?>"><?=$product['name']?></a></td>
							<td><i class="fa fa-usd"></i><?=$product['price']?></td>
							<td>
								<p><?=$product['quantity']?>
									
								</p>
							</td>
							<td><i class="fa fa-usd"></i><?= $product['price']*$product['quantity'] ?></td>		
						</tr>
					</tbody>
				</table>

				<div class="text-right">
					<a href="/carts">
						<button class="btn btn-success">Edit your cart</button>
					</a>
					<a href="/" >
						<button class="btn btn-success">Continue shopping</button>
					</a>
				</div>	
				
	

			</div>

		</div>





	</div>


<?php $this->load->view("footer") ?>