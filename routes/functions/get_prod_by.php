<?php
function get_prod_by($brand_or_cat_id, $brandOrCat)
{
//var_dump($brandOrCat)  ;
		global $db;
         $sql = "SELECT * FROM products WHERE product_" .$brandOrCat. '=?';
        // $sql = $sql. $s=;
		$dbh = $db->prepare($sql);
		$dbh->execute([$brand_or_cat_id]);

		$count_cats = $dbh->fetch(PDO::FETCH_ASSOC);

	if ($count_cats == 0) { echo "<h2 style='padding:20px'>No products in this category</h2>";}
		$products = [];
		while($row_pro = $dbh->fetch()) {
		$pro_id = $row_pro['product_id'];
		$products[]=$row_pro;
	}
    return $products;				

}
