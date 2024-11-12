<?php 

function insert_to_cart($ip,$productId){ 
 	global $db;
	
	$run_chek_pro = $db->prepare("SELECT * FROM products WHERE product_id=$productId ");
	$run_chek_pro->execute();
	$run = $run_chek_pro->fetch();
	$quality = $run['product_price'];
	$product_title = $run['product_title'];
	$product_price = $run['product_price'];






	
	$sql = "INSERT INTO cart
			(product_id,
			product_title,
			product_price,
			ip_adress) 
	 						VALUES('$productId',
	 								'$product_title',
								 	'$product_price',
	 								'$ip')";
	
	$insert_stmt = $db->prepare($sql);
	$insert_stmt ->execute();

	//echo "<script>window.open('index.php','_self')</script>";	
    
 
}