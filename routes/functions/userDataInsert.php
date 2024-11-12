<?php 
function userDataInsert($ip, $username,$email, $hash_password, $country, $city, $contact, $address,	$image){ 
global $db;
	$sql = "INSERT INTO `users`( 
			`ip_adress`, 
			`name`, 
			`email`, 
			`password`, 
			`country`, 
			`city`, 
			`contact`, 
			`user_adress`, 
			`image`)
	 VALUES('$ip', '$username','$email','$hash_password','$country','$city','$contact',	'$address',	'$image')";
	
	$run_isert = $db->prepare($sql);
	
	$run_isert->execute();
}