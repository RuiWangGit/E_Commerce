<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->session->sess_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Boot-camp</title>

	<!--To use Jquery -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js">
	</script>

	<!-- To use bootstrap -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="/assets/js/bootstrap.min.js"></script>	
	


	<style type="text/css">
		.pull-right{
			margin-left: 10px;
		}
	</style>
	
	<script type="text/javascript">

	$(document).ready(function(){
		var tmp;
		var save; 
		var id;

		// console.log("tttt");
		$(document).on("click", "a#update-link", function(){
			// console.log("tttt2222");
			// tmp = $(this).parent().children('p');
			tmp = $('#qty').parent();
			
			// save = $('#qty-remove');
			// console.log($(this));

			id =$(this).attr('href');
			console.log('post url:',id);
			
			
			tmp.html("<form id='saveForm' action='"+id+"' method='post'><textarea style='width:45px; height:26px;' name='quantity' value=''></textarea><input type='hidden' name='submit' value='save'><input style=' vertical-align:top; margin-left: 20px; ' type='submit' value='save'></form>" );
			// save.html("");// remove update keyword
			
			return false;	
		});


		$(document).on('submit', 'form#saveForm', function() {
			console.log("++++++++++");
			// var tmp1 = $(this).parent().parent().parent().parent();
			// console.log(tmp1);
			// console.log($(this));
			$.ajax({
				url: $(this).attr("action"),
				type: "post",
				data: $(this).serialize()
			}).done(function(data){

				console.log(data);
				$('#table-input').html(data);
				// tmp1.html(data);
			})
			return false;
		});


	});

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
						<li><a href='/carts'>Shopping cart ( <?= count($selected_products) ?> )</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>


	<div class="container">
		<div class="row">

			<div class="col-lg-2">
					
			</div>
			
			<div class="col-lg-10" style="margin-bottom:50px"> 
				<h3>Items in cart </h3>
				<div id="table-input">			
							<?php require('update.php'); ?>

				</div>
			
				<p style='margin-top:60px; margin-right:0' >
					<a class="btn btn-large btn-info pull-right" href="/payments" >Proceed to Pay</a>
					<a class="btn btn-large btn-info pull-right" href="/home"  >Continue shopping</a>
				</p>


			</div>



		</div>	

		
				
	</div>




 



</body>
</html>



