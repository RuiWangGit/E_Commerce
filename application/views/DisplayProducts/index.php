
<html>
<head>
	<title>Products</title>
	<style type="text/css">
		.heading_row{
			background: green;
		}
		.gray_row{
			background: gray;
		}
	</style>
</head>
<body>
	<a href="CreateProducts">Add new product</a>
	<table>
		<thead>
			<th>Picture</th>
			<th>ID</th>
			<th>Name</th>
			<th>Inventory Count</th>
			<th>Quantity sold</th>
			<th>Action</th>
		</thead>
		<tbody>
<?php
	// var_dump($products);
	foreach ($products as $product) {
		echo "<tr>";
		foreach ($product as $product_attribute) {
			echo "<td>{$product_attribute}</td>";
		}
		echo "<td>0</td><td><a href='/EditProducts/index/".$product['id']."'>Edit</a> | <a href='/DeleteProducts/index/".$product['id']."'>delete</a></td></tr>";
	}
?>
		</tbody>
	</table>
</body>
</html>