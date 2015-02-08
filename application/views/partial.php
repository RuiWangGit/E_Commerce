<?php
	foreach($products as $product) {
?>
	<div>
		<img src="<?= $product['main_image']?>">
		<div><?= $product['price']?></div>
		<p><?= $product['desc']?></p>
	</div>
<?php
	}
?>