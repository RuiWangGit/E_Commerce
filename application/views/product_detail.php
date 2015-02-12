<div id="detail" class="row clearfix">
	<div class="col-lg-4">
		<img src="<?= $product[0]['main_image']?>" class="img-responsive main-image">
		<div class="thumb-container clearfix">
			<div class="thumb">
				<img src="<?= $product[0]['image_path_1']; ?>" class="img-responsive">
			</div>
			<div class="thumb">
				<img src="<?= $product[0]['image_path_2']; ?>" class="img-responsive">
			</div>
			<div class="thumb">
				<img src="<?= $product[0]['image_path_3']; ?>" class="img-responsive">
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<h3><?= $product[0]['name'] ?></h3>
		<div class="price">
			<h4><i class="fa fa-usd"></i><?= $product[0]['price']?></h4>
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
<h3>Featured Items</h3>
<div id="slideshow-frame">
	<div class="slideshow-box">
		<ul>
<?php
		foreach($featured_products as $featured_product) {
?>
			<li>
				<a href="/home/product/<?= $featured_product['id'] ?>" title="<?= $featured_product['name']?>">
					<img src="<?= $featured_product['main_image'] ?>" class="img-responsive">
					<p class="text-center"><?= $featured_product['name'] ?></p>
				</a>

			</li>
<?php
		}
?>
		</ul>
	</div>
	<div class="arrow-prev"></div>
	<div class="arrow-next"></div>
</div>
