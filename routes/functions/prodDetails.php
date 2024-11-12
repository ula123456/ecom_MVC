<?php 
function get_prod_details($productId){

		global $db;

		$dbh = $db->prepare("SELECT * FROM products WHERE product_id=? ");
		$dbh->execute([$productId]);
		$row_pro = $dbh->fetch(PDO::FETCH_ASSOC);
		
	return $row_pro;
		}  
		 
		      


	
	
						


