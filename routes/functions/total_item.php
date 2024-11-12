<?php 
function total_item($ip){
	global $db;
	 

	$run_chek_pro = $db->prepare("SELECT count(*) FROM cart WHERE ip_adress='$ip' ");
 	$run_chek_pro->execute();
 	$count_cart = $run_chek_pro->fetchColumn();
 	return $count_cart;
				 
}