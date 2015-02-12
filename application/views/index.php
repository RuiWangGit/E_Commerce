<?php include("header.php"); ?>
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
<?php include("footer.php"); ?>
