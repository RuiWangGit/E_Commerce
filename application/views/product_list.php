<?php
	$limits = ["4"=>4, "8"=>8, "12"=>12];
	$sorts = ["popular"=>"Most Popular", "low_price"=>"Low Price", "high_price"=>"High Price"];
	foreach($limits as $key=>$limit) {
		if($page_limit == $key) {
			unset($limits[$key]);
		}
	}
	foreach($sorts as $key=>$sort) {
		if($sort_by == $key) {
			unset($sorts[$key]);
		}
	}
	$limits = [$page_limit => $page_limit] + $limits;
	$sorts = [$sort_by => $sort_by] + $sorts;
	
	foreach($sorts as $key=>$sort) {
		if($sort == "popular") $sorts[$key] = "Most Popular";
		else if($sort == "low_price") $sorts[$key] = "Low Price";
		else if($sort == "high_price") $sorts[$key] = "High Price";
	}
?>
<div class="title-bar">
	<h1><?= $title; ?></h1>
	<?= $page_limit ?>
	<?= $sort_by ?>
	<form id="filter" class="form-inline text-right" method="post" action="/home/sort_by">
		<select class="form-control" name="limit">
<?php
		foreach($limits as $key=>$limit) {
?>
			<option value="<?= $key ?>"><?= $limit ?></option>
<?php
		}
?>
		</select>
		<select class="form-control" name="sort">
<?php
		foreach($sorts as $key=>$sort) {
?>
			<option value="<?= $key ?>"><?= $sort ?></option>
<?php
		}
?>
		</select>
	</form>
</div>
<div class="item-container">
<?php
	foreach($products as $product) {
?>
	<div class="item">
		<a id="product" href="/home/product/<?= $product['id'] ?>">
			<img src="<?= $product['main_image']?>" class="img-responsive">
			<div>
				<p class="text-right"><i class="fa fa-usd"></i><?= $product['price']?></p>	
				<p class="text-center"><?= $product['name']?></p>
			</div>
		</a>
	</div>
<?php
	}
?>
	<div id="pagination" class="text-center"><?= $links; ?></div>
</div>
