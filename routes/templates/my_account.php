<div class="content_wrapper"><!-- content start -->

<?php 

 if ($_SESSION['user_id']) {?>
				
		<div class="user_container" >
		<div class="user_content" >
<?php

					if (isset($_GET['action'])) {
					$action = $_GET['action'];
					}else{
						$action = '';
					}
					switch ($action) 
					{

							case 'edit_account':
							include('users/edit_account.php');
							break;

							case 'edit_profile':
							include('users/edit_profile.php');
							break;

							case 'user_profile_picture':
							include('users/user_profile_picture.php');
							break;

							case 'chage_password':
							include('users/change_password.php');
							break;

							case 'delete_account':
							include('users/delete_account.php');
							break;
					
						
									default:
									echo "do something";
									break;
					}
?>

			 			</div><!-- user_content -->
			 			<div class="user_sidebar" >
			 				<?php 
			

						if ($data_user['image'] !='') {
							?>
							<div class="user_image" align="center">
								<img src="<?= STORAGE_DIR. $data_user['image']; ?>"/>
							</div>

						<?php }else{ ?>

							<div class="user_image" align="center">
								<img src="localhost\ecom\routes\templates\storage/profile-icon.png"/>
								
							</div>
							<?php }?>
			 				
			 				
			 				<ul>
			 					<li><a href="my_account.php?action=my_order">My Order</a> </li>
			 					<li><a href="my_account.php?action=edit_account">Edit Account</a> </li>
			 					<li><a href="my_account.php?action=edit_profile">Edit Profile</a> </li>
			 					<li><a href="my_account.php?action=user_profile_picture">User Profile Picture</a> </li>
			 					<li><a href="my_account.php?action=chage_password">Change password</a> </li>
			 					<li><a href="my_account.php?action=delete_account">Delete Account</a> </li>
			 					<li><a href="logout.php">Logout</a> </li>
			 				</ul>

			 			</div><!-- user_sidebar -->
			 		</div><!-- user_container -->	

 <?php }else{ ?>		

	<h1>Account Setting Page</h1>
	<h5><a href="index.php/login">Log in</a>to Your Account</h5>

<?php } ?>		
		</div><!-- content_wrapper -->
