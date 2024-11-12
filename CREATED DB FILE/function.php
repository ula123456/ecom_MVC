<?php include("includes/db.php"); ?>
<?php 






function get_cat(){
	global $db;

	$dbh = $db->query('SELECT * FROM Categories');
	while($row = $dbh->fetch()) {
    
    ?>
			 
	<li><a href='index.php?cat= <?=$row['cat_id'] ?>'><?=$row['cat_title']; ?></a></li>";
	<?}
}
function get_brand(){
	global $db;
	$dbh = $db->query('SELECT * FROM brands');
	while($row_brand = $dbh->fetch()) {
    
    $brand_id = $row_brand['brand_id'];
			 
	$brand_title = $row_brand['brand_title'];
			 
	echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}
function getPro(){
    if(!isset($_GET['cat'])){
		  if(!isset($_GET['brand'])){
		  
		global $db;
		 	
		$dbh = $db->query('SELECT * FROM products ORDER BY RAND() LIMIT 0,6');
		$products= $dbh->fetch();
		foreach ($products as $row_pro ) {
			//var_dump($row_pro);
		  $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  $pro_brand = $row_pro['product_brand'];
		 
		  
		  //$pro_image = $row_pro['product_image'];
		  
		  ?>
		 
		      <div id='single_product'>
			    <h3><?=  $row_pro['product_title'] ?></h3>
				<img src="upload-files/<? //= $pro_image ?>" width='180' height='180' />
				
				<p><b> Price: $ <?= $row_pro['product_price'] ?></b></p>
				
				<a href='details.php?pro_id=<?= $row_pro['product_id'] ?>'>Details</a>
				
				<a href='index.php?add_cart=<?=$pro_id ?>'>
				  <button style='float:right'>Add to Cart</button>
				</a>
			  </div>;
		<? }
		}
		}
}

function get_cat_by_cat_id(){

global $db;

	if (isset($_GET['cat'])) {
			$cat_id = $_GET['cat'];
          
		$dbh = $db->prepare("SELECT * FROM products WHERE product_cat=? ");
		$dbh->execute([$cat_id]);

		$count_cats = $dbh->fetch(PDO::FETCH_ASSOC);

if ($count_cats == 0) { echo "<h2 style='padding:20px'>No products in this category</h2>";}

		while($row_pro = $dbh->fetch()) {
		  $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  $pro_brand = $row_pro['product_brand'];
		  $pro_title = $row_pro['product_title'];
		  $pro_price = $row_pro['product_price'];
		  $pro_image = $row_pro['product_image'];
		  
		  
		  echo "
		      <div id='single_product'>
			    <h3>$pro_title</h3>
				<img src='upload-files/$pro_image' width='180' height='180' />
				
				<p><b> Price: $ $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'>
				  <button style='float:right'>Add to Cart</button></a>
			  </div>"; }

						
						}

}


function get_cat_by_brand_id(){

global $db;

	if (isset($_GET['brand'])) {
			$brand_id = $_GET['brand'];
          
		$dbh = $db->prepare("SELECT * FROM products WHERE product_brand=? ");
		$dbh->execute([$brand_id]);

		$count_cats = $dbh->fetch(PDO::FETCH_ASSOC);

if ($count_cats == 0) { echo "<h2 style='padding:20px'>No products in this category</h2>";}

		while($row_pro = $dbh->fetch()) {
		  $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  $pro_brand = $row_pro['product_brand'];
		  $pro_title = $row_pro['product_title'];
		  $pro_price = $row_pro['product_price'];
		  $pro_image = $row_pro['product_image'];
		  
		  
		  echo "
		      <div id='single_product'>
			    <h3>$pro_title</h3>
				<img src='upload-files/$pro_image' width='180' height='180' />
				
				<p><b> Price: $ $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'>
				  <button style='float:right'>Add to Cart</button></a>
			  </div>"; }

						
						}

}


function get_All_Pro(){
	global $db;

	$dbh = $db->query('SELECT * FROM products ');
		while($row_pro = $dbh->fetch()) {
		  $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  $pro_brand = $row_pro['product_brand'];
		  $pro_title = $row_pro['product_title'];
		  $pro_price = $row_pro['product_price'];
		  $pro_image = $row_pro['product_image'];
		  
		  
		  echo "
		      <div id='single_product'>
			    <h3>$pro_title</h3>
				<img src='upload-files//$pro_image' width='180' height='180' />
				
				<p><b> Price: $ $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'>
				  <button style='float:right'>Add to Cart</button>
				</a>
			  </div>";
		}
}

function search_Pro(){
	global $db;
	if (isset($_GET['search'])) {
			 $keyword = $_GET['user_query'];

		
		$dbh = $db->prepare("SELECT * FROM products WHERE product_keywords LIKE :keyword ");
		$keyword = "%".$keyword."%";
		$dbh->bindParam(':keyword', $keyword, PDO::PARAM_STR);
		
		$dbh->execute();                     
		
		while($row_pro = $dbh->fetch(PDO::FETCH_ASSOC)) {
		 $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  $pro_brand = $row_pro['product_brand'];
		  $pro_title = $row_pro['product_title'];
		  $pro_price = $row_pro['product_price'];
		  $pro_image = $row_pro['product_image'];
		  
		  
		   echo "
		      <div id='single_product'>
			    <h3>$pro_title</h3>
				<img src='upload-files//$pro_image' width='180' height='180' />
				
				<p><b> Price: $ $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'>
				  <button style='float:right'>Add to Cart</button>
				</a>
			  </div>";
		}
						

			}
}



function total_price(){
	global $db;
	$total = 0;
	$ip = get_ip();

	$dbh = $db->prepare("SELECT * FROM cart WHERE ip_adress = ?");
		$dbh->execute([$ip]);
	
	while ($fetch_cart = $dbh->fetch()) {
		
	
		  $product_id = $fetch_cart['product_id'];
	

		$sql = $db->prepare("SELECT * FROM products WHERE product_id=? ");
		$sql->execute([$product_id]);
		while ( $fetch_product = $sql->fetch()) {
		
		$product_price = array($fetch_product['product_price']);
	 	$product_title = $fetch_product['product_title'];
		$product_image = $fetch_product['product_image'];
		$sing_price = $fetch_product['product_price'];
		$values = array_sum($product_price);

		$sqli = $db->prepare("SELECT * FROM cart WHERE product_id =?");
		$sqli->execute([$product_id]);
		$row_qty = $sqli->fetch(PDO::FETCH_ASSOC);

		$qty = $row_qty['quality'];
		
		$values_qty = $values*$qty;

		$total += $values_qty;
		
	}	 
	}
		echo "$".$total;
}


function prod_in_cart(){
	global $db;
	$total = 0;
	$ip = get_ip();

	$dbh = $db->prepare("SELECT * FROM cart WHERE ip_adress = ?");
	$dbh->execute([$ip]);
	
	while ($fetch_cart = $dbh->fetch()) {
		$product_id = $fetch_cart['product_id'];
		$sql = $db->prepare("SELECT * FROM products WHERE product_id=? ");
		$sql->execute([$product_id]);
		
		while ( $fetch_product = $sql->fetch()) {
		$product_price = array($fetch_product['product_price']);
	 	$product_title = $fetch_product['product_title'];
		$product_image = $fetch_product['product_image'];
		$sing_price = $fetch_product['product_price'];
		$values = array_sum($product_price);

		$sqli = $db->prepare("SELECT * FROM cart WHERE product_id =?");
		$sqli->execute([$product_id]);
		$row_qty = $sqli->fetch(PDO::FETCH_ASSOC);

		$qty = $row_qty['quality'];
		$values_qty = $values*$qty;
		$total += $values_qty; 	 ?>


						 	 	<tr align="center">
						 	 		<td> <input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"/> </td>
						 	 		<td><?php echo $product_title; ?></br>
						 	 		
						 	 		<img src="upload-files/<?php echo $product_image; ?>"/>

						 	 		<td><input type="text" size="4" name="qty" value="<?php echo $qty; ?>" /></td>
						 	 		<td><?php echo "$". $sing_price; ?></td>
						 	 	</tr>
		<?php }	 	} 
}

function del_item_fromcart(){
					global $db;
					$ip = get_ip();
					if (isset($_POST['remove'])) {
					foreach ($_POST['remove'] as $remove_id) {
					$sqli = $db->prepare("DELETE FROM cart WHERE product_id ='$remove_id' AND ip_adress='$ip' ");
					$run_delete=$sqli->execute();
								
					if ($run_delete) { echo "<script>window.open('cart.php','_self')</script>";	}
							 } ;
						}
				}
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