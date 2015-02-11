<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cobbling Dojo BOOTCamp</title>

	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="/assets/js/jquery-2.1.3.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("form#sort select").change(function(){
				$(this).parent().submit();
			})
		})
	</script>

	<style type="text/css">

		form#search input {
			width: 90%;
			float: left;
			margin-right: 10px;
		}
		form#search button {
			float: left;
		}

		ul.category {
			padding: 5px;
		}

		.item_result {
			margin-top: 30px;
		}

		.item_result .title-bar {
			margin-bottom: 30px;
			border-bottom: 1px solid #ccc;
		}

		.item_result h1 {
			display: inline-block;
		}

		.item_result h3, .item_result div.price {
			border-bottom: 1px solid #eee;
			margin-bottom: 0;
			padding-bottom: 20px;
		}

		.item_result div.price {
			padding-top: 20px;
		}

		.item_result h4 {
			display: inline-block;
			vertical-align: top;
			margin-top: 20px
		}

		.item_result form {
			display: inline-block;
			margin-top: 10px;
		}

		.item_result form#sort {
			display: inline-block;
			margin-top: 25px;
			float: right;
		}

		.item_result div.item {
			display: inline-block;
			width: 200px;
			margin-right: 30px;
			margin-bottom: 30px;
		}

		.item_result p {
			padding: 20px 0;
		}

		div.item img {
			width: 200px;
		}

		div#pagination {
			margin: 30px 0;
			padding: 10px 0;
		}

		div#pagination a, div#pagination strong {
			font-size: 1.1em;
			margin: 0 5px 0 0;
			background-color: #eee;
			border: 1px solid #eae;
			border-radius: 3px;
			padding: 10px;
		}

		footer {
			margin-top: 30px;
			border-top: 1px solid #ccc;
		}

		footer div {
			padding: 10px;
		}
	</style>
</head>
<body>
	<header class="navbar navbar-inverse">
		<div class="container">
			<a href='/' class='navbar-brand'>Cobbling Dojo BOOTCamp</a>
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
		<div class="row">
			<div class="col-sm-12 col-md-offset-2 col-md-10">
				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-2">
				<h4>Categories</h4>
				<ul class="category">
<?php
			foreach($categories as $category) {
?>
					<li>
						<a id="category" href="/home/category/<?= $category['id'] ?>"><?= $category["name"] ?></a>
					</li>
<?php
			}
?>
				</ul>
			</div>
			
			<div class="col-sm-12 col-md-10"> 
				<!-- search box -->
				<form id="search" class="form-inline clearfix" method="post" action="/home/search_keyword">
					<input class="form-control" type="text" name="keyword" placeholder="keyword for search">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</form>
				<!-- search box end -->

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
	</div>
	<footer>
		<div class="container text-center">
			<div class="row">
				Copyright © BOOT-CAMP 2015 All rights reserved.
			</div>
		</div>
	</footer>
</body>
</html>