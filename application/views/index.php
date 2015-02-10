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

		// $(document).ready(function(){
		// 	$(document).on("submit", "form#sort", function(){
		// 		$.ajax({
		// 			url: $(this).attr("action"),
		// 			type: "POST",
		// 			data: $(this).serialize()
		// 		}).done(function(data){
		// 			// console.log(data);
		// 			$(".item_result").html(data);
		// 		});
		// 		return false;
		// 	});
		// 	// $(document).on("click", "#pagination a", function(){
		// 	// 	$.ajax({
		// 	// 		url: $(this).attr("href")
		// 	// 	}).done(function(data){
		// 	// 		console.log(data);
		// 	// 	})
		// 	// 	return false;
		// 	// })
		// })

		// $(document).ready(function(){

			// $("form#search").on("submit", function(){
			// 	$.ajax({
			// 		url: $(this).attr("action"),
			// 		type: "POST",
			// 		data: $(this).serialize()
			// 	}).done(function(data){
			// 		$("div.item_result").html(data);
			// 	});
			// 	// return false;
			// });


			// display all products on result section by category
			// $(document).on("click", "a#category", function(){
			// 	$.ajax({
			// 		url: $(this).attr("href")
			// 	}).done(function(data){
			// 		$("div.item_result").html(data);
			// 	});
			// 	return false;
			// });

			// move to product description secion
			// $(document).on("click", "a#product", function(){
			// 	$.ajax({
			// 		url: $(this).attr("href")
			// 	}).done(function(data){
			// 		$("div.item_result").html(data);
			// 	});
			// 	return false;
			// });

			// $(document).on("click", "#pagination a", function(){
			// 	$.ajax({
			// 		url: $(this).attr("href")
			// 	}).done(function(data){
			// 		// console.log(data);
			// 		// $("div.item_result").html(data);
			// 	});
			// 	// return false;
			// })
		// })

		// var range = function(data, page, size) {
		// 	var start_index = (page-1) * size;
		// 	if(data.length < start_index) return [];
		// 	else return data.splice(start_index, size);
		// }

		// var pageCount = function(data, size) {
		// 	var result = [];
		// 	for(var i = 0; i < Math.ceil(data.length / size); i++) {
		// 		result.push(i);
		// 	}
		// 	return result;
		// }

	</script>

	<style type="text/css">
		.item_result div.item {
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
			<form id="search" method="post" action="/home/search_keyword">
				<input type="text" name="keyword" placeholder="keyword for search">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		
			<h4>Categories</h4>
			<ul>
<?php
			foreach($categories as $category) {
?>
				<li><a id="category" href="/home/category/<?= $category['id'] ?>"><?= $category["name"] ?></a></li>

<?php
			}
?>
			</ul>
		</div>
		<div class="col-lg-10 main"> 
			<div class="item_result">
				<?php
					if($products != "") {
						include("product_list.php");
					}
					else {
						include("product_detail.php");
					}
				?>
			</div>
		</div>
	</div>
	<footer>
<div class="container text-center">
	<div class="row">
		Copyright © BOOT-CAMP 2015 All rights reserved.</p>
	</div>
</div>
</body>
</html>