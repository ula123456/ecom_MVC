<?php 
session_start();
include("routes/functions/check_cart.php");
if (isset($_POST['login'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']); 
		$password = md5($password);

		$check_login = userCheklogin($email, $password);
		$check_cart = check_cart($ip);

		//var_dump($check_login['user_id']);exit();
//// ели казинка пуста то myaccount иначе chekout
		if ( $check_cart==0) {

				$_SESSION['user_id'] = $check_login['user_id'];
				$_SESSION['role'] = $check_login['role'];
				$_SESSION['email'] = $email;
  
				echo "<script>alert('You has logged sucessful !!!')</script>";
				header("Location: ".$baseUrl."http://localhost/ecom/index.php/my_account");

		}else{

				$_SESSION['user_id'] = $check_login['user_id'];
				$_SESSION['role'] = $check_login['role'];
				$_SESSION['email'] = $email;
 
				echo "<script>alert('You has logged sucessful!')</script>";
				header("Location: ".$baseUrl."http://localhost/ecom/index.php/checkout"); 
				//echo "<script>window.open('checkout.php','_self')</script>";
	
	  }

  }