<?php
var_dump($product);
?>

<html>
<head>
	<title>Edit Product</title>
</head>
<body>
	<h1>EDIT PRODUCT.</h1>
	<form action='EditProducts/EditProduct' method='post'>

		Name<input type='text' name='name' placeholder='<?= $product[0]["name"] ?>'><br />
		Description<input type='text' name='description' placeholder="<?=$product[0]['description']?>"><br />
		Price<input type='text' name='price' placeholder="<?=$product[0]['price']?>"><br />
		Inventory<input type='text' name='inventory' placeholder="<?=$product[0]['inventory']?>"><br />
		Main Image<input type='text' name='main_image' placeholder="<?=$product[0]['main_image']?>"><br />
		Image #1<input type='text' name='image_path_1' placeholder="<?=$product[0]['img_path_1']?>"><br />
		Image #2<input type='text' name='image_path_2' placeholder="<?=$product[0]['img_path_2']?>"><br />
		Image #3<input type='text' name='image_path_3' placeholder="<?=$product[0]['img_path_3']?>"><br />
		Category<input type='text' name='category_id' placeholder="<?=$product[0]['category']?>"><br />
		<input type='submit' name='submit' value='Create new product!'>
	</form>
</body>
</html>
