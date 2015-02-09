<?php
	foreach($products as $product) {
?>
	<div>
		<a id="product" href="index.php/home/product/<?= $product['id'] ?>">
			<img src="<?= $product['main_image']?>">
			<p><?= $product['name']?></p>
			<div><?= $product['price']?></div>
			
		</a>
	</div>
<?php
	}
?>