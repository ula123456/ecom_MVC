<?php
$routeParts = explode('/', $route);
			if (count($routeParts) !==3) {
			echo "ungulige URL";
			exit();		}
	$brand_or_cat_id = $routeParts[2];
	$brandOrCat = $routeParts[1]; 
	$products = get_prod_by($brand_or_cat_id, $brandOrCat);
	require_once 'templates/result.php';