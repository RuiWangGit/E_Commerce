<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Boot-camp</title>

	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="/assets/js/jquery-2.1.3.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click", "a#category", function(){
				$.ajax({
					url: $(this).attr("href")
				}).done(function(data){
					$("div.item_result").html(data);
				});
				return false;
			});

			$(document).on("click", "a#product", function(){
				$.ajax({
					url: $(this).attr("href")
				}).done(function(data){
					$("div.item_result").html(data);
				});
				return false;
			});
		})

	</script>

	<style type="text/css">
		.item_result div {
			display: inline-block;
			width: 200px;
		}
	</style>
</head>
<body>
	<header class="navbar navbar-inverse">
		<div class="container">
			<a href='/' class='navbar-brand'>E Commerce</a>
			<div class="navbar-right">
				<nav>
					<ul class="nav navbar-nav">
						<li><a href='/'>Home</a></li>
						<li><a href='/'>Shopping cart(1)</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="col-lg-2">
			<input type="text" name="search">
			<input type="submit" value="submit">
		
			<h4>Categories</h4>
			<ul>
<?php
			foreach($categories as $category) {
?>
				<li><a id="category" href="index.php/home/category/<?= $category['id'] ?>"><?= $category["name"] ?></a></li>

<?php
			}
?>
			</ul>
		</div>
		<div class="col-lg-10"> 
			<h2>Tshirts</h2>
			Sorted by
				<select name="sorted_by">
					<option>Price</option>
					<option>Most Popualr</option>
				</select>

			<div class="item_result">
				<?php include("product_list.php") ?>
			</div>

		</div>
	</div>

</body>
</html>