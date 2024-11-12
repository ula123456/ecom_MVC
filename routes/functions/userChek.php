<?php 
function userCheklogin($email, $password){ 
	global $db;
		$sql="SELECT * FROM users WHERE password='$password' AND email='$email' ";
		$run_login = $db->prepare($sql);
		$run_login->execute();

		if (0 == $run_login->rowCount()) {
		        return [];
		        echo "<script>alert('password or email is wrong. try again!')</script>";
				exit();
   		 }
		
		$row_login = $run_login->fetch();

		return $row_login;

}

function userChekMail($email){ 
		global $db;		
		$check_exist = $db->prepare("SELECT count(*) FROM users WHERE email ='$email'");
		$check_exist->execute();
		$email_count = $check_exist->fetchColumn();
		$row_register = $check_exist->fetch();
		return $email_count; 
		return $row_register;
}