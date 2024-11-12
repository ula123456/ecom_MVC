<?php
 session_start();
 ?>
<html>
<head>
<title>online shopping</title>
<link rel="stylesheet" href="http://localhost/ecom/routes\templates\assets/css/style.css">
<script src="http://localhost/ecom/routes/templates/assets/js/jquery-3.5.1.js"></script>

<body>
	<div class="main_wrapper"> <!-- start main container -->
		<div class="header_wrapper"><!-- start heder -->

			<div class="header_logo"><!-- logo -->
				<a href="index.php"><img id="logo" src="http://localhost/ecom/routes/templates/storage/logo.png"></a>
			</div>

			<div id="form"><!-- forma -->
				<form action="http://localhost/ecom/index.php/search" method="POST"enctype="multipart/form-data">
				
					<input type="text" name="user_query" placeholder="serch a product"/>
					<input type="submit" name="search" value="Search"/>
				</form>
			</div>
			<div class="cart">
				<ul>
					<li class="dropdown_header_cart">
						<div id="notification_total_cart" class="shoping-cart">
							<a href="http://localhost/ecom/index.php/cart"><img src="http://localhost/ecom/routes/templates/storage/cart_icon.png"></a>
							<div class="cart_number">

								<?= $count_cart;?>

							</div><!--noty_cart_nuber -->
						</div>
					</li>
				</ul>
			</div>

			<?php if (!isset($_SESSION['user_id'])) {
				

			require 'routes/templates/adminMenu.php';
			}else{  	
				?>

			<div id="profile">
				<ul>
					<li class="dropdown_header">
						
						<a>
							<?php if ($data_user['image'] !='') {?>
							<span><img src="<?= STORAGE_DIR.$data_user['image']; ?>"> </span>
							<?php }else{ ?><span><img src="http://localhost/ecom/routes\templates/storage/profile-icon.png"> </span><?php } ?>
						</a>

						<ul class="dropdown_menu_header" >
							<li><a href="http://localhost/ecom/index.php/my_account">Account Setting</a></li>
							<li><a href="http://localhost/ecom/index.php/logout">Logout</a></li>
						</ul>

					</li>
				</ul>
			</div>

			<?php }?>
		</div><!-- heder end -->
		<div class="menu_bar">
			<ul id="menu">
				<li><a href="http://localhost/ecom/index.php/home">Home</a> </li>
				<li><a href="http://localhost/ecom/index.php/all_products">All product</a> </li>
				<li><a href="http://localhost/ecom/index.php/my_account">My Accaunt</a> </li>
				<li><a href="http://localhost/ecom/index.php/cart">Shopping Cart </a></li>
				<li><a href="http://localhost/ecom/index.php/contact">Contact</a> </li>
				<li><a href="http://localhost/ecom/index.php/logout">Logout</a> </li>
			</ul>

		</div>
<?php include('assets/js/drop_doun_menu.php'); ?>
