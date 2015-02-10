<html>
<head>
	<title>Create a product!</title>
</head>
<body>
	<form action='CreateProducts/CreateProduct' method='post'>
		Name<input type='text' name='name' placeholder='name'><br />
		Description<input type='text' name='description' placeholder='description'><br />
		Price<input type='text' name='price' placeholder='price'><br />
		Inventory<input type='text' name='inventory' placeholder='inventory'><br />
		Main Image<input type='text' name='main_image' placeholder='main_image'><br />
		Image #1<input type='text' name='image_path_1' placeholder='image_path_1'><br />
		Image #2<input type='text' name='image_path_2' placeholder='image_path_2'><br />
		Image #3<input type='text' name='image_path_3' placeholder='image_path_3'><br />
		Category<input type='text' name='category_id' placeholder='category_id'><br />
		<input type='submit' name='submit' value='Create new product!'>
	</form>
</body>
</html>

