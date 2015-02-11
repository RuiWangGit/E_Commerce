<div class="row">
	<div class="col-lg-4">
		<img src="<?= $product[0]['main_image']?>" width="300">
	</div>
	<div class="col-lg-8">
		<h3><?= $product[0]['name'] ?></h3>
		<div class="price">
			<h4>$<?= $product[0]['price']?></h4>
			<form method="post" action="/add/">
				<input type="hidden" name="id" value="<?= $product[0]['id']?>">
				<div class="col-sm-8">
					<select name="quantity" class="form-control">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary">Add Cart</button>
				</div>
			</form>
		</div>
		<p class="description"><?= $product[0]['description']?></p>
		
	</div>
</div>