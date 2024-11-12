<?php 

function  get_Pro($sq){
	global $db;

$sql = 'SELECT * FROM products ';
$sql = $sql.$sq;

	$result= $db->query($sql);
	if (!$result) {return  [];}
	$products = [];
	while ($row = $result->fetch()) {
		$products[]=$row;
	}	
	return $products;

}
