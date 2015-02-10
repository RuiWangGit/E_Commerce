<html>
<head>
	<title>Edit Product</title>
</head>
<body>
	<h1>EDIT PRODUCT.</h1>
	<form action='EditProducts/EditProduct' method='post'>

		Name<input type='text' name='name' value='<?= $product[0]["name"] ?>'><br />
		Description<textarea name='description'><?=$product[0]['description']?></textarea><br />
		Category<input type='text' name='category' value="<?=$product[0]['category']?>"><br />
		Price<input type='text' name='price' value="<?=$product[0]['price']?>"><br />
		Inventory<input type='text' name='inventory' value="<?=$product[0]['inventory']?>"><br />
		Main Image<input type='text' name='main_image' value="<?=$product[0]['main_image']?>"><br />
		Image #1<input type='text' name='image_path_1' value="<?=$product[0]['image_path_1']?>"><br />
		Image #2<input type='text' name='image_path_2' value="<?=$product[0]['image_path_2']?>"><br />
		Image #3<input type='text' name='image_path_3' value="<?=$product[0]['image_path_3']?>"><br />
		<input type='submit' name='submit' value='Create new product!'>
	</form>
</body>
</html>
