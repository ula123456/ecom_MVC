<?php

function register_user(){
global $db;

if (isset($_POST['register'])) {

	if (isset($_POST['email']) &&
	 !empty($_POST['password']) && 
	 !empty($_POST['confirm_password']) &&
	  !empty($_POST['name']) ) {
		$ip = get_ip();
		$name = $_POST['name'];
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$hash_password = md5($password);
		$confirm_password = trim($_POST['confirm_password']);

		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];

		$check_exist = $db->prepare("SELECT count(*) FROM users WHERE email ='$email'");
		$check_exist->execute();

		$email_count = $check_exist->fetchColumn();
		$row_register = $check_exist->fetch();

		

	if ($count_cats < 0) { 	echo "";}


		if ($email_count>0) {
			echo "<script>alert('Sorry, your email $email address exist in our')</script>";
		}elseif ($row_register['email'] !=$email && $password == $confirm_password ) {
			move_uploaded_file($image_tmp, "upload-files/$image");
			
			$sql = "INSERT INTO `users`( 
			`ip_adress`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_adress`, `image`)
	 VALUES('$ip', '$name','$email','$hash_password','$country','$city','$contact',	'$address',	'$image')";
	
	$run_isert = $db->prepare($sql);
	
	$run_isert->execute();

	if ($run_isert) {
		 
		$sel_user = $db->prepare("SELECT * FROM users WHERE email=? ");
		$sel_user->execute([$email]);

		$row_user = $sel_user->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user_id']  = $row_user['user_id'] ."<br>";
		$_SESSION['role']  = $row_user['role'];
		}
		$run_cart = $db->prepare("SELECT * FROM cart WHERE ip_adress = ?");
		$run_cart->execute([$ip]);
		$check_cart=$run_cart->fetch();
		if ($check_cart==0) {
			$_SESSION['email']  = $email;
		echo "<script>alert('Account has been created sucessfully')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		}else{

		$_SESSION['email']  = $email;
		echo "<script>alert('Account has been created sucessfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";	
		}
		}
	}
}
}


	

?>