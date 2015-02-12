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
	<link href="/assets/css/style.css" rel="stylesheet" type="text/css">

	<script src="/assets/js/jquery-2.1.3.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/custom.js"></script>
	
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