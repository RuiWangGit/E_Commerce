<h3><?= $product[0]['name'] ?></h3>
<img src="<?= $product[0]['main_image']?>">

<div><?= $product[0]['price']?></div>
<p><?= $product[0]['description']?></p>
<form method="post" action="/add/">
	<input type="hidden" name="id" value="">
	<input type="hidden" name="quantity" value="">
	<button type="submit" class="btn btn-primary">Add Cart</button>
</form>