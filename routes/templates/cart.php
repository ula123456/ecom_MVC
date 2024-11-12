				<div id="content_area">

					<div class="shopping_cart_container" >
						
						
						<div id="shopping_cart" align="right" style="padding:15px">
							
							<?php if (isset($_SESSION['custumer_email'])) 
							{ echo "<b> Your Email:</b> ".$_SESSION['custumer_email'];}
							else{echo""; }	?>

							<b style="color:navy">Yur Cart - </b> Total Item: <?= $total;?>
							Total price: <?= $total; ?>
						</div><!-- shopping_cart end -->



						<form action=""method="post" encotype="multipart/form-data" >
						 	 <table align="center"  width="100%">
						 	 	<tr align="center">
						 	 		<th>Remove</th>
						 	 		<th>Product</th>
						 	 		<th>Quantity</th>
						 	 		<th>Price</th>
						 	 	</tr>
					<?php prod_in_cart();?>
		 						<tr>
		 							<td colspan="4" align="right"><b>Sub Total</b> </td> 
		 							<td><?= $total; ?></td>

		 						</tr>
						 	 	<tr align="center">
						 	 		<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"> </td>
						 	 		<td><input type="submit" name="continue" value="Continue shopping"> </td>
						 	 		<td><button><a href="http://localhost/ecom/index.php/checkout">Checkout</a></button> </td>
						 	 	</tr>

						 	 </table>
						</form>
						<?php del_item_fromcart($remove_id, $ip);	?>

					</div>  <!--shopping_cart_cotainer-->

				</div><!-- content ERIA end -->

		</div><!-- content wrapper end -->


