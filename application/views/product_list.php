<div class="title-bar">
	<h1><?= $title; ?></h1>
	<form id="sort" class="form-inline" method="post" action="/home/sort_by">
		<select class="form-control" name="sort">
			<option value="low_price">Low Price</option>
			<option value="high_price">High Price</option>
			<option value="popular">Most Popular</option>
		</select>
	</form>
</div>
<?php
foreach($products as $product) {
?>
<div class="item">
	<a id="product" href="/home/product/<?= $product['id'] ?>">
		<img src="<?= $product['main_image']?>" class="img-responsive">
		<p><?= $product['name']?></p>
		<div><?= $product['price']?></div>	
	</a>
</div>
<?php
	}
?>
<div id="pagination"><?= $links; ?></div>