
			<h3>Items in cart</h3>
			<p class="navbar-text pull-right"><a class = "btn btn-large btn-info" href="/users/new">add new</a></p>          
			<table class="table table-striped">
				<thead>
					<tr>
						<!-- <th>ID</th> -->
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>

					<?php
						foreach($users as $user){
							?>
							<tr>
								<td><?=$product['name']?></td>
								<td><?=$product['price']?></td>
								<td>
									<?=$product['quantity']?>
									<a href="/carts/update/<?=$product['id']?>">update</a> 
									<a class="btn" href="#delete-confirmation" role="button" data-toggle="modal">remove</a>
								</td>
								<td><?= $product['price']*$product['quantity'] ?></td>
								
							</tr>
							<?php
						}
					?>

				</tbody>
			</table>

			<p>Total:</p>
			
