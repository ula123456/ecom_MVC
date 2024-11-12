<?php 

function get_prof_by_prodId($productId){ 
 	global $db;
	
	$run_chek_pro = $db->prepare("SELECT * FROM products WHERE product_id=$productId ");
	$run_chek_pro->execute();
	$run = $run_chek_pro->fetch();
	
	return $quality = $run['product_price'];
	return $product_title = $run['product_title'];
	return $product_price = $run['product_price'];


}
$sql = $db->prepare("SELECT * FROM products WHERE product_id=? ");
		$sql->execute([$product_id]);