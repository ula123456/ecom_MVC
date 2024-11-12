<?php
function search_Pro($keyword){
	global $db;
	$dbh = $db->prepare("SELECT * FROM products WHERE product_keywords LIKE :keyword ");
		$keyword = "%".$keyword."%";
		$dbh->bindParam(':keyword', $keyword, PDO::PARAM_STR);
		
		$dbh->execute(); 
	$products = [];
	while($row_pro = $dbh->fetch(PDO::FETCH_ASSOC)) {
		$products[]=$row_pro;
	}
	return $products;
}