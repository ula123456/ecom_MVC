<?php 

function del_item_fromcart($remove_id, $ip){
					global $db;
					
					if (isset($_POST['remove'])) {
					foreach ($_POST['remove'] as $remove_id) {
					$sqli = $db->prepare("DELETE FROM cart WHERE product_id ='$remove_id' AND ip_adress='$ip' ");
					$run_delete=$sqli->execute();
								
					if ($run_delete) { echo "<script>window.open('cart.php','_self')</script>";	}
							 } ;
						}
				}
