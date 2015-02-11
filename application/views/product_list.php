<div class="title-bar">
	<h1><?= $title; ?></h1>
	<form id="sort" class="form-inline" method="post" action="/home/sort_by">
		<select class="form-control" name="sort">
			<option value="popular">Most Popular</option>
			<option value="low_price">Low Price</option>
			<option value="high_price">High Price</option>
		</select>
	</form>
</div>
<?php
foreach($products as $product) {
?>
<div class="item">
	<a id="product" href="/home/product/<?= $product['id'] ?>">
		<img src="<?= $product['main_image']?>" class="img-responsive">
		<div>
			<p class="text-right">$<?= $product['price']?></p>	
			<p class="text-center"><?= $product['name']?></p>
		</div>
	</a>
</div>
<?php
	}
?>
<div id="pagination"><?= $links; ?></div>