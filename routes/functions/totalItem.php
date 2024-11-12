
<?php 
function total_item($ip){
	global $db;
	 

	$run_chek_pro = $db->prepare("SELECT count(*) FROM cart WHERE ip_adress='$ip' ");
 	$run_chek_pro->execute();
 	echo $count_cats = $run_chek_pro->fetchColumn();
				 

}