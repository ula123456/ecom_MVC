<?php
function prod_in_cart(){
	global $db;
	global $ip;
	$total = 0;

	$dbh = $db->prepare("SELECT * FROM cart WHERE ip_adress = '$ip'");
	$dbh->execute();
	
	while ($fetch_cart = $dbh->fetch()) {
	$product_id = $fetch_cart['product_id'];
	$fetch_prod =get_Pro($sq="WHERE product_id='$product_id'");
				
		foreach ( $fetch_prod as $fetch_product) {
		$product_price = array($fetch_product['product_price']);
	 	$product_title = $fetch_product['product_title'];
		$product_image = $fetch_product['product_image'];
		$sing_price = $fetch_product['product_price'];
		$values = array_sum($product_price);
		$row_qty = cart($product_id);

		$qty = $row_qty['quality'];
		$values_qty = $values*$qty;
		$total += $values_qty; 


		include("routes/templates/prod_in_cart.php");  

		}
	}

}

function total_in_cart(){
	global $db;
	global $ip;
	$total = 0;

	$dbh = $db->prepare("SELECT * FROM cart WHERE ip_adress = '$ip'");
	$dbh->execute();
	
while ($fetch_cart = $dbh->fetch()) {
	$product_id = $fetch_cart['product_id'];
	$fetch_prod =get_Pro($sq="WHERE product_id='$product_id'");
				
		foreach ( $fetch_prod as $fetch_product) {
		$product_price = array($fetch_product['product_price']);
	 	$product_title = $fetch_product['product_title'];
		$product_image = $fetch_product['product_image'];
		$sing_price = $fetch_product['product_price'];
		$values = array_sum($product_price);
		$row_qty = cart($product_id);

		$qty = $row_qty['quality'];
		$values_qty = $values*$qty;
		$total += $values_qty; 


		

		}
	}

	 return $total; 

}