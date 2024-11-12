<?php  
$username ="";
$email ="";
$password ="";
$passwordRepeat ="";
$city ="";
$contact =""; 
$adress ="";
 
if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	  		$password =filter_input(INPUT_POST, 'password');
	 		$passwordRepeat =filter_input(INPUT_POST, 'passwordRepeat');
		 	$email =filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	  		$city =filter_input(INPUT_POST, 'city', FILTER_SANITIZE_EMAIL);
	  		$contact =filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_EMAIL);
	  		$adress =filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_EMAIL);
			$country = $_POST['country'];
			$hash_password = password_hash($password, PASSWORD_DEFAULT);
			$image = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];
			
			userChekMail($email);
		
		if ($count_cats < 0) { 	echo "";}

		if ($email_count>0) { echo "<script>alert('Sorry, your email $email address exist in our')</script>";}
		
		elseif ($row_register['email'] !=$email && $password == $confirm_password ) {
			move_uploaded_file($image_tmp, "storage/upload-files/$image");
						
			userDataInsert($ip, $username,$email, $hash_password, $country, $city, $contact, $address, $image);

			if ($run_isert) { 
							$row_user = user_by_email($email);

							$_SESSION['user_id']  = $row_user['user_id'] ."<br>";
							$_SESSION['role']  = $row_user['role'];
			}

			$check_cart = check_cart($ip);

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
	

  	exit();
}