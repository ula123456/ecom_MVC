<?php 






function check_cart($ip){ 
	global $db;
	$run_cart = $db->prepare("SELECT count* FROM cart WHERE ip_adress='$ip'");
	$run_cart ->execute();
	$count_cart = $run_cart->fetchColumn();
	return $count_cart;

}



function cart($product_id){ 
	global $db;

$sqli = $db->prepare("SELECT * FROM cart WHERE product_id =$product_id");
		$sqli->execute();
		$row_qty = $sqli->fetch();
	return $row_qty;
}


