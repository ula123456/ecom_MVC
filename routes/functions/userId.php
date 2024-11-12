<?php 

function userId(){
		$user_id=$_SESSION['user_id'];

			$select_user = $db->prepare("SELECT * FROM users WHERE user_id='$user_id'");
			$select_user->execute();
			$data_user = $select_user->fetch();
			return $data_user;
		  }
function user_by_email($email){
$sel_user = $db->prepare("SELECT * FROM users WHERE email=$email ");
			$sel_user->execute();
			$row_user = $sel_user->fetch();
			return $row_user;
		}
