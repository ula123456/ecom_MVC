<?php
function cat_or_brand($s )
{

	global $db;
	
	$sql = "SELECT * FROM ".$s;
	$dbh = $db->query($sql);
	if (!$dbh) {return  [];}
	$data_cat = [];
	while($row_cat = $dbh->fetch()) { $data_cat[]=$row_cat;	}
	
    return $data_cat;
}
