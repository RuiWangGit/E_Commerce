<h3><?= $product[0]['name'] ?></h3>
<img src="<?= $product[0]['main_image']?>">

<div><?= $product[0]['price']?></div>
<p><?= $product[0]['description']?></p>
<form method="post" action="/add/">
	<input type="hidden" name="id" value="<?= $product[0]['id']?>">
	<select name="quantity">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
	<button type="submit" class="btn btn-primary">Add Cart</button>
</form>