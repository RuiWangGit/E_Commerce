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
			$("form#filter select").change(function(){
				$(this).parent().submit();
			});

			$(".thumb img").click(function(){
				$(".main-image").attr("src", $(this).attr("src"));
			})
		})
	</script>

	<style type="text/css">

		#main-section {
			margin-top: 80px;
		}

		form#search input {
			width: 90%;
			float: left;
			margin-right: 10px;
		}
		form#search button {
			float: left;
		}

		ul.category {
			list-style: none;
			padding: 5px;
			line-height: 1.8em;
		}

		ul a {
			font-size: 1.1em;
			color: #444;
		}

		ul a:hover {
			color: #444;
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

		.item_result form#filter {
			display: inline-block;
			margin-top: 25px;
			float: right;
		}

		.item_result div.item {
			display: inline-block;
			width: 200px;
			height: 200px;
			margin-right: 30px;
			margin-bottom: 30px;
		}

		div.item a,
		div.item img {
			color: #fff;
			display: block;
			position: relative;
			overflow: hidden;
			width: 200px;
			height: 200px;
			border-radius: 5px;
		}

		div.item a div {
			position: absolute;
			background: rgba(0, 0, 0, 0.5);
			width: 200px;
			height: 200px;
			padding: 10px;
			top: 80%;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}

		div.item a:hover div {
			top: 20%;
		}

		div.item img {
			width: 200px;
		}

		div.pagination {
			margin: 30px 0;
			padding: 10px 0;
		}

		div#pagination a, div#pagination strong {
			font-size: 1.1em;
			color: #444;
			margin: 0 5px 0 0;
			background-color: #eee;
			border-radius: 3px;
			padding: 10px;
		}

		#detail .main-image {

		}

		#detail img {
			display: block;
			margin: 0 auto;
		}

		#detail .thumb-container {
			margin: 20px 0;
			overflow: hidden;
		}

		#detail .thumb {
			width: 33.33%;
			height: 100px;
			float: left;
		}

		.thumb img {
			display: block;
			width: 100px;
			height: 100px;
			margin: 0 auto;
			cursor: pointer;
		}

		#detail p.description {
			padding: 20px 0;
		}

		#suggest {
			width: 100%;
			margin: 20px;
		}

		#suggest ul {
			/*display: block;*/
			margin: 0;
			padding: 0;
			/*list-style: none;*/
		}

		#suggest li {
			display: inline-block;
			margin: 5px;
		}

		.carts-img {
			width: 50px;
			height: 50px;
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
	<header class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a href='/' class='navbar-brand'><i class="fa fa-child"></i> BOOTCamp</a>
			<div class="navbar-right">
				<nav>
					<ul class="nav navbar-nav">
						<li><a href='/carts'>Shopping cart ( <?= count($this->session->userdata('selected_products')) ?> )</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div id="main-section" class="container">
		<div class="row">
			<div class="col-sm-12 col-md-offset-2 col-md-10">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<h3>Categories</h3>
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
			
			<div class="col-md-10"> 
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
