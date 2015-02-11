<div class="resulta">
<h2><?= $title; ?></h2>
<div>Sorted by
	<form id="sort" method="post" action="/home/sort_by">
		<select name="sort">
			<option value="low_price">Low Price</option>
			<option value="high_price">High Price</option>
			<option value="popular">Most Popular</option>
		</select>
		<input type="submit" value="submit">
	</form>
</div>
<?php
	foreach($products as $product) {
?>
	<div class="item">
		<a id="product" href="/home/product/<?= $product['id'] ?>">
			<img src="<?= $product['main_image']?>">
			<p><?= $product['name']?></p>
			<div><?= $product['price']?></div>	
		</a>
	</div>
<?php
	}
?>
	<div id="pagination" class="text-center"><?= $links; ?></div>
</div>